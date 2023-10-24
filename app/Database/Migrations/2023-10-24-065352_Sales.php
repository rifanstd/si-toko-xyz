<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Sales extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_sale' => [
                'type' => 'INT',
                'constraint' => 20,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_transaction' => [
                'type' => 'INT',
                'constraint' => 20,
                'unsigned' => true,
            ],
            'id_product' => [
                'type' => 'INT',
                'constraint' => 20,
                'unsigned' => true,
            ],
            'price_per_product' => [
                'type' => 'INT',
                'constraint' => 20,
                'unsigned' => true,
            ],
            'number_of_products' => [
                'type' => 'INT',
                'constraint' => 20,
                'unsigned' => true,
            ],
            'total_price' => [
                'type' => 'INT',
                'constraint' => 20,
                'unsigned' => true,
            ],
        ]);

        $this->forge->addKey('id_sale', true);
        $this->forge->createTable('sales');
    }

    public function down()
    {
        $this->forge->dropTable('sales');
    }
}
