<?php

namespace App\Models;

use CodeIgniter\Model;

class RuanganModel extends Model
{

    protected $table         = 'tbl_ruangan';
    protected $primarykey = 'id_ruangan';
    protected $allowedFields = [
        'id_ruangan', 'nama_ruangan', 'gedung',
    ];
    public function getRuangan()
    {
        return $this->findAll();
    }
}
