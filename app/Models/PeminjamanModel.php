<?php

namespace App\Models;

use CodeIgniter\Model;

class PeminjamanModel extends Model
{
    protected $table = 'tbl_peminjaman';
    protected $primaryKey = 'id_peminjaman';
    protected $allowedFields = [
        'id_user', 'id_inventaris', 'jumlah_pinjam',
        'tanggal_peminjaman', 'tanggal_pengembalian', 'status'
    ];
}
