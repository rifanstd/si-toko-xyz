<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;

class AuthController extends BaseController
{
    public function login()
    {
        $session = session();

        if ($session->get('isLoggedIn') == true) {
            return redirect()->back()->withInput();
        }

        $data = [
            'title' => 'Login'
        ];

        return view('auth/login', $data);
    }

    public function login_attempt()
    {
        $session = session();
        $user = new User();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        $data = $user->where('username', $username)->first();

        if ($data) {
            $dbPass = $data['password'];
            $authPass = password_verify($password, $dbPass);
            if ($authPass) {
                $sessionData = [
                    'id_akun' => $data['id_user'],
                    'username' => $data['username'],
                    'full_name' => $data['full_name'],
                    'role' => $data['role'],
                    'isLoggedIn' => TRUE,
                ];

                $session->set($sessionData);

                if ($data['role'] == '1') {
                    return redirect()->to('/');
                }

                // Nanti diganti ke halaman utama kasir
                return redirect()->to('/');

            } else {
                $session->setFlashdata('message', 'Password incorrect.');
                return redirect()->to('/login');
            }
        } else {
            $session->setFlashdata('message', 'Username does not exist.');
            return redirect()->to('/login');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();

        return redirect()->to('/login');
    }
}
