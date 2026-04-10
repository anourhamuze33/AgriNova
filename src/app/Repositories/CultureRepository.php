<?php

namespace App\Repositories;

use App\Models\Culture;
use App\Models\Type_cultures;

class CultureRepository
{
    public function getAll()
    {
        return Culture::with(['field', 'user'])->get();
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
        return Culture::findOrFail($id);
    }

    public function create(array $data)
    {
        return Culture::create($data);
    }

    public function updateTypeCulturesImg($id, $img)
    {
        $typeCylture = Type_cultures::find($id);
        $typeCylture->update([
            'imgUrl'=> $img,
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
