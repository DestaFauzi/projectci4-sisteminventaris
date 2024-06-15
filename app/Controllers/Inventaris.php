<?php

namespace App\Controllers;

use App\Models\InventarisModel;
use App\Models\UserModel;
use App\Models\RuanganModel;

class Inventaris extends BaseController
{
    protected $inventarisModel;
    protected $userModel;
    protected $RuanganModel;

    public function __construct()
    {
        $this->inventarisModel = new InventarisModel();
        $this->userModel = new UserModel();
        $this->RuanganModel = new RuanganModel();
    }

    public function tambahinventaris()
    {
        $data['operator'] = $this->userModel->getOperator();
        $data['ruangan'] = $this->RuanganModel->getRuangan();

        return view('inventaris/tambahinventaris', $data);
    }
    public function index()
    {
        $inventaris = new InventarisModel();
        $ruangModel = new RuanganModel();
        $tabel['tbl_inventaris'] = $inventaris->getInventarisWithRuangan();
        $data = [
            'title' => 'Data Inventaris',
            'tbl_inventaris' => $tabel['tbl_inventaris'],
        ];
        return view('/inventaris/datainventaris', $data);
    }
    public function indexpeminjam()
    {
        $inventaris = new InventarisModel();
        $ruangModel = new RuanganModel();
        $tabel['tbl_inventaris'] = $inventaris->getInventarisWithRuangan();
        $data = [
            'title' => 'Data Inventaris',
            'tbl_inventaris' => $tabel['tbl_inventaris'],
        ];
        return view('/inventaris/peminjam', $data);
    }
    public function store()
    {
        $data = [
            'id_inventaris' => $this->request->getVar('id_inventaris'),
            'nama_inventaris' => $this->request->getVar('nama_inventaris'),
            'jumlah_inventaris' => $this->request->getVar('jumlah_inventaris'),
            'id_ruangan' => $this->request->getVar('id_ruangan'),
            'nama_ruangan' => $this->request->getVar('nama_ruangan'),
            'id_operator' => $this->request->getVar('id_operator'),
            'gambar' => $this->request->getFile('gambar'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];

        $img = $this->request->getFile('gambar');
        if ($img && $img->isValid() && !$img->hasMoved()) {
            $imgData = file_get_contents($img->getTempName()); // Ambil data gambar
            $data['gambar'] = $imgData; // Simpan data gambar ke basis data
        } else { // Mengatasi kasus jika tidak ada gambar yang diupload
        }

        // Simpan data ke basis data
        $model = new InventarisModel();
        $model->insert($data);

        // Redirect atau memuat view setelah penyimpanan
        return redirect()->to('/datainventaris');
    }
    public function showImage($id_inventaris)
    {
        $model = new InventarisModel();
        $inv = $model->find($id_inventaris);

        if ($inv && $inv['gambar']) {
            header("Content-Type: image/jpeg"); // Adjust to your image type
            echo $inv['gambar'];
            exit;
        }
    }
    public function updateStock()
    {
        $id = $this->request->getPost('id');
        $newStock = $this->request->getPost('new_stock');

        if ($this->inventarisModel->updateStock($id, $newStock) > 0) {
            return redirect()->to('/inventaris')->with('success', 'Stok berhasil diperbarui.');
        } else {
            return redirect()->to('/inventaris')->with('error', 'Terjadi kesalahan saat memperbarui stok.');
        }
    }
    // ... (kode lainnya tetap sama)
}
