<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id';
    protected $allowedFields = ['username', 'password', 'nama', 'email', 'no_hp', 'alamat', 'role'];
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    public function getUser($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }

    public function getUserByUsername($username)
    {
        return $this->where(['username' => $username])->first();
    }

    public function getUserByEmail($email)
    {
        return $this->where(['email' => $email])->first();
    }

    public function getUserByNoHp($no_hp)
    {
        return $this->where(['no_hp' => $no_hp])->first();
    }

    public function getUserByRole($role)
    {
        return $this->where(['role' => $role])->findAll();
    }

    public function getUserByRoleAndId($role, $id)
    {
        return $this->where(['role' => $role, 'id' => $id])->first();
    }

    public function getUserByRoleAndUsername($role, $username)
    {
        return $this->where(['role' => $role, 'username' => $username])->first();
    }
}
