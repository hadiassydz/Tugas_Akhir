<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'tb_user';
    protected $primaryKey = 'user_id';
    protected $allowedFields = ['nama_user', 'foto', 'email', 'dapil_user', 'password', 'created_at', 'updated_at'];
    protected $useTimestamps = false;
}
