<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\RuanganModel;
use CodeIgniter\HTTP\Files\UploadedFile;

class User extends BaseController
{
    public function index()
    {
        $user = new UserModel();
        $tabel['tbl_users'] = $user->findAll();
        $data = [
            'title' => 'Data User',
            'tbl_users' => $tabel['tbl_users'],
        ];
        return view('/user/datauser', $data);
    }
    public function tambahuser()
    {
        $userModel = new UserModel();
        $data['tbl_users'] = $userModel->findAll();

        return view('user/tambahuser', $data);  // Tampilkan form create
    }
    public function store()
    {
        $userModel = new UserModel();
        $data = [
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'role' => $this->request->getPost('role'),
            'password' => $this->request->getPost('password'),
            'created_at' => date('Y-m-d H:i:s'),
        ];
        $userModel->insert($data);
        return redirect()->to('/user/datauser');
    }
}
