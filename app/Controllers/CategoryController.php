<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Category;

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

        $data = [
            'title' => 'Tambah Kategori Baru',
            'validation' => \Config\Services::validation(),
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
                'errors' => 'Nama kategori tidak boleh kosong'
            ],
            'slug' => [
                'rules' => 'is_unique[categories.slug]',
                'errors' => 'Data ini sudah ada',
            ],
        ]);

        if (!$validated) {
            return redirect()->back()->withInput();
        }

        $category_model = new Category();
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

        $category_model = new Category();
        $category = $category_model->find($id);

        $data = [
            'title' => 'Edit Kategori',
            'category' => $category,
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
                'errors' => 'Nama harus diisi'
            ],
        ]);

        if (!$validated) {
            return redirect()->back()->withInput();
        }

        $data = [
            'category_name' => htmlspecialchars($this->request->getVar('category_name')),
            'slug' => url_title(htmlspecialchars($this->request->getVar('category_name')), '-', true),
        ];

        $category_model = new Category();
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
