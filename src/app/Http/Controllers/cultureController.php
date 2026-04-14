<?php

namespace App\Http\Controllers;

use App\Http\Requests\cultureStore;
use App\Models\Culture;
use App\Services\CultureService;
use App\Services\FieldService;
use App\Services\User\userService;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Http;

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
        $stats = $this->cultureService->getStats();
        return view('cultures.index', compact('cultures', 'stats'));
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
        $daysLeft = max(0, floor(now()->diffInDays($culture->harvest_date)));

        $response = Http::get("https://api.openweathermap.org/data/2.5/weather", [
            'q' => $culture->field->ville->name,
            'appid' => env('WEATHER_KEY'),
            'units' => 'metric',
        ]);
        $weather = $response->json();
        $temp = $weather['main']['temp'] ?? 0;
        $humidity = $weather['main']['humidity'] ?? 0;
        $wind = $weather['wind']['speed'] ?? 0;
        $rain = $weather['rain']['1h'] ?? 0;

        $advice = "Conditions normales.";

        if ($rain > 2) {
            $advice = "Pluie prévue — évitez la récolte et surveillez les maladies.";
        } elseif ($temp > 30) {
            $advice = "Forte chaleur — récoltez tôt le matin ou en fin de journée.";
        } elseif ($humidity > 80) {
            $advice = "Humidité élevée — risque de maladies, surveillez les plantes.";
        } elseif ($wind > 20) {
            $advice = "Vent fort — attention aux cultures fragiles.";
        } else {
            $advice = "Conditions idéales pour la récolte cette semaine.";
        }

        $main = $weather['weather'][0]['main'];

        $emoji = match ($main) {
            'Clear' => '☀️',
            'Clouds' => '☁️',
            'Rain' => '🌧️',
            'Drizzle' => '🌦️',
            'Thunderstorm' => '⛈️',
            default => '🌤️'
        };
        return view('cultures.show', compact('culture', 'daysLeft', 'progress', 'weather', 'advice', 'emoji'));
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
