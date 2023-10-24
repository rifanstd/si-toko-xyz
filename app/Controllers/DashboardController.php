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
            'title' => 'Dashboard'
        ];

        return view('dashboard', $data);
    }
}
