<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class DashboardController extends BaseController
{
    public function index()
    {
        $session = session();

        if ($session->get("isLoggedIn") != true) {
            echo "APASIH";
            return redirect()->back()->withInput();
        }

        $data = [
            'title' => 'Dashboard ' . $session->get('full_name'),
        ];

        if ($session->get('role') == '1') {
            return view('admin/dashboard', $data);
        } else {
            return view('employee/dashboard', $data);
        }

    }
}
