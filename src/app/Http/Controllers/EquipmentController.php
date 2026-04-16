<?php

namespace App\Http\Controllers;

use App\Services\EquipmentService;
use App\Services\FieldService;

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
        return view('equipment.index', compact('equipments'));
    }

    public function create()
    {
        $fields = $this->fieldService->getAllFields();
        return view('equipment.create', compact('fields'));
    }
}