<?php

namespace App\Services;

use App\Models\TransaksiModel;

class LaporanService
{
    protected $transaksiModel;

    public function __construct()
    {
        $this->transaksiModel = new TransaksiModel();
    }

    public function getLaporan($startDate = null, $endDate = null)
    {
        $builder = $this->transaksiModel
            ->select('transaksi.*, petani.nama_petani, petani.alamat_petani, sawit.jenis_sawit')
            ->join('petani', 'petani.id = transaksi.petani_id')
            ->join('sawit', 'sawit.id = transaksi.sawit_id')
            ->orderBy('transaksi.tanggal', 'DESC');

        if ($startDate && $endDate) {
            $builder->where('transaksi.tanggal >=', $startDate)
                ->where('transaksi.tanggal <=', $endDate);
        }

        return $builder->findAll();
    }
}
