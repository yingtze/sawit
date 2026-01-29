<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Transaksi extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');

        $petaniRows = $this->db->table('petani')->select('id')->get()->getResultArray();
        $sawitRows = $this->db->table('sawit')->select('id, harga_per_kg, potongan_persen')->get()->getResultArray();

        if (empty($petaniRows) || empty($sawitRows)) {
            return;
        }

        $data = [];
        for ($i = 0; $i < 30; $i++) {
            $p = $petaniRows[array_rand($petaniRows)];
            $s = $sawitRows[array_rand($sawitRows)];

            $berat = $faker->randomFloat(2, 10, 500); // Kg
            $harga = (float) $s['harga_per_kg'];
            $pot = (float) $s['potongan_persen'];

            $kotor = $harga * $berat;
            $potongan = $kotor * ($pot / 100.0);
            $subtotal = $kotor - $potongan;

            $data[] = [
                'petani_id' => $p['id'],
                'sawit_id' => $s['id'],
                'tanggal' => $faker->dateTimeBetween('-1 years', 'now')->format('Y-m-d'),
                'berat_kg' => $berat,
                'harga_per_kg' => $harga,
                'potongan_persen' => $pot,
                'subtotal' => round($subtotal, 0),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];
        }

        $this->db->table('transaksi')->insertBatch($data);
    }
}
