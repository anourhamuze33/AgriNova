<?php

namespace App\Http\Controllers;

use App\Services\EquipmentService;
use App\Services\FieldService;
use Illuminate\Http\Request;

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
        $style = asset('css/eq/index.css');
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

        return view('equipment.index', ['equipments' => $equipments, 'stats' => $counts, 'typeMeta' => $typeMeta, 'statusMeta' => $statusMeta, 'style'=>$style]);
    }

    public function create()
    {
        $fields = $this->fieldService->getAllFields();
        return view('equipment.create', compact('fields'));
    }

    public function show($id)
    {
        $equipement = $this->equipmentService->getEquipmentById($id);
        $availableFields = $this->equipmentService->getAvailableFieldsForEquipment($id);
        $typeMeta = fn($type) => $this->equipmentService->typeEquipement($type);
        $statusMeta = fn($status) => $this->equipmentService->status($status);

        return view('equipment.show', compact('equipement', 'availableFields', 'typeMeta', 'statusMeta'));
    }

    public function assignField(Request $request, $id)
    {
        $data = $request->validate([
            'field_id' => 'required|exists:fields,id',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
        ]);

        $this->equipmentService->assignEquipmentToField(
            $id,
            $data['field_id'],
            $data['start_date'] ?? null,
            $data['end_date'] ?? null,
        );

        return redirect()->route('equipments.show', $id);
    }

    public function removeField($equipmentId, $fieldId)
    {
        $this->equipmentService->removeEquipmentFromField($equipmentId, $fieldId);
        return redirect()->route('equipments.show', $equipmentId);
    }

    public function destroy($id)
    {
        $this->equipmentService->deleteEquipment($id);
        return redirect()->route('equipments.index');
    }
}
