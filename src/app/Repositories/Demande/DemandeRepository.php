<?php

namespace App\Repositories\Demande;

use App\Models\Demande;

class DemandeRepository
{
    public function create(array $data)
    {
        return Demande::create($data);
    }

}
