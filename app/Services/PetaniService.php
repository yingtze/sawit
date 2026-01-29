<?php

namespace App\Services;

use App\Models\PetaniModel;
use App\Entities\Petani;

class PetaniService
{
    protected $petaniModel;

    public function __construct()
    {
        $this->petaniModel = new PetaniModel();
    }

    public function getAll()
    {
        return $this->petaniModel->findAll();
    }

    public function getById($id)
    {
        return $this->petaniModel->find($id);
    }

    public function create($data)
    {
        $petani = new Petani($data);
        return $this->petaniModel->save($petani);
    }

    public function update($id, $data)
    {
        $petani = $this->petaniModel->find($id);
        if (!$petani) {
            return false;
        }
        $petani->fill($data);
        return $this->petaniModel->save($petani);
    }

    public function delete($id)
    {
        return $this->petaniModel->delete($id);
    }
}
