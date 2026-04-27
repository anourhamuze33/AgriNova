<?php

namespace App\Repositories;

use App\Models\Equipment;
use App\Models\Field;

class EquipmentRepository
{
    public function getAll()
    {
        return Equipment::with(['fields'])->latest()->get();
    }

    public function find($id)
    {
        return Equipment::with(['fields.cultures', 'fields.ville'])->findOrFail($id);
    }

    public function getAvailableFieldsForEquipment($equipmentId)
    {
        return Field::with(['cultures', 'ville'])
            ->whereDoesntHave('equipments', function ($query) use ($equipmentId) {
                $query->where('equipments.id', $equipmentId);
            })->get();
    }

    public function create(array $data)
    {
        return Equipment::create($data);
    }

    public function assignToField($equipmentId, $fieldId, $startDate = null, $endDate = null)
    {
        $equipment = Equipment::findOrFail($equipmentId);
        $payload = [
            'start_date' => $startDate,
            'end_date' => $endDate,
            'updated_at' => now(),
        ];

        if ($equipment->fields()->where('fields.id', $fieldId)->exists()) {
            $equipment->fields()->updateExistingPivot($fieldId, $payload);
        } else {
            $equipment->fields()->attach($fieldId, $payload + ['created_at' => now()]);
        }

    }

    public function removeFromField($equipmentId, $fieldId)
    {
        $equipment = Equipment::findOrFail($equipmentId);
        $equipment->fields()->detach($fieldId);
        return $equipment->load(['fields.cultures', 'fields.ville']);
    }

    public function delete($id)
    {
        $equipment = Equipment::findOrFail($id);
        return $equipment->delete();
    }
}
