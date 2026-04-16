<?php

namespace App\Services;

use App\Repositories\EquipmentRepository;

class EquipmentService
{
    protected EquipmentRepository $equipmentRepository;

    public function __construct(EquipmentRepository $equipmentRepository)
    {
        $this->equipmentRepository = $equipmentRepository;
    }

    public function getEquipments()
    {
        $equipments = $this->equipmentRepository->getAll();
    }
}