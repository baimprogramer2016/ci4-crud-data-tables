<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'user';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;

    protected $allowedFields    = ['nama', 'alamat'];

    // Dates

    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function search($cari)
    {
        return $this->table('user')->like('nama', $cari);
    }
}
