<?php

namespace App\Repositories\User;

use App\Models\Demande;
use App\Models\Role;
use App\Models\User;

class UserRepository
{
    public function findById(int $id)
    {
        $user = User::find($id);
        return $user;
    }
    
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

    public function getDemande(User $user )
    {
        $demand = $user->demandes()->where('type', 'be_ouvrier')->first();
        return $demand;
    }

    public function getUsersWithRoles()
    {
        $roles = Role::with('users')->get();
        return $roles;
    }

    public function getStatus()
    {
        $pending = Demande::where('type', 'be_ouvrier')->where('status', 'pending')->get()->count();
        $approved = Demande::where('type', 'be_ouvrier')->where('status', 'approved')->get()->count();
        $rejected = Demande::where('type', 'be_ouvrier')->where('status', 'rejected')->get()->count();
        $inscrit = Demande::where('type', 'be_ouvrier')->get()->count();
        return ['pending'=>$pending, 'approved'=>$approved, 'rejected'=>$rejected, 'inscrit'=>$inscrit];
    }
}
