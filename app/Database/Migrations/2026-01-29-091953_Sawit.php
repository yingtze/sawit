<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Sawit extends Migration
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
            'jenis_sawit' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'harga_per_kg' => [ // Legacy: harga_jual
                'type' => 'DECIMAL',
                'constraint' => '10,0', // Using decimal for currency safety, 0 scale for IDR
            ],
            'potongan_persen' => [ // Legacy: potongan
                'type' => 'DECIMAL',
                'constraint' => '5,2',
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
        $this->forge->createTable('sawit');
    }

    public function down()
    {
        $this->forge->dropTable('sawit');
    }
}
