<?php

namespace App\Repositories;

use App\Models\Crop;

class CropRepository
{
    public function getAll()
    {
        return Crop::all();
    }

    public function findById($id)
    {
        return Crop::findOrFail($id);
    }

    public function create(array $data)
    {
        return Crop::create($data);
    }

    public function update($id, array $data)
    {
        $crop = $this->findById($id);
        $crop->update($data);
        return $crop;
    }

    public function delete($id)
    {
        $crop = $this->findById($id);
        return $crop->delete();
    }
}