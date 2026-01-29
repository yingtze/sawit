<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $table = 'transaksi';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'App\Entities\Transaksi';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = [
        'petani_id',
        'sawit_id',
        'tanggal',
        'berat_kg',
        'harga_per_kg',
        'potongan_persen',
        'subtotal'
    ];

    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    // Relationships could be defined here or handled in Service via Joins
}
