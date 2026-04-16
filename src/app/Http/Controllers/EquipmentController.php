<?php

namespace App\Http\Controllers;

use App\Services\EquipmentService;
use App\Services\FieldService;
use Illuminate\Support\Carbon;

class EquipmentController extends Controller
{
    protected EquipmentService $equipmentService;
    protected FieldService $fieldService;

    public function __construct(EquipmentService $equipmentService, FieldService $fieldService)
    {
        $this->equipmentService = $equipmentService;
        $this->fieldService = $fieldService;
    }

    public function index()
    {
        $equipments = $this->equipmentService->getEquipments();
        $typeMeta = fn($type) => $this->equipmentService->typeEquipement($type);
        $statusMeta = fn($status) => $this->equipmentService->status($status);

        $counts = [
            'total' => $equipments->count(),
            'available' => $equipments->where('status', 'available')->count(),
            'using' => $equipments->where('status', 'using')->count(),
            'maintenance' => $equipments->where('status', 'maintenance')->count(),
            'total_value' => $equipments->sum(fn($e) => $e->purchase_price),
        ];

        $counts['operational'] = $counts['available'] + $counts['using'];

        return view('equipment.index', ['equipments' => $equipments, 'stats' => $counts, 'typeMeta' => $typeMeta, 'statusMeta' => $statusMeta,]);
    }

    public function create()
    {
        $fields = $this->fieldService->getAllFields();
        return view('equipment.create', compact('fields'));
    }
}
