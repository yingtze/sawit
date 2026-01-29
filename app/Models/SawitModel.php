<?php

namespace App\Models;

use CodeIgniter\Model;

class SawitModel extends Model
{
    protected $table = 'sawit';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'App\Entities\Sawit';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = ['jenis_sawit', 'harga_per_kg', 'potongan_persen'];

    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
}
