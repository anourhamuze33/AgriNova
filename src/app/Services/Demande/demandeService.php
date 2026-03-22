<?php

namespace App\Services\Demande;

use App\Models\Demande;
use App\Models\User;
use App\Repositories\Demande\DemandeRepository;
use Dflydev\DotAccessData\Data;

class demandeService
{
    protected DemandeRepository $demandeRepository;
    public function __construct(DemandeRepository $demandeRepository)
    {
        $this->demandeRepository = $demandeRepository;
    }
    
    public function updateBeOuvrier(User $user, Demande $demande, array $data)
    {
        $this->demandeRepository->updateStatus($demande, $data);
    }
}
