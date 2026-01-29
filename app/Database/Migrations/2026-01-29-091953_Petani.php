<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Petani extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nama_petani' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'alamat_petani' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('petani');
    }

    public function down()
    {
        $this->forge->dropTable('petani');
    }
}
