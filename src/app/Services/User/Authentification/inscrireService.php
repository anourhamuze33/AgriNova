<?php

namespace App\Services\User\Authentification;

use App\DTOs\InscriptionDTO;
use App\Http\Requests\StoreUser;
use App\Models\User;
use App\Repositories\User\UserRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class inscrireService
{
    protected UserRepository $userRepository;
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    public function register(StoreUser $data)
    {
        $fileNameDiplome = null;
        $fileNameCin = null;



        if ($data->cin) {
            $fileDiplome = $data->file('diplome');
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
        return $user;
    }
}
