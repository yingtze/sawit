<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Petani extends BaseController
{
    protected $petaniService;

    public function __construct()
    {
        $this->petaniService = new \App\Services\PetaniService();
    }

    public function index()
    {
        $data['petani'] = $this->petaniService->getAll();
        return view('petani/index', $data);
    }

    public function create()
    {
        return view('petani/create');
    }

    public function store()
    {
        if (
            !$this->validate([
                'nama_petani' => 'required',
                'alamat_petani' => 'required',
            ])
        ) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->petaniService->create($this->request->getPost());
        return redirect()->to('/petani')->with('success', 'Data Petani berhasil ditambahkan');
    }

    public function edit($id)
    {
        $data['petani'] = $this->petaniService->getById($id);
        if (!$data['petani']) {
            return redirect()->to('/petani')->with('error', 'Data tidak ditemukan');
        }
        return view('petani/edit', $data);
    }

    public function update($id)
    {
        if (
            !$this->validate([
                'nama_petani' => 'required',
                'alamat_petani' => 'required',
            ])
        ) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->petaniService->update($id, $this->request->getPost());
        return redirect()->to('/petani')->with('success', 'Data Petani berhasil diupdate');
    }

    public function delete($id)
    {
        $this->petaniService->delete($id);
        return redirect()->to('/petani')->with('success', 'Data Petani berhasil dihapus');
    }
}
