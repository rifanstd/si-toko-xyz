<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Product;
use App\Models\Transaction;

class TransactionController extends BaseController
{
    public function index()
    {
        $session = session();

        if ($session->get("role") != '2') {
            return redirect()->back()->withInput();
        }

        $transaction_model = new Transaction();
        $transactions = $transaction_model->findAll();

        $data = [
            'title' => 'Dashboard ' . $session->get('full_name'),
            'transactions' => $transactions,
        ];

        return view('employee/transaction/index', $data);
    }

    public function create()
    {
        $session = session();

        if ($session->get("role") != '2') {
            return redirect()->back()->withInput();
        }

        $product_model = new Product();
        $products = $product_model->getAllProducts();

        $data = [
            'title' => 'Form Tambah Transaksi',
            'products' => $products,
        ];

        return view('employee/transaction/create', $data);
    }

    public function store()
    {
        $session = session();

        if ($session->get("role") != '2') {
            return redirect()->back()->withInput();
        }

        $id_product = $this->request->getVar('id_product');
        $jumlah = $this->request->getVar('jumlah');

        $product_model = new Product();
        $product = $product_model->find($id_product);

        $total_price = $jumlah * $product['price'];

        $data = [
            'id_product' => $product['id_product'],
            'product_name' => $product['product_name'],
            'num_of_products' => $jumlah,
            'total_price' => $total_price,
            'date' => Date('Y-m-d'),
        ];

        $transaction_model = new Transaction();
        $transaction_model->insert($data);

        session()->setFlashdata('success_msg', 'Data berhasil ditambahkan');

        return redirect()->to('/transactions');
    }

    public function delete()
    {
        $session = session();
        $transaction_model = new Transaction();

        if ($session->get("role") != '1') {
            return redirect()->back()->withInput();
        }

        $transaction_model->delete($this->request->getVar('id_transaction'));

        session()->setFlashdata('success_msg', 'Data berhasil dihapus !!!');

        return redirect()->to('/transactions');
    }
}
