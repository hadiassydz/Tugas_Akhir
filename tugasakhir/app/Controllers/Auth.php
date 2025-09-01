<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Auth extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    // Halaman form register
    public function register()
    {
        return view('register');
    }

    // Proses data register
    public function processRegister()
    {
        $validation = \Config\Services::validation();

        $rules = [
            'nama_user' => 'required|min_length[3]',
            'email'     => 'required|valid_email|is_unique[tb_user.email]',
            'password'  => 'required|min_length[6]',
            'confirm_password' => 'required|matches[password]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('error', $validation->listErrors());
        }

        $data = [
            'nama_user'  => $this->request->getPost('nama_user'),
            'email'      => $this->request->getPost('email'),
            'dapil_user' => $this->request->getPost('dapil_user'),
            'password'   => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'created_at' => date('Y-m-d H:i:s'),
        ];

        $this->userModel->insert($data);

        return redirect()->to('/login')->with('success', 'Registrasi berhasil, silakan login.');
    }

    // Halaman form login
    public function login()
    {
        return view('login');
    }

    // Proses login
    public function processLogin()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = $this->userModel->where('email', $email)->first();

        if ($user && password_verify($password, $user['password'])) {
            // simpan session sementara login
            session()->set([
                'user_id'   => $user['user_id'],
                'nama_user' => $user['nama_user'],
                'email'     => $user['email'],
                'logged_in' => true
            ]);

            // Tampilkan popup di login, lalu redirect ke /pemilu
            return view('login', ['login_success' => true, 'nama_user' => $user['nama_user']]);
        }

        return redirect()->back()->with('error', 'Email atau password salah');
    }

    // Logout
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login')->with('success', 'Anda telah logout');
    }
}
