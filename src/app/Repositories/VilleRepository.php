<?php

namespace App\Repositories;

use App\Models\Ville;

class VilleRepository
{
    public function getAll()
    {
        return Ville::all();
    }
}