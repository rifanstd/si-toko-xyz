<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\User;

class DashboardController extends BaseController
{
    public function index()
    {
        $session = session();

        if ($session->get("isLoggedIn") != true) {
            return redirect()->back()->withInput();
        }

        if ($session->get('role') == '1') {
            $product_model = new Product();
            $products = $product_model->getAllProducts();

            $transaction_model = new Transaction();
            $transactions = $transaction_model->findAll();

            $some_transactions = [];

            for ($i = 0; $i < count($transactions); $i++) {
                array_push($some_transactions, $transactions[$i]);

                if ($i == 4) {
                    break;
                }
            }

            $total_income = 0;

            foreach ($transactions as $transaction) {
                $total_income += $transaction['total_price'];
            }

            $user_model = new User();
            $users = $user_model->findAll();

            $data = [
                'title' => 'Dashboard ' . $session->get('full_name'),
                'transactions' => $some_transactions,
                'num_of_products' => count($products),
                'num_of_transactions' => count($transactions),
                'num_of_employee' => count($users),
                'total_income' => $total_income,
            ];
            return view('admin/dashboard', $data);
        } else {
            return redirect()->to('/transactions');
        }

    }
}
