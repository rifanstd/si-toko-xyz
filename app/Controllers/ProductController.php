<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Category;
use App\Models\Product;

class ProductController extends BaseController
{
    public function index()
    {
        $session = session();

        if ($session->get("role") != '1') {
            return redirect()->back()->withInput();
        }

        $product_model = new Product();
        $products = $product_model->getAllProducts();

        $data = [
            'title' => 'Produk',
            'products' => $products,
        ];

        return view('admin/product/index.php', $data);
    }

    public function create()
    {
        $session = session();

        if ($session->get("role") != '1') {
            return redirect()->back()->withInput();
        }

        $category_model = new Category();
        $categories = $category_model->findAll();

        $data = [
            'title' => 'Tambah Produk',
            'categories' => $categories,
            'validation' => \Config\Services::validation(),
        ];

        return view('admin/product/create', $data);
    }

    public function store()
    {
        $session = session();

        if ($session->get("role") != '1') {
            return redirect()->back()->withInput();
        }

        $data = [
            'product_name' => htmlspecialchars($this->request->getVar('product_name')),
            'price' => htmlspecialchars($this->request->getVar('price')),
            'stock' => htmlspecialchars($this->request->getVar('stock')),
            'id_category' => htmlspecialchars($this->request->getVar('id_category')),
        ];

        $product_model = new Product();
        $product_model->insert($data);

        session()->setFlashdata('success_msg', 'Data berhasil ditambahkan');

        return redirect()->to('/products');
    }

    public function edit($id)
    {
        $session = session();

        if ($session->get("role") != '1') {
            return redirect()->back()->withInput();
        }

        $product_model = new Product();
        $product = $product_model->find($id);

        $category_model = new Category();
        $categories = $category_model->findAll();

        $data = [
            'title' => 'Edit Produk',
            'product' => $product,
            'categories' => $categories,
            'validation' => \Config\Services::validation(),
        ];

        return view('admin/product/edit', $data);
    }

    public function update()
    {
        $session = session();

        if ($session->get("role") != '1') {
            return redirect()->back()->withInput();
        }

        $data = [
            'product_name' => htmlspecialchars($this->request->getVar('product_name')),
            'price' => htmlspecialchars($this->request->getVar('price')),
            'stock' => htmlspecialchars($this->request->getVar('stock')),
            'id_category' => htmlspecialchars($this->request->getVar('id_category')),
        ];

        $product_model = new Product();
        $product_model->update($this->request->getVar('id_product'), $data);

        session()->setFlashdata('success_msg', 'Data berhasil diubah');

        return redirect()->to('/products');
    }

    public function delete()
    {
        $session = session();
        $product_model = new Product();

        if ($session->get("role") != '1') {
            return redirect()->back()->withInput();
        }

        $product_model->delete($this->request->getVar('id_product'));

        session()->setFlashdata('success_msg', 'Data berhasil dihapus !!!');

        return redirect()->to('/products');
    }
}
