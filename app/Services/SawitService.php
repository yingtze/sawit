<?php

namespace App\Services;

use App\Models\SawitModel;
use App\Entities\Sawit;

class SawitService
{
    protected $sawitModel;

    public function __construct()
    {
        $this->sawitModel = new SawitModel();
    }

    public function getAll()
    {
        return $this->sawitModel->findAll();
    }

    public function getById($id)
    {
        return $this->sawitModel->find($id);
    }

    public function create($data)
    {
        $sawit = new Sawit($data);
        return $this->sawitModel->save($sawit);
    }

    public function update($id, $data)
    {
        $sawit = $this->sawitModel->find($id);
        if (!$sawit) {
            return false;
        }
        $sawit->fill($data);
        return $this->sawitModel->save($sawit);
    }

    public function delete($id)
    {
        return $this->sawitModel->delete($id);
    }
}
