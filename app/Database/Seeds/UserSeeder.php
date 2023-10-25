<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'username' => 'admin',
                'password' => password_hash('admin123', PASSWORD_DEFAULT),
                'full_name' => 'Admin',
                'role' => '1',
            ],
            [
                'username' => 'kasir1',
                'password' => password_hash('kasir123', PASSWORD_DEFAULT),
                'full_name' => 'Kasir 1',
                'role' => '2',
            ],
        ];

        $this->db->table('users')->insertBatch($data);
    }
}
