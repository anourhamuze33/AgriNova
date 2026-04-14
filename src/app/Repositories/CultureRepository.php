<?php

namespace App\Repositories;

use App\Models\Culture;
use App\Models\Type_cultures;

class CultureRepository
{
    public function getAll()
    {
        return Culture::with(['typeCulture', 'field', 'user'])->paginate(10);
    }

    public function getStats()
    {
        return [
            'total' => Culture::count(),
            'planting' => Culture::where('cycle', 'planting')->count(),
            'growth' => Culture::where('cycle', 'growth')->count(),
            'treatment' => Culture::where('cycle', 'treatment')->count(),
            'harvest' => Culture::where('cycle', 'harvest')->count(),
            'done' => Culture::where('cycle', 'done')->count()
        ];
    }

    public function getNameType()
    {
        $cultureTypes = Type_cultures::orderBy('type')
            ->orderBy('name')
            ->get()
            ->groupBy('type');
        return $cultureTypes;
    }

    public function findById($id)
    {
        return Culture::with(['field.ville', 'user', 'typeCulture'])->findOrFail($id);
    }

    // public function updateCycle($culture)
    // {
    //     return $culture->update([
    //         'cycle'=>
    //     ])

    // }

    public function create(array $data)
    {
        return Culture::create($data);
    }

    public function updateTypeCulturesImg($id, $img)
    {
        $typeCylture = Type_cultures::find($id);
        $typeCylture->update([
            'imgUrl' => $img,
        ]);
        return $typeCylture;
    }

    public function update($id, array $data)
    {
        $culture = $this->findById($id);
        $culture->update($data);
        return $culture;
    }

    public function delete($id)
    {
        $culture = $this->findById($id);
        return $culture->delete();
    }
}
