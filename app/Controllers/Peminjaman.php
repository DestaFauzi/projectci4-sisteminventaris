<?php

namespace App\Controllers;

use App\Models\PeminjamanModel;
use App\Models\InventarisModel;
use App\Models\UserModel;
use CodeIgniter\Controller;
use CodeIgniter\Email\Email;

class Peminjaman extends Controller
{
    protected $email;
    protected $userModel;
    protected $inventarisModel;
    protected $peminjamanModel;


    public function __construct()
    {
        $this->email = \Config\Services::email();
        $this->userModel = new UserModel();
        $this->inventarisModel = new InventarisModel();
        $this->peminjamanModel = new PeminjamanModel();
    }

    public function index()
    {
        $data['peminjaman'] = $this->peminjamanModel->findAll();
        return view('peminjaman/index', $data);
    }
    public function indexpeminjam()
    {
        $data['peminjaman'] = $this->peminjamanModel->findAll();
        return view('peminjaman/index', $data);
    }
    public function create()
    {
        $data['inventaris'] = $this->inventarisModel->findAll();
        return view('peminjaman/create', $data);
    }

    public function store()
    {
        // Ambil data dari form
        $userId = session()->get('id');
        $inventarisId = $this->request->getPost('id_inventaris');
        $jumlahPinjam = $this->request->getPost('jumlah_pinjam');
        $tanggalPeminjaman = date('Y-m-d H:i:s'); // Tanggal saat ini

        // Validasi data
        if (!$userId || !$inventarisId || !$jumlahPinjam) {
            return redirect()->back()->with('error', 'Semua kolom harus diisi');
        }

        // Ambil data inventaris
        $inventaris = $this->inventarisModel->find($inventarisId);
        if (!$inventaris) {
            return redirect()->back()->with('error', 'Inventaris tidak ditemukan');
        }

        // Validasi stok inventaris
        if ($inventaris['stok'] < $jumlahPinjam) {
            return redirect()->back()->with('error', 'Stok tidak mencukupi');
        }

        // Data peminjaman
        $data = [
            'id_user' => $userId,
            'id_inventaris' => $inventarisId,
            'jumlah_pinjam' => $jumlahPinjam,
            'tanggal_peminjaman' => $tanggalPeminjaman,
            'status' => 'pending'
        ];

        // Simpan data peminjaman
        $this->peminjamanModel->insert($data);

        // Kurangi stok inventaris

        $newStok = $inventaris['stok'] - $jumlahPinjam;
        $this->inventarisModel->update($inventarisId, ['stok' => $newStok]);

        // Kirim email notifikasi ke pengguna dengan role "peminjam"
        $user = $this->userModel->find($userId);
        if ($user['role'] == 'peminjam') {
            $this->sendNotificationEmail($user['email'], 'Peminjaman Berhasil', 'Anda telah berhasil meminjam ' . $inventaris['nama_inventaris']);
        }

        return redirect()->to('/peminjaman')->with('success', 'Peminjaman berhasil diajukan');
    }

    public function approvalList()
    {
        $data['peminjaman'] = $this->peminjamanModel->where('status', 'pending')->findAll();
        return view('peminjaman/approval', $data);
    }

    public function approve($id)
    {
        $this->peminjamanModel->update($id, ['status' => 'approved']);
        // Kirim email notifikasi ke pengguna dengan role "peminjam"
        $peminjaman = $this->peminjamanModel->find($id);
        if ($peminjaman) {
            $user = $this->userModel->find($peminjaman['id_user']);
            if ($user['role'] == 'peminjam') {
                $inventaris = $this->inventarisModel->find($peminjaman['id_inventaris']);
                $this->sendNotificationEmail($user['email'], 'Peminjaman Disetujui', 'Peminjaman ' . $inventaris['nama_inventaris'] . ' telah disetujui.');
            }
        }
        return redirect()->to('/peminjaman/approval')->with('success', 'Peminjaman disetujui');
    }

    public function reject($id)
    {
        $peminjaman = $this->peminjamanModel->find($id);

        if ($peminjaman) {
            // Kembalikan stok inventaris
            $inventaris = $this->inventarisModel->find($peminjaman['id_inventaris']);
            $newStok = $inventaris['stok'] + $peminjaman['jumlah_pinjam'];
            $this->inventarisModel->update($peminjaman['id_inventaris'], ['stok' => $newStok]);

            // Update status peminjaman menjadi 'rejected'
            $this->peminjamanModel->update($id, ['status' => 'rejected']);
        }

        return redirect()->to('/peminjaman/approval')->with('success', 'Peminjaman ditolak');
    }

    public function returnItem($id)
    {
        $peminjaman = $this->peminjamanModel->find($id);

        if (!$peminjaman) {
            return redirect()->back()->with('error', 'Peminjaman tidak ditemukan');
        }

        // Update tanggal_pengembalian dan status menjadi 'returned'
        $currentDateTime = date('Y-m-d H:i:s');
        $this->peminjamanModel->update($id, [
            'tanggal_pengembalian' => $currentDateTime,
            'status' => 'returned'
        ]);

        // Kembalikan stok inventaris
        $inventaris = $this->inventarisModel->find($peminjaman['id_inventaris']);
        $newStok = $inventaris['stok'] + $peminjaman['jumlah_pinjam'];
        $this->inventarisModel->update($peminjaman['id_inventaris'], ['stok' => $newStok]);

        return redirect()->back()->with('success', 'Item telah dikembalikan');
        return view('/dashboard');
    }

    protected function sendNotificationEmail($recipient, $subject, $message)
    {
        $email = $this->email;

        // Konfigurasi pengiriman email
        $email->setFrom('your_email@gmail.com', 'Your Name'); // Ganti dengan email Anda dan nama Anda
        $email->setTo($recipient); // Gunakan email dari data pengguna
        $email->setSubject($subject);
        $email->setMessage($message);

        // Kirim email
        if (!$email->send()) {
            return false;
        } else {
            return true;
        }
    }
    public function detail()
    {
        $data['peminjaman'] = $this->peminjamanModel->findAll(); // Ambil semua data peminjaman dari model

        return view('peminjaman/admin', $data);
    }
}
