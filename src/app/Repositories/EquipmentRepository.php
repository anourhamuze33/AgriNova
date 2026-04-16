<?php

namespace App\Repositories;

use App\Models\Equipment;

class EquipmentRepository
{
    public function getAll()
    {
        return Equipment::with(['fields'])->latest()->get();
    }

    public function find($id)
    {
        return Equipment::with(['fields'])->findOrFail($id);
    }

    public function create(array $data)
    {
        return Equipment::create($data);
    }

    public function assignToField($equipmentId, $fieldId, $startDate = null, $endDate = null)
    {
        $equipment = Equipment::findOrFail($equipmentId);

        $equipment->fields()->attach($fieldId, [
            'start_date' => $startDate,
            'end_date' => $endDate,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return $equipment->load('fields');
    }

    public function removeFromField($equipmentId, $fieldId)
    {
        $equipment = Equipment::findOrFail($equipmentId);

        $equipment->fields()->detach($fieldId);

        return $equipment->load('fields');
    }
}