<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Sawit extends Seeder
{
    public function run()
    {
        $data = [
            [
                'jenis_sawit' => 'Tandan Buah Segar (TBS)',
                'harga_per_kg' => 2500,
                'potongan_persen' => 5.00,
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'jenis_sawit' => 'Brondolan',
                'harga_per_kg' => 1800,
                'potongan_persen' => 0.00,
                'created_at' => date('Y-m-d H:i:s'),
            ],
        ];
        $this->db->table('sawit')->insertBatch($data);
    }
}
