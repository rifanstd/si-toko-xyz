<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Supplier;
use Config\Services;

class SupplierController extends BaseController
{
    public function index()
    {
        $session = session();

        if ($session->get("role") != '1') {
            return redirect()->back()->withInput();
        }

        $supplier_model = new Supplier();
        $suppliers = $supplier_model->findAll();

        $data = [
            'title' => 'Data Supplier',
            'suppliers' => $suppliers,
        ];

        return view('admin/supplier/index', $data);
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
            'title' => 'Tambah Supplier Baru',
            'validation' => $validation,
        ];


        return view('admin/supplier/create', $data);
    }

    public function store()
    {
        $session = session();

        if ($session->get("role") != '1') {
            return redirect()->back()->withInput();
        }

        $validated = $this->validate([
            'email' => [
                'rules' => 'required|is_unique[suppliers.email]',
                'errors' => [
                    'required' => 'Email wajib diisi',
                    'is_unique' => 'Email telah digunakan oleh Supplier lain'
                ]
            ],
            'supplier_name' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama harus diisi'
                ]
            ],
            'description' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Deskripsi wajib diisi'
                ]
            ],
            'address' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat wajib diisi'
                ]
            ],
            'phone_number' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nomor telepon wajib diisi'
                ]
            ]
        ]);

        if (!$validated) {
            $validation = Services::validation();
            return redirect()->back()->withInput()->with('validation', $validation);
        }

        $data = [
            'email' => htmlspecialchars($this->request->getVar('email')),
            'supplier_name' => htmlspecialchars($this->request->getVar('supplier_name')),
            'description' => htmlspecialchars($this->request->getVar('description')),
            'address' => htmlspecialchars($this->request->getVar('address')),
            'phone_number' => htmlspecialchars($this->request->getVar('phone_number')),
        ];

        $supplier_model = new Supplier();
        $supplier_model->insert($data);

        session()->setFlashdata('success_msg', 'Data berhasil ditambahkan');

        return redirect()->to('/suppliers');
    }

    public function edit($id_supplier)
    {
        $session = session();
        $supplier_model = new Supplier();

        if ($session->get("role") != '1') {
            return redirect()->back()->withInput();
        }

        $supplier = $supplier_model->find($id_supplier);

        if (session('validation') != null) {
            $validation = session('validation');
        } else {
            $validation = Services::validation();
        }

        $data = [
            'title' => 'Edit Data Akun',
            'supplier' => $supplier,
            'validation' => $validation
        ];

        return view('admin/supplier/edit', $data);
    }

    public function update()
    {
        $session = session();

        if ($session->get("role") != '1') {
            return redirect()->back()->withInput();
        }

        $supplier_model = new Supplier();

        $old_supplier = $supplier_model->find($this->request->getVar('id_supplier'));

        if ($old_supplier['email'] == $this->request->getVar('email')) {
            $rule_email = [
                'rules' => 'required',
                'errors' => 'Email harus diisi'
            ];
        } else {
            $rule_email = [
                'rules' => 'required|is_unique[suppliers.email]',
                'errors' => [
                    'required' => 'Email wajib diisi',
                    'is_unique' => 'Email telah digunakan oleh Supplier lain'
                ]
            ];
        }

        $validated = $this->validate([
            'email' => $rule_email,
            'supplier_name' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama harus diisi'
                ]
            ],
            'description' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Deskripsi wajib diisi'
                ]
            ],
            'address' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat wajib diisi'
                ]
            ],
            'phone_number' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nomor telepon wajib diisi'
                ]
            ]
        ]);

        if (!$validated) {
            $validation = Services::validation();
            return redirect()->back()->withInput()->with('validation', $validation);
        }

        $data = [
            'email' => htmlspecialchars($this->request->getVar('email')),
            'supplier_name' => htmlspecialchars($this->request->getVar('supplier_name')),
            'description' => htmlspecialchars($this->request->getVar('description')),
            'address' => htmlspecialchars($this->request->getVar('address')),
            'phone_number' => htmlspecialchars($this->request->getVar('phone_number')),
        ];

        $supplier_model->update($this->request->getVar('id_supplier'), $data);

        session()->setFlashdata('success_msg', 'Data berhasil diubah');

        return redirect()->to('/suppliers');

    }

    public function delete()
    {
        $session = session();
        $supplier_model = new Supplier();

        if ($session->get("role") != '1') {
            return redirect()->back()->withInput();
        }

        $supplier_model->delete($this->request->getVar('id_supplier'));

        session()->setFlashdata('success_msg', 'Data berhasil dihapus !!!');

        return redirect()->to('/suppliers');
    }
}
