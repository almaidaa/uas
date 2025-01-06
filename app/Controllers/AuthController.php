<?php

namespace App\Controllers;

use App\Models\UserModel;

class AuthController extends BaseController
{
    public function login()
    {
        return view('auth/login');
    }


    public function processLogin()
    {
        $userModel = new UserModel();

        // Ambil data input
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Cari pengguna berdasarkan username
        $user = $userModel->where('username', $username)->first();

        if ($user) {
            // Verifikasi password secara langsung
            if (password_verify($this->request->getVar('password'), $user['password'])) { //untuk hash password
                // if ($password === $user['password']) {
                // Set session
                session()->set([
                    'user_id' => $user['id'],
                    'username' => $user['username'],
                    'role' => $user['role'],
                    'logged_in' => true,
                ]);
                return redirect()->to('/dashboard');
            } else {
                return redirect()->back()->with('error', 'Password salah!');
            }
        } else {
            return redirect()->back()->with('error', 'Username tidak ditemukan!');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
