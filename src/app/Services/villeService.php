<?php

namespace App\Services;

use App\Repositories\VilleRepository;

class villeService
{
    protected VilleRepository $villeRepository;
    public function __construct(VilleRepository $villeRepository)
    {
        $this->villeRepository = $villeRepository;
    }

    public function getAll()
    {
        return $this->villeRepository->getAll();
    }
}
