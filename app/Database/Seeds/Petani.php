<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Petani extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');
        $data = [];
        for ($i = 0; $i < 10; $i++) {
            $data[] = [
                'nama_petani' => $faker->name,
                'alamat_petani' => $faker->address,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];
        }
        $this->db->table('petani')->insertBatch($data);
    }
}
