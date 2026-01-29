<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Transaksi extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INTEGER',
                'auto_increment' => true,
            ],
            'petani_id' => [
                'type' => 'INTEGER',
            ],
            'sawit_id' => [
                'type' => 'INTEGER',
            ],
            'tanggal' => [
                'type' => 'DATE',
            ],
            'berat_kg' => [
                'type' => 'NUMERIC',
                'null' => false,
            ],
            'harga_per_kg' => [
                'type' => 'NUMERIC',
                'null' => false,
            ],
            'potongan_persen' => [
                'type' => 'NUMERIC',
                'null' => false,
            ],
            'subtotal' => [
                'type' => 'NUMERIC',
                'null' => false,
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
