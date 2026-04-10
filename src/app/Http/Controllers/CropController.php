<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CropService;

class CropController extends Controller
{
    protected $cropService;

    public function __construct(CropService $cropService)
    {
        $this->cropService = $cropService;
    }

    public function index()
    {
        return view('crops.index');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'type' => 'required|string',
            'description' => 'nullable|string',
            'status' => 'required|string'
        ]);

    }

    public function show($id)
    {

    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'string',
            'type' => 'string',
            'description' => 'nullable|string',
            'status' => 'string'
        ]);
    }

    public function destroy($id)
    {
        $this->cropService->deleteCrop($id);
    }
}