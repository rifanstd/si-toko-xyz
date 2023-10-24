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
        ];

        $this->db->table('users')->insertBatch($data);
    }
}
