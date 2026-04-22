<?php
namespace App\Http\Controllers;

use App\Services\CultureService;
use App\Services\FieldService;
use App\Services\villeService;
use Illuminate\Http\Request;

class FieldController extends Controller
{
    protected $fieldService;
    protected CultureService $cultureService;
    protected villeService $villeService;

    public function __construct(FieldService $fieldService, CultureService $cultureService, villeService $villeService)
    {
        $this->fieldService = $fieldService;
        $this->cultureService = $cultureService;
        $this->villeService = $villeService;
    }

    public function index()
    {
        $style = asset('css/fields/index.css');
        $fields = $this->fieldService->getAllFields();
        return view('fieldes.fields', compact('fields', 'style'));
    }

    public function create()
    {
        $villes = $this->villeService->getAll();
        return view('fieldes.formCreate', compact('villes'));
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