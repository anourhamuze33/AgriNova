<?php

namespace App\Repositories\Demande;

use App\Http\Requests\UpdateDemandeRequest;
use App\Models\Demande;

class DemandeRepository
{
    public function create(array $data)
    {
        return Demande::create($data);
    }
    
        public function updateStatus(Demande $demand, $infos) {
            $data = 
            [
            'notes'=>$infos['note'],
            'status'=>$infos['type'],
            ];
            $demand->update($data);
        }    
}
