<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Dashboard extends Controller
{
    public function index()
    {
        $session = session();
        if (!$session->get('logged_in')) {
            return redirect()->to('/auth');
        }

        $role = $session->get('role');
        switch ($role) {
            case 'admin':
                return view('dashboard/admin');
            case 'operator':
                return view('dashboard/operator');
            case 'peminjam':
                return view('dashboard/peminjam');
            default:
                return redirect()->to('/auth');
        }
    }
}
