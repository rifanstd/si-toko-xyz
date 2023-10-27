<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'category_name' => 'Makanan',
                'slug' => 'makanan',
            ],
            [
                'category_name' => 'Minuman',
                'slug' => 'minuman',
            ],
        ];

        $this->db->table('categories')->insertBatch($data);
    }
}
