<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                "id_category" => 1,
                "product_name" => "Roma Kelapa",
                "price" => 10000,
                "stock" => 20,
            ],
            [
                "id_category" => 1,
                "product_name" => "Roma Sandwich",
                "price" => 15000,
                "stock" => 25,
            ],
            [
                "id_category" => 2,
                "product_name" => "Ale-Ale",
                "price" => 2000,
                "stock" => 100,
            ],
            [
                "id_category" => 2,
                "product_name" => "Teh Pucuk",
                "price" => 7000,
                "stock" => 150,
            ],

        ];

        $this->db->table("products")->insertBatch($data);
    }
}
