<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;
use Config\Services;

class UserController extends BaseController
{
    public function index()
    {
        $session = session();

        if ($session->get("role") != '1') {
            return redirect()->back()->withInput();
        }

        $user_model = new User();
        $users = $user_model->findAll();

        $data = [
            'title' => 'Akun',
            'users' => $users,
        ];

        return view('admin/account/index', $data);
    }

    public function create()
    {
        $session = session();

        if ($session->get("role") != '1') {
            return redirect()->back()->withInput();
        }

        if (session('validation') != null) {
            $validation = session('validation');
        } else {
            $validation = Services::validation();
        }

        $data = [
            'title' => 'Tambah Akun Baru',
            'validation' => $validation,
        ];


        return view('admin/account/create', $data);
    }

    public function store()
    {
        $data = [
            'username' => htmlspecialchars($this->request->getVar('username')),
            'password' => htmlspecialchars(password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)),
            'full_name' => htmlspecialchars($this->request->getVar('full_name')),
            'role' => '2',
        ];

        $validated = $this->validate([
            'username' => [
                'rules' => 'required|is_unique[users.username]',
                'errors' => [
                    'required' => 'Username tidak boleh kosong.',
                    'is_unique' => 'Username ini sudah digunakan, silahkan pilih username lain.'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' => 'Password tidak boleh kosong',
                    'min_length' => 'Jumlah minimum karakter adalah 8.'
                ]
            ],
            'full_name' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama tidak boleh kosong.'
                ]
            ],
        ]);

        if (!$validated) {
            $validation = Services::validation();
            return redirect()->back()->withInput()->with('validation', $validation);
        }

        $user_model = new User();
        $user_model->insert($data);

        session()->setFlashdata('success_msg', 'Data berhasil ditambahkan');

        return redirect()->to('/users');
    }

    public function edit($id_user)
    {
        $session = session();
        $user_model = new User();

        if ($session->get("role") != '1') {
            return redirect()->back()->withInput();
        }

        $user = $user_model->find($id_user);

        if (session('validation') != null) {
            $validation = session('validation');
        } else {
            $validation = Services::validation();
        }

        $data = [
            'title' => 'Edit Data Akun',
            'user' => $user,
            'validation' => $validation
        ];

        return view('admin/account/edit', $data);
    }

    public function update()
    {
        $session = session();
        $user_model = new User();

        if ($session->get("role") != '1') {
            return redirect()->back()->withInput();
        }

        $old_user = $user_model->find($this->request->getVar('id_user'));

        $rule_full_name = [
            'rules' => 'required',
            'errors' => [
                'required' => 'Nama harus di isi'
            ]
        ];

        if ($old_user['username'] == $this->request->getVar('username')) {
            $rule_username = [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Field username Harus Diisi',
                ]
            ];
        } else {
            $rule_username = [
                'rules' => 'required|is_unique[users.username]',
                'errors' => [
                    'required' => 'Username Harus Diisi',
                    'is_unique' => 'Username yang diinputkan sudah terdapat di database. Silahkan gunakan username yang lain'
                ]
            ];
        }

        $rule_password = [
            'rules' => 'min_length[8]',
            'errors' => [
                'min_length' => 'Panjang password minimal adalah 8 karakter'
            ]
        ];

        $validated = $this->validate([
            'full_name' => $rule_full_name,
            'username' => $rule_username,
            'password' => $rule_password
        ]);

        if (!$validated) {
            $validation = Services::validation();
            return redirect()->back()->withInput()->with('validation', $validation);
        }

        $data = [
            'full_name' => htmlspecialchars($this->request->getVar('full_name')),
            'username' => htmlspecialchars($this->request->getVar('username')),
            'password' => htmlspecialchars(
                (strlen($this->request->getVar('password')) == 0
                    ?
                    $old_user['password']
                    :
                    password_hash($this->request->getVar('password'), PASSWORD_DEFAULT))
            ),
        ];

        $user_model->update($this->request->getVar('id_user'), $data);

        session()->setFlashdata('success_msg', 'Data berhasil diubah');

        return redirect()->to('/users');
    }

    public function delete()
    {
        $session = session();
        $user_model = new User();

        if ($session->get("role") != '1') {
            return redirect()->back()->withInput();
        }

        $user_model->delete($this->request->getVar('id_user'));

        session()->setFlashdata('success_msg', 'Data berhasil dihapus !!!');

        return redirect()->to('/users');
    }
}
