<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Transaksi extends Migration
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
            'petani_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'sawit_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'tanggal' => [
                'type' => 'DATE',
            ],
            'berat_kg' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'harga_per_kg' => [
                'type' => 'DECIMAL',
                'constraint' => '10,0',
            ],
            'potongan_persen' => [
                'type' => 'DECIMAL',
                'constraint' => '5,2',
            ],
            'subtotal' => [
                'type' => 'DECIMAL',
                'constraint' => '15,0',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('petani_id', 'petani', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('sawit_id', 'sawit', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('transaksi');
    }

    public function down()
    {
        $this->forge->dropTable('transaksi');
    }
}
