<?php

namespace App\Repositories\User;

use App\Models\Demande;
use App\Models\User;

class UserRepository
{
    public function create(array $data)
    {
        return User::create($data);
    }

    public function getAllUsersDemanding()
    {
        $users = User::with('demandes')
            ->whereHas('demandes', function ($q) {
                $q->where('type', 'be_ouvrier');
            })->get();

        return $users;
    }

    public function getDemande(User $user)
    {
        $demand = $user->demandes()->where('type', 'be_ouvrier');
        return $demand;
    }
}
