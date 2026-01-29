<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Transaksi extends Entity
{
    protected $datamap = [];
    protected $dates = ['tanggal', 'created_at', 'updated_at'];
    protected $casts = [
        'petani_id' => 'integer',
        'sawit_id' => 'integer',
        'berat_kg' => 'float',
        'harga_per_kg' => 'float',
        'potongan_persen' => 'float',
        'subtotal' => 'float',
    ];

    public function getBonus()
    {
        if ($this->subtotal >= 100000) {
            return "Topi";
        }
        return "Sepatu";
    }
}
