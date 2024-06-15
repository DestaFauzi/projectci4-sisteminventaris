<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'tbl_users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['username', 'password', 'role', 'email'];

    public function getOperator()
    {
        return $this->where('role', 'operator')->findAll();
    }
    public function getPeminjam()
    {
        return $this->where('role', 'peminjam')->findAll();
    }
    public function getByRole($role)
    {
        return $this->where('role', $role)->findAll();
    }

    public function getAllUsers()
    {
        return $this->findAll();
    }

    public function getUserById($id)
    {
        return $this->where('id', $id)->first();
    }

    public function createUser($data)
    {
        return $this->insert($data);
    }

    public function updateUser($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteUser($id)
    {
        return $this->delete($id);
    }
}
