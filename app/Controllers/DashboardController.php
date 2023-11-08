<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Product;
use App\Models\Transaction;

class DashboardController extends BaseController
{
    public function index()
    {
        $session = session();

        if ($session->get("isLoggedIn") != true) {
            return redirect()->back()->withInput();
        }

        if ($session->get('role') == '1') {
            $data = [
                'title' => 'Dashboard ' . $session->get('full_name'),
            ];
            return view('admin/dashboard', $data);
        } else {
            return redirect()->to('/transactions');
        }

    }
}
