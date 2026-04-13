<?php

namespace App\Http\Controllers;

use App\Http\Requests\cultureStore;
use App\Models\Culture;
use App\Services\CultureService;
use App\Services\FieldService;
use App\Services\User\userService;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

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
        $cultures = $this->cultureService->getAllCultures();
        return view('cultures.index', compact('cultures'));
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
        $culture = $this->cultureService->getCulture($id);
        $steps = ['planting', 'treatment', 'growth', 'harvest', 'done'];

        $currentIndex = array_search($culture->cycle, $steps);
        $progress = round((($currentIndex + 1) / count($steps)) * 100);
        $daysLeft = Carbon::now()->diffInDays($culture->harvest_date, false);
        return view('cultures.show', compact('culture', 'daysLeft', 'progress'));
    }

    public function suivantEtape(Culture $culture)
    {
        $this->cultureService->nextStep($culture);
        return redirect()->back();
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
