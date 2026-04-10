<?php
namespace App\Http\Controllers;

use App\Http\Requests\cultureStore;
use App\Services\CultureService;
use App\Services\FieldService;
use App\Services\User\userService;
use Illuminate\Http\Request;

class CultureController extends Controller
{
    protected CultureService $cultureService;
    protected FieldService $fieldService;
    protected userService $userService;

    public function __construct(CultureService $cultureService, FieldService $fieldService, userService $userService)
    {
        $this->cultureService = $cultureService;
        $this->fieldService = $fieldService;
        $this->userService = $userService;
    }

    public function index()
    {
        return view('cultures.index');
    }
    
    public function create()
    {
        $rolesWithUsers = $this->userService->getUsersWithRole();
        $fields = $this->fieldService->getAllFields();
        $typesNames = $this->cultureService->getNameType();
        return view('cultures.create', compact('typesNames', 'fields', 'rolesWithUsers'));
    }

    public function show($id)
    {
        
    }

    public function store(cultureStore $request)
    {
        $this->cultureService->createCulture($request);
        return redirect()->route('cultures.index');
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'crop_id' => 'sometimes|exists:crops,id',
            'field_id' => 'sometimes|exists:fields,id',
            'cycle_id' => 'sometimes|in:Semis,Trait,Crois,Récolte',
            'season' => 'sometimes|in:printemps,été,automne,hiver',
            'planting_date' => 'sometimes|date',
            'harvest_date' => 'sometimes|date',
            'status' => 'sometimes|string',
            'user_id' => 'sometimes|exists:users,id',
        ]);

    }

    public function destroy($id)
    {
        return response()->json([
            'deleted' => $this->cultureService->deleteCulture($id)
        ]);
    }
}