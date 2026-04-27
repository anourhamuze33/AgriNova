<?php

namespace App\Services\User\Authentification;

use App\DTOs\InscriptionDTO;
use App\Http\Requests\StoreUser;
use App\Models\User;
use App\Repositories\Demande\DemandeRepository;
use App\Repositories\User\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class inscrireService
{
    protected UserRepository $userRepository;
    protected DemandeRepository $demandeRepository;

    public function __construct(UserRepository $userRepository, DemandeRepository $demandeRepository)
    {
        $this->userRepository = $userRepository;
        $this->demandeRepository = $demandeRepository;
    }
    
    public function register(StoreUser $data)
    {
        $fileNameDiplome = null;
        $fileNameCin = null;

        if ($data->cin) {
            $fileDiplome = $data->file('ponne');
            $fileNameDiplome = time() . '_Diplome_' . $fileDiplome->getClientOriginalName();
            $fileDiplome->storeAs('diplomes', $fileNameDiplome);
        }

        if ($data->cin) {
            $fileCIN = $data->file('cin');
            $fileNameCin = time() . '_CIN_' . $fileCIN->getClientOriginalName();
            Storage::disk('local')->putFileAs('cin', $fileCIN, $fileNameCin);
        }

        $dto = InscriptionDTO::getUserData($data);
        $dto['lienDiplome'] = $fileNameDiplome;
        $dto['lienCIN'] = $fileNameCin;
        $dto['password'] = Hash::make($dto['password']);

        $user = $this->userRepository->create($dto);
        $demandeData = [
            'name' => $user->name,
            'description' => 'become ouvrier',
            'type' => 'be_ouvrier',
            'status' => 'pending',
            'user_id' => $user->id,
            'notes' => 'be Ouvrier',
        ];
        $this->demandeRepository->create($demandeData);

        return $user;
    }
}
