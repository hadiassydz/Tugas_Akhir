<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class Profil extends Controller
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    // Tampilkan halaman profil
    public function index()
    {
        $userId = session()->get('user_id');
        if(!$userId) return redirect()->to('/login');

        $data['user'] = $this->userModel->find($userId);
        return view('profil', $data);
    }

    // Update profil
    public function update()
    {
        $userId = session()->get('user_id');
        if(!$userId) return redirect()->to('/login');

        $user = $this->userModel->find($userId);

        // Validasi email unik (kecuali user sendiri)
        $email = $this->request->getPost('email');
        $existing = $this->userModel->where('email', $email)->first();
        if($existing && $existing['user_id'] != $userId){
            return redirect()->back()->withInput()->with('error', 'Email sudah digunakan');
        }

        $data = [
            'nama_user'  => $this->request->getPost('nama_user'),
            'email'      => $this->request->getPost('email'),
            'dapil_user' => $this->request->getPost('dapil_user'),
            'updated_at' => date('Y-m-d H:i:s')
        ];

        // Upload foto profil
        $fotoFile = $this->request->getFile('foto');
        if($fotoFile && $fotoFile->isValid() && !$fotoFile->hasMoved()) {
            $newName = $fotoFile->getRandomName();
            $fotoFile->move(ROOTPATH . 'public/uploads', $newName);

            // Hapus foto lama jika ada
            if($user['foto']){
                $oldFile = ROOTPATH . 'public/uploads/' . $user['foto'];
                if(file_exists($oldFile)) unlink($oldFile);
            }

            $data['foto'] = $newName;
        }

        $this->userModel->update($userId, $data);

        // Update session
        session()->set([
            'nama_user' => $data['nama_user'],
            'email'     => $data['email'],
        ]);
        if(isset($data['foto'])){
            session()->set('foto', $data['foto']);
        }

        return redirect()->to('/profil')->with('success', 'Profil berhasil diperbarui');
    }

    // 🔹 Hapus foto profil
    public function hapusFoto()
    {
        $userId = session()->get('user_id');
        if(!$userId) return redirect()->to('/login');

        $user = $this->userModel->find($userId);

        if($user && $user['foto']){
            $oldFile = ROOTPATH . 'public/uploads/' . $user['foto'];
            if(file_exists($oldFile)) unlink($oldFile);

            // update database jadi NULL
            $this->userModel->update($userId, ['foto' => null]);

            // update session
            session()->remove('foto');
        }

        return redirect()->to('/profil')->with('success', 'Foto profil berhasil dihapus');
    }
}
