<?php

namespace App\Controllers;

use CodeIgniter\Cotroller;
// use App\Models\RuanganModel;
use App\Models\RuanganModel;

class Ruangan extends BaseController
{
    protected $ruanganModel;
    public function index()
    {
        $ruanganModel = new RuanganModel();
        $tabel['tbl_ruangan'] = $ruanganModel->findAll();
        $data = [
            'title' => 'Data Ruangan',
            'tbl_ruangan' => $tabel['tbl_ruangan'],
        ];
        return view('/ruangan/index', $data);
    }
    public function indexuser()
    {
        $ruanganModel = new RuanganModel();
        $tabel['tbl_ruangan'] = $ruanganModel->findAll();
        $data = [
            'title' => 'Data Ruangan',
            'tbl_ruangan' => $tabel['tbl_ruangan'],
        ];
        return view('/ruangan/indexpeminjam', $data);
    }
    public function create()
    {
        return view('ruangan/create'); // Menampilkan form tambah ruangan
    }

    public function store()
    {
        // Validasi data yang dikirimkan dari form
        $validation = \Config\Services::validation();
        $validation->setRules([
            'nama_ruangan' => 'required',
            'gedung' => 'required',
            // Sesuaikan dengan aturan validasi lainnya
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Proses menyimpan data ruangan ke dalam database
        $data = [
            'nama_ruangan' => $this->request->getPost('nama_ruangan'),
            'gedung' => $this->request->getPost('gedung'),
            // Sesuaikan dengan nama-nama kolom lainnya
        ];

        $model = new RuanganModel();
        $model->insert($data);
        return redirect()->to('/ruangan/data')->with('success', 'Ruangan berhasil ditambahkan');
    }
}
