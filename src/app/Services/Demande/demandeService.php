<?php

namespace App\Services\Demande;

use App\Repositories\Demande\DemandeRepository;

class demandeService
{
    protected DemandeRepository $demandeRepository;
    public function __construct(DemandeRepository $demandeRepository)
    {
        $this->demandeRepository = $demandeRepository;
    }
    
    // public function createDemande()
    // {
    //     $this->demandeRepository->create();
    // }
}
