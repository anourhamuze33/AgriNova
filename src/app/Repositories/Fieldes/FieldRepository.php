<?php

namespace App\Repositories\Fieldes;

use App\Models\Field;

class FieldRepository
{
    public function getAll()
    {
        return Field::with(['cultures', 'ville'])->paginate(4);
    }

    public function getAllNotPag()
    {
        return Field::with(['cultures', 'ville'])->get();
    }

    public function findById($id)
    {
        return Field::with(['cultures', 'ville'])->findOrFail($id);
    }

    public function create(array $data)
    {
        return Field::create($data);
    }

    public function update($id, array $data)
    {
        $field = $this->findById($id);
        $field->update($data);
        return $field;
    }

    public function delete($id)
    {
        $field = $this->findById($id);
        return $field->delete();
    }
}
