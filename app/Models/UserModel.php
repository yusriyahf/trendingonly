<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'tb_users';
    protected $primaryKey = 'id_user';
    protected $allowedFields = ['username', 'password', 'nama_lengkap', 'email', 'role', 'created_at'];
    protected $useTimestamps = false;

    // Untuk menambahkan data
    public function createUser($data)
    {
        return $this->insert($data);
    }

    // Untuk mengambil data pengguna berdasarkan ID
    public function getUserById($id)
    {
        return $this->find($id);
    }

    // Untuk mendapatkan semua pengguna
    public function getAllUsers()
    {
        return $this->findAll();
    }
}
