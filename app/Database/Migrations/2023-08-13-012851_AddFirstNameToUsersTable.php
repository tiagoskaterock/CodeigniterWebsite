<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddFirstNameToUsersTable extends Migration
{
    public function up()
    {
        $this->forge->addColumn('users', [
            'firstname' => [
                'type'       => 'VARCHAR',
                'constraint' => 64,
                'null'       => false,
            ]
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('users', 'firstname');
    }
}
