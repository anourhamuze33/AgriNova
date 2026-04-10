<?php

namespace App\Services;

use App\Repositories\CropRepository;

class CropService
{
    protected $cropRepository;

    public function __construct(CropRepository $cropRepository)
    {
        $this->cropRepository = $cropRepository;
    }

    public function getAllCrops()
    {
        return $this->cropRepository->getAll();
    }

    public function getCrop($id)
    {
        return $this->cropRepository->findById($id);
    }

    public function createCrop(array $data)
    {
        return $this->cropRepository->create($data);
    }

    public function updateCrop($id, array $data)
    {
        return $this->cropRepository->update($id, $data);
    }

    public function deleteCrop($id)
    {
        return $this->cropRepository->delete($id);
    }
}