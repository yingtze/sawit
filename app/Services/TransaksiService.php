<?php

namespace App\Services;

use App\Models\TransaksiModel;
use App\Models\SawitModel;
use App\Models\PetaniModel; // Just in case needed for validation
use App\Entities\Transaksi;

class TransaksiService
{
    protected $transaksiModel;
    protected $sawitModel;

    public function __construct()
    {
        $this->transaksiModel = new TransaksiModel();
        $this->sawitModel = new SawitModel();
    }

    public function getAllWithRelations()
    {
        // Using Query Builder for Joins to display names
        return $this->transaksiModel
            ->select('transaksi.*, petani.nama_petani, sawit.jenis_sawit')
            ->join('petani', 'petani.id = transaksi.petani_id')
            ->join('sawit', 'sawit.id = transaksi.sawit_id')
            ->orderBy('transaksi.id', 'DESC')
            ->findAll();
    }

    public function create($data)
    {
        // Logic: Calculate Subtotal based on current Sawit Price
        $sawitInfo = $this->sawitModel->find($data['sawit_id']);

        if (!$sawitInfo) {
            throw new \Exception('Data Sawit tidak ditemukan');
        }

        $hargaPerKg = $sawitInfo->harga_per_kg;
        $potonganPersen = $sawitInfo->potongan_persen;
        $beratKg = $data['berat_kg'];

        // Calculation: (Berat * Harga) - Potongan%
        $kotor = $beratKg * $hargaPerKg;
        $nilaiPotongan = $kotor * ($potonganPersen / 100);
        $subtotal = $kotor - $nilaiPotongan;

        // Prepare Data
        $transaksi = new Transaksi();
        $transaksi->petani_id = $data['petani_id'];
        $transaksi->sawit_id = $data['sawit_id'];
        $transaksi->tanggal = $data['tanggal'];
        $transaksi->berat_kg = $beratKg;
        $transaksi->harga_per_kg = $hargaPerKg;
        $transaksi->potongan_persen = $potonganPersen;
        $transaksi->subtotal = $subtotal;

        return $this->transaksiModel->save($transaksi);
    }
}
