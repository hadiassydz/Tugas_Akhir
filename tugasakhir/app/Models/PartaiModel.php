<?php

namespace App\Models;

use CodeIgniter\Model;

class PartaiModel extends Model
{
    protected $table = 'tb_partai';
    protected $primaryKey = 'partai_id';
    protected $allowedFields = ['nama_partai', 'singkatan', 'logo', 'created_at', 'updated_at'];
    protected $useTimestamps = false;
}
