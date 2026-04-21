<?php

namespace App\Http\Controllers;

use App\Http\Requests\cultureStore;
use App\Http\Requests\cultureUpdate;
use App\Models\Culture;
use App\Services\CultureService;
use App\Services\FieldService;
use App\Services\User\userService;
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
        $fields = $this->fieldService->getAllFieldsNotPag();
        $typesNames = $this->cultureService->getNameType();

        return view('cultures.create', compact('typesNames', 'fields', 'rolesWithUsers'));
    }

    public function edit($id)
    {
        $culture = $this->cultureService->getCulture($id);
        $rolesWithUsers = $this->userService->getUsersWithRole();
        $fields = $this->fieldService->getAllFieldsNotPag();
        $typesNames = $this->cultureService->getNameType();

        return view('cultures.edit', compact('culture', 'typesNames', 'fields', 'rolesWithUsers'));
    }

    public function show($id)
    {
        $culture = $this->cultureService->getCulture($id);
        $steps = ['planting', 'treatment', 'growth', 'harvest', 'done'];

        $currentIndex = array_search($culture->cycle, $steps);
        $progress = round((($currentIndex + 1) / count($steps)) * 100);
        $daysLeft = max(0, floor(now()->diffInDays($culture->harvest_date)));

        $response = Http::get('https://api.openweathermap.org/data/2.5/weather', [
            'q' => $culture->field->ville->name,
            'appid' => env('WEATHER_KEY'),
            'units' => 'metric',
        ]);

        $weather = $response->json();
        $temp = $weather['main']['temp'] ?? 0;
        $humidity = $weather['main']['humidity'] ?? 0;
        $wind = $weather['wind']['speed'] ?? 0;
        $rain = $weather['rain']['1h'] ?? 0;

        $advice = 'Conditions normales.';

        if ($rain > 2) {
            $advice = 'Pluie prevue - evitez la recolte et surveillez les maladies.';
        } elseif ($temp > 30) {
            $advice = 'Forte chaleur - recoltez tot le matin ou en fin de journee.';
        } elseif ($humidity > 80) {
            $advice = 'Humidite elevee - risque de maladies, surveillez les plantes.';
        } elseif ($wind > 20) {
            $advice = 'Vent fort - attention aux cultures fragiles.';
        } else {
            $advice = 'Conditions ideales pour la recolte cette semaine.';
        }

        $main = $weather['weather'][0]['main'] ?? null;

        $emoji = match ($main) {
            'Clear' => 'Clear',
            'Clouds' => 'Clouds',
            'Rain' => 'Rain',
            'Drizzle' => 'Drizzle',
            'Thunderstorm' => 'Storm',
            default => 'Weather',
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

    public function update(cultureUpdate $request, $id)
    {
        $this->cultureService->updateCulture($id, $request->validated());

        return redirect()
            ->route('cultures.show', $id)
            ->with('success', 'Culture mise a jour avec succes.');
    }

    public function destroy($id)
    {
        $this->cultureService->deleteCulture($id);

        return redirect()->route('cultures.index');
    }
}
