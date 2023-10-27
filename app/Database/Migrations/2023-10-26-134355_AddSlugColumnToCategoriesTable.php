<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddSlugColumnToCategoriesTable extends Migration
{
    public function up()
    {
        $this->forge->addColumn('categories', [
            'slug' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('categories', 'slug');
    }
}
