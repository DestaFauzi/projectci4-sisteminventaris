<?php

namespace App\Models;

use CodeIgniter\Model;

class InventarisModel extends Model
{
    protected $table = 'tbl_inventaris';
    protected $primaryKey = 'id_inventaris';
    protected $allowedFields = [
        'nama_inventaris', 'jumlah_inventaris', 'stok',
        'id_ruangan', 'nama_ruangan', 'id_operator',
        'gambar', 'created_at', 'updated_at'
    ];
    public function getInventarisWithRuangan()
    {
        // Ambil data inventaris beserta informasi ruangannya
        return $this->db->table($this->table)
            ->select('tbl_inventaris.*, tbl_ruangan.nama_ruangan')
            ->join('tbl_ruangan', 'tbl_ruangan.id_ruangan = tbl_inventaris.id_ruangan')
            ->get()
            ->getResultArray();
    }
}
