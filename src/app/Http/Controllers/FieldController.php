<?php
namespace App\Http\Controllers;

use App\Services\CultureService;
use App\Services\FieldService;
use Illuminate\Http\Request;

class FieldController extends Controller
{
    protected $fieldService;
    protected CultureService $cultureService;

    public function __construct(FieldService $fieldService, CultureService $cultureService)
    {
        $this->fieldService = $fieldService;
        $this->cultureService = $cultureService;
    }

    public function index()
    {
        $fields = $this->fieldService->getAllFields();
        return view('fieldes.fields', compact('fields'));
    }

    public function create()
    {
        return view('fieldes.formCreate');
    }

    public function show($id)
    {
        $field = $this->fieldService->getFieldById($id);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'ville_id' => 'required|string',
            'size' => 'required|numeric',
        ]);

        $field = $this->fieldService->createField($data);
        return redirect()->route('fields.index');
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'sometimes|string',
            'location' => 'sometimes|string',
            'size' => 'sometimes|numeric',
        ]);

        $field = $this->fieldService->updateField($id, $data);

    }

    public function destroy($id)
    {
        $this->fieldService->deleteField($id);

    }
}