<?php

namespace App\Services;

use App\Repositories\EquipmentRepository;
use Illuminate\Support\Carbon;

class EquipmentService
{
    protected EquipmentRepository $equipmentRepository;

    public function __construct(EquipmentRepository $equipmentRepository)
    {
        $this->equipmentRepository = $equipmentRepository;
    }
    public function getEquipments()
    {
        return $this->equipmentRepository->getAll();
    }

    public function typeEquipement($type)
    {
        $t = strtolower(trim((string) $type));

        if ($t === '') return ['label' => 'Autre', 'class' => 'tb-autre'];

        if (str_contains($t, 'tract') || str_contains($t, 'moto') || str_contains($t, 'motor')) {
            return ['label' => 'Motorisé', 'class' => 'tb-moto'];
        }

        if (str_contains($t, 'irrig') || str_contains($t, 'goutte') || str_contains($t, 'pompe')) {
            return ['label' => 'Irrigation', 'class' => 'tb-irrig'];
        }

        if (str_contains($t, 'recol') || str_contains($t, 'récol') || str_contains($t, 'sem')) {
            return ['label' => 'Récolte', 'class' => 'tb-recolte'];
        }

        if (str_contains($t, 'stock') || str_contains($t, 'silo')) {
            return ['label' => 'Stockage', 'class' => 'tb-stock'];
        }

        if (str_contains($t, 'transport') || str_contains($t, 'camion') || str_contains($t, 'remorque')) {
            return ['label' => 'Transport', 'class' => 'tb-transport'];
        }

        return ['label' => ucfirst((string) $type), 'class' => 'tb-autre'];
    }

    public function status($status)
    {
        $s = strtolower(trim((string) $status));

        if ($s === 'available') return ['label' => 'Disponible', 'class' => 'st-op'];
        if ($s === 'using') return ['label' => 'En utilisation', 'class' => 'st-use'];
        if ($s === 'maintenance') return ['label' => 'Maintenance', 'class' => 'st-mnt'];

        return ['label' => ucfirst((string) $status), 'class' => 'st-idle'];
    }
}
