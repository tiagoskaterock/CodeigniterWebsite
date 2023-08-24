<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddUserIdToPostsTable extends Migration
{
    public function up()
    {
        $this->forge->addColumn('posts', [
            'users_id' => [
                'type' => 'INT',
                'null' => false,
                'unsigned' => true,
                'constraint' => 11,
            ]
        ]);
        
        $sql = "SELECT id FROM users LIMIT 1";

        $result = $this->db->query($sql)->getResult();

        if($result) {
            $sql = "UPDATE posts set users_id = {$result[0]->id}";
            $this->db->query($sql);
        }

        $this->forge->addForeignKey('users_id', 'users', 'id', 'CASCADE', 'CASCADE', 'posts_users_id_fk');

        $this->forge->processIndexes('posts');
    }

    public function down()
    {
        $this->forge->dropForeignKey('posts', 'posts_users_id_fk');
        $this->forge->dropColumn('posts', 'users_id');
    }
}