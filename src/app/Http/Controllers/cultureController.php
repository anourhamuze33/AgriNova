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
        $style =  asset('css/cultures/index.css');
        $cultures = $this->cultureService->getAllCultures();
        $stats = $this->cultureService->getStats();
        return view('cultures.index', compact('cultures', 'stats', 'style'));
    }

    public function create()
    {
        $style =  asset('css/cultures/create.css');
        $rolesWithUsers = $this->userService->getUsersWithRole();
        $fields = $this->fieldService->getAllFieldsNotPag();
        $typesNames = $this->cultureService->getNameType();

        return view('cultures.create', compact('typesNames', 'fields', 'rolesWithUsers', 'style'));
    }

    public function edit($id)
    {
        $style =  asset('css/cultures/edit.css');
        $culture = $this->cultureService->getCulture($id);
        $rolesWithUsers = $this->userService->getUsersWithRole();
        $fields = $this->fieldService->getAllFieldsNotPag();
        $typesNames = $this->cultureService->getNameType();

        return view('cultures.edit', compact('culture', 'typesNames', 'fields', 'rolesWithUsers', 'style'));
    }

    public function show($id)
    {
        $style =  asset('css/cultures/show.css');
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
                    'Clear' => '<svg width="24" height="24" fill="orange" viewBox="0 0 24 24">
                <circle cx="12" cy="12" r="5"/>
            </svg>',

                    'Clouds' => '<svg width="24" height="24" fill="gray" viewBox="0 0 24 24">
                <path d="M6 18h12a4 4 0 0 0 0-8 6 6 0 0 0-11.5-2A4 4 0 0 0 6 18z"/>
            </svg>',

                    'Rain' => '<svg width="24" height="24" viewBox="0 0 24 24">
                <path fill="gray" d="M6 16h12a4 4 0 0 0 0-8 6 6 0 0 0-11.5-2A4 4 0 0 0 6 16z"/>
                <line x1="8" y1="18" x2="8" y2="22" stroke="blue"/>
                <line x1="12" y1="18" x2="12" y2="22" stroke="blue"/>
                <line x1="16" y1="18" x2="16" y2="22" stroke="blue"/>
            </svg>',

                    'Drizzle' => '<svg width="24" height="24" viewBox="0 0 24 24">
                <path fill="gray" d="M6 16h12a4 4 0 0 0 0-8 6 6 0 0 0-11.5-2A4 4 0 0 0 6 16z"/>
                <line x1="10" y1="18" x2="10" y2="22" stroke="blue"/>
                <line x1="14" y1="18" x2="14" y2="22" stroke="blue"/>
            </svg>',

                    'Thunderstorm' => '<svg width="24" height="24" viewBox="0 0 24 24">
                <path fill="gray" d="M6 16h12a4 4 0 0 0 0-8 6 6 0 0 0-11.5-2A4 4 0 0 0 6 16z"/>
                <polygon points="13,18 10,24 14,24 11,30" fill="yellow"/>
            </svg>',

                    default => '<svg width="24" height="24"><text x="0" y="15">🌍</text></svg>',
        };

        return view('cultures.show', compact('culture', 'daysLeft', 'progress', 'weather', 'advice', 'emoji', 'style'));
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
        return redirect()->route('cultures.show', $id);
    }

    public function destroy($id)
    {
        $this->cultureService->deleteCulture($id);
        return redirect()->route('cultures.index');
    }
}
