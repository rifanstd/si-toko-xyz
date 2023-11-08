<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Category;
use Config\Services;

class CategoryController extends BaseController
{
    public function index()
    {
        $session = session();

        if ($session->get("role") != '1') {
            return redirect()->back()->withInput();
        }

        $category_model = new Category();
        $categories = $category_model->findAll();

        $data = [
            'title' => 'Kategori',
            'categories' => $categories,
        ];

        return view('admin/category/index', $data);
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

        if (session('data_already_exist') != null) {
            $data_already_exist = session('data_already_exist');
        } else {
            $data_already_exist = null;
        }

        $data = [
            'title' => 'Tambah Kategori Baru',
            'validation' => $validation,
            'data_already_exist' => $data_already_exist,
        ];

        return view('admin/category/create', $data);
    }

    public function store()
    {
        $session = session();

        if ($session->get("role") != '1') {
            return redirect()->back()->withInput();
        }

        $slug = url_title($this->request->getVar('category_name'), '-', true);

        $data = [
            'category_name' => $this->request->getVar('category_name'),
            'slug' => $slug,
        ];

        $validated = $this->validate([
            'category_name' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama kategori tidak boleh kosong',
                ]
            ],
        ]);

        if (!$validated) {
            $validation = Services::validation();
            return redirect()->back()->withInput()->with('validation', $validation);
        }

        $category_model = new Category();

        $category = $category_model->where('slug', $slug)->first();

        if ($category != null) {
            return redirect()->back()->withInput()->with('data_already_exist', 'Data kategori tersebut sudah ada dalam database');
        }

        $category_model->insert($data);

        session()->setFlashdata('success_msg', 'Data berhasil ditambahkan');

        return redirect()->to('/categories');
    }

    public function edit($id)
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

        if (session('data_already_exist') != null) {
            $data_already_exist = session('data_already_exist');
        } else {
            $data_already_exist = null;
        }

        $category_model = new Category();
        $category = $category_model->find($id);

        $data = [
            'title' => 'Edit Kategori',
            'category' => $category,
            'validation' => $validation,
            'data_already_exist' => $data_already_exist,
        ];

        return view('admin/category/edit.php', $data);
    }

    public function update()
    {
        $session = session();

        if ($session->get("role") != '1') {
            return redirect()->back()->withInput();
        }

        $validated = $this->validate([
            'category_name' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama harus diisi',
                ]
            ],
        ]);

        if (!$validated) {
            $validation = Services::validation();
            return redirect()->back()->withInput()->with('validation', $validation);
        }

        $slug = url_title($this->request->getVar('category_name'), '-', true);

        $data = [
            'category_name' => htmlspecialchars($this->request->getVar('category_name')),
            'slug' => $slug,
        ];

        $category_model = new Category();

        $category = $category_model->where('slug', $slug)->first();

        if ($category != null) {
            return redirect()->back()->withInput()->with('data_already_exist', 'Data kategori tersebut sudah ada dalam database');
        }

        $category_model->update($this->request->getVar('id_category'), $data);

        session()->setFlashdata('success_msg', 'Data berhasil diubah');

        return redirect()->to('/categories');
    }

    public function delete()
    {
        $session = session();
        $category_model = new Category();

        if ($session->get("role") != '1') {
            return redirect()->back()->withInput();
        }

        $category_model->delete($this->request->getVar('id_category'));

        session()->setFlashdata('success_msg', 'Data berhasil dihapus !!!');

        return redirect()->to('/categories');
    }
}
