<?php

namespace App\DTOs;

use Illuminate\Http\UploadedFile;

class InscriptionDTO
{
    public int $role_id;
    public string $name;
    public string $email;
    public string $user_name;
    public string $telephone;
    public int $ville_id;
    public string $specialites;
    public int $annees_experience;
    public int $tarif_horaire;
    public int $interventions;
    public string $password;

    public function __construct(
        int $role_id,
        string $name,
        string $email,
        string $user_name,
        string $telephone,
        int $ville_id,
        string $specialites,
        int $annees_experience,
        int $tarif_horaire,
        int $interventions,
        string $password,
    ) {
        $this->role_id = $role_id;
        $this->name = $name;
        $this->email = $email;
        $this->user_name = $user_name;
        $this->telephone = $telephone;
        $this->ville_id = $ville_id;
        $this->specialites = $specialites;
        $this->annees_experience = $annees_experience;
        $this->tarif_horaire = $tarif_horaire;
        $this->interventions = $interventions;
        $this->password = $password;
    }

    public static function getUserData($request): array
    {
        return [
            'role_id' => $request['role_id'],
            'name' => $request['name'],
            'email' => $request['email'],
            'user_name' => $request['user_name'],
            'telephone' => $request['telephone'],
            'ville_id' => $request['ville_id'],
            'specialite' => $request['specialite'],
            'annees_experience' => $request['annees_experience'],
            'tarif_horaire' => $request['tarif_horaire'],
            'interventions' => $request['interventions'],
            'password' => $request['password'],
        ];
    }
}
