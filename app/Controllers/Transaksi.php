<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Services\TransaksiService;
use App\Services\PetaniService;
use App\Services\SawitService;

class Transaksi extends BaseController
{
    protected $transaksiService;
    protected $petaniService;
    protected $sawitService;

    public function __construct()
    {
        $this->transaksiService = new TransaksiService();
        $this->petaniService = new PetaniService();
        $this->sawitService = new SawitService();
    }

    public function index()
    {
        $data['transaksi'] = $this->transaksiService->getAllWithRelations();
        return view('transaksi/index', $data);
    }

    public function create()
    {
        $data['petani'] = $this->petaniService->getAll();
        $data['sawit'] = $this->sawitService->getAll();
        return view('transaksi/create', $data);
    }

    public function store()
    {
        if (
            !$this->validate([
                'petani_id' => 'required|integer',
                'sawit_id' => 'required|integer',
                'tanggal' => 'required|valid_date',
                'berat_kg' => 'required|numeric',
            ])
        ) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        try {
            $this->transaksiService->create($this->request->getPost());
            return redirect()->to('/transaksi')->with('success', 'Transaksi berhasil disimpan');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', $e->getMessage());
        }
    }
}
