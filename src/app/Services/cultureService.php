<?php

namespace App\Services;

use App\Repositories\CultureRepository;
use Illuminate\Support\Facades\Storage;

class CultureService
{
    protected $cultureRepository;

    public function __construct(CultureRepository $cultureRepository)
    {
        $this->cultureRepository = $cultureRepository;
    }

    public function getAllCultures()
    {
        return $this->cultureRepository->getAll();
    }

    public function getNameType()
    {
        return $this->cultureRepository->getNameType();
    }

    public function updateCulturesImg($id, $img)
    {
        return $this->cultureRepository->updateTypeCulturesImg($id, $img);
    }

    public function getCulture($id)
    {
        return $this->cultureRepository->findById($id);
    }

    public function nextStep($culture)
    {
        $steps = ['planting', 'treatment', 'growth', 'harvest', 'done'];

        $currentIndex = array_search($culture->cycle, $steps);

        if ($currentIndex < count($steps) - 1) {
            $culture->cycle = $steps[$currentIndex + 1];
            $culture->save();
        }
    }

    public function createCulture($request)
    {
        $data = $request->validated();
        if ($request->hasFile('img')) {
            $fileImg = $request->file('img');
            $fileNameCultures = time() . '_Cultures_' . $fileImg->getClientOriginalName();
            $fileImg->storeAs('Cultures', $fileNameCultures, 'public');
            $data['imgUrl'] = $fileNameCultures;
        }
        $create = $this->cultureRepository->create($data);
        $this->updateCulturesImg($create->id, $data['imgUrl']);
        return $create;
    }

    public function updateCulture($id, array $data)
    {
        return $this->cultureRepository->update($id, $data);
    }

    public function deleteCulture($id)
    {
        return $this->cultureRepository->delete($id);
    }
}
