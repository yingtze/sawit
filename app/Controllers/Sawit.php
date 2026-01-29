<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Sawit extends BaseController
{
    protected $sawitService;

    public function __construct()
    {
        $this->sawitService = new \App\Services\SawitService();
    }

    public function index()
    {
        $data['sawit'] = $this->sawitService->getAll();
        return view('sawit/index', $data);
    }

    public function create()
    {
        return view('sawit/create');
    }

    public function store()
    {
        if (
            !$this->validate([
                'jenis_sawit' => 'required',
                'harga_per_kg' => 'required|numeric',
                'potongan_persen' => 'required|numeric',
            ])
        ) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->sawitService->create($this->request->getPost());
        return redirect()->to('/sawit')->with('success', 'Data Sawit berhasil ditambahkan');
    }

    public function edit($id)
    {
        $data['sawit'] = $this->sawitService->getById($id);
        if (!$data['sawit']) {
            return redirect()->to('/sawit')->with('error', 'Data tidak ditemukan');
        }
        return view('sawit/edit', $data);
    }

    public function update($id)
    {
        if (
            !$this->validate([
                'jenis_sawit' => 'required',
                'harga_per_kg' => 'required|numeric',
                'potongan_persen' => 'required|numeric',
            ])
        ) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->sawitService->update($id, $this->request->getPost());
        return redirect()->to('/sawit')->with('success', 'Data Sawit berhasil diupdate');
    }

    public function delete($id)
    {
        $this->sawitService->delete($id);
        return redirect()->to('/sawit')->with('success', 'Data Sawit berhasil dihapus');
    }
}
