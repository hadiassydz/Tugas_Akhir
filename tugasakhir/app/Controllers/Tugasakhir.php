<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;
use App\Models\PartaiModel;


class Tugasakhir extends BaseController
{
    public function index()
    {
        // ambil data partai dari database
        $partaiModel = new PartaiModel();
        $data['partai'] = $partaiModel->findAll();

        // tampilkan view beranda.php dan kirim data
        return view('beranda', $data);
    }
}
