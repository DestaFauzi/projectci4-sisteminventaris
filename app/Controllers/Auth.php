<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class Auth extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login()
    {
        $session = session();
        $model = new UserModel();

        // Ambil input dari form login
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Validasi input
        if (!$this->validate([
            'username' => 'required',
            'password' => 'required'
        ])) {
            return view('login', [
                'validation' => $this->validator,
            ]);
        }

        // Cari user berdasarkan username
        $user = $model->where('username', $username)->first();

        // Debugging
        if (!$user) {
            $session->setFlashdata('msg', 'User not found');
            return redirect()->to('/auth');
        }

        // Cek apakah user ditemukan dan password benar
        if ($password === $user['password']) {
            $session->set([
                'id' => $user['id'],
                'username' => $user['username'],
                'role' => $user['role'],
                'logged_in' => TRUE
            ]);

            return redirect()->to('/dashboard');
        } else {
            $session->setFlashdata('msg', 'Invalid Username or Password');
            return redirect()->to('/auth');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/auth');
    }
}
