<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddTimestapmsToPostsTable extends Migration
{
    public function up()
    {
        $this->forge->addColumn('posts', [
            'created_at' => [
                'type' => 'DATETIME',
                'null' => false,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => false,
            ],
        ]);

        $this->forge->addKey('created_at');
        $this->forge->processIndexes('posts');
    }

    public function down()
    {
        $this->forge->dropColumn('posts', 'created_at');
        $this->forge->dropColumn('posts', 'updated_at');
    }
}
