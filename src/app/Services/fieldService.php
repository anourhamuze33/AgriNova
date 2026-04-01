<?php

namespace App\Services;

use App\Repositories\Fieldes\FieldRepository;

class FieldService
{
    protected FieldRepository $fieldRepository;

    public function __construct(FieldRepository $fieldRepository)
    {
        $this->fieldRepository = $fieldRepository;
    }

    public function getAllFields()
    {
        return $this->fieldRepository->getAll();
    }

    public function getFieldById($id)
    {
        return $this->fieldRepository->findById($id);
    }

    public function createField(array $data)
    {
        return $this->fieldRepository->create($data);
    }

    public function updateField($id, array $data)
    {
        return $this->fieldRepository->update($id, $data);
    }

    public function deleteField($id)
    {
        return $this->fieldRepository->delete($id);
    }
}
