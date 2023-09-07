<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Reservation extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'name' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'message' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'confirm' => [
                'type'           => 'INT',
                'constraint'     => 5,
            ],
            'created_at' => [
                'type'           => 'DATETIME',
                'null'           => true,
            ],
            'updated_at' => [
                'type'           => 'DATETIME',
                'null'           => true,
            ],
            'deleted_at' => [
                'type'           => 'DATETIME',
                'null'           => true,
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp'
        ]);
        $this->forge->addKey('id', true); //primary key
        $this->forge->createTable('reservation');
    }

    public function down()
    {
        $this->forge->dropTable('reservation');
    }
}
