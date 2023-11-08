<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Product extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_product' => [
                'type' => 'INT',
                'constraint' => 20,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_category' => [
                'type' => 'INT',
                'constraint' => 20,
                'unsigned' => true,
            ],
            'product_name' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'price' => [
                'type' => 'INT',
                'constraint' => 20,
                'unsigned' => true,
            ],
            'stock' => [
                'type' => 'INT',
                'constraint' => 20,
            ],
        ]);

        $this->forge->addKey('id_product', true);
        $this->forge->createTable('products');
    }

    public function down()
    {
        $this->forge->dropTable('products');
    }
}
