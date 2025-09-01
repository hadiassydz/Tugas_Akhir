<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PartaiSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama_partai' => 'Partai Kebangkitan Bangsa', 
                'no_urut' => '1', 
                'image' => 'pkb.png'
            ],
            [
                'nama_partai' => 'Partai Gerindra', 
                'no_urut' => '2', 
                'image' => 'gerindra.png'
            ],
            [
                'nama_partai' => 'Partai Demokrasi Indonesia Perjuangan', 
                'no_urut' => '3', 
                'image' => 'pdip.png'
            ],
            [
                'nama_partai' => 'Partai Golkar', 
                'no_urut' => '4', 
                'image' => 'golkar.png'
            ],
            [
                'nama_partai' => 'Partai NasDem', 
                'no_urut' => '5', 
                'image' => 'nasdem.png'
            ],
            [
                'nama_partai' => 'Partai Buruh', 
                'no_urut' => '6', 
                'image' => 'buruh.png'
            ],
            [
                'nama_partai' => 'Partai Gelombang Rakyat Indonesia', 
                'no_urut' => '7', 
                'image' => 'gelora.png'
            ],
            [
                'nama_partai' => 'Partai Keadilan Sejahtera', 
                'no_urut' => '8', 
                'image' => 'pks.png'
            ],
            [
                'nama_partai' => 'Partai Kebangkitan Nusantara', 
                'no_urut' => '9', 
                'image' => 'pkn.png'
            ],
            [
                'nama_partai' => 'Partai Hati Nurani Rakyat', 
                'no_urut' => '10', 
                'image' => 'hanura.png'
            ],
            [
                'nama_partai' => 'Partai Garda Perubahan Indonesia', 
                'no_urut' => '11', 
                'image' => 'garuda.png'
            ],
            [
                'nama_partai' => 'Partai Amanat Nasional', 
                'no_urut' => '12', 
                'image' => 'pan.png'
            ],
            [
                'nama_partai' => 'Partai Bulan Bintang', 
                'no_urut' => '13', 
                'image' => 'pbb.png'
            ],
            [
                'nama_partai' => 'Partai Demokrat', 
                'no_urut' => '14', 
                'image' => 'demokrat.png'
            ],
            [
                'nama_partai' => 'Partai Solidaritas Indonesia', 
                'no_urut' => '15', 
                'image' => 'psi.png'
            ],
            [
                'nama_partai' => 'Partai Perindo', 
                'no_urut' => '16', 
                'image' => 'perindo.png'
            ],
            [
                'nama_partai' => 'Partai Persatuan Pembangunan', 
                'no_urut' => '17', 
                'image' => 'ppp.png'
            ],
            [
                'nama_partai' => 'Partai Ummat', 
                'no_urut' => '18', 
                'image' => 'ummat.png'
            ],
        ];

        $this->db->table('tb_partai')->insertBatch($data);
    }
}
