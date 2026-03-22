<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateDemandeRequest;
use App\Models\User;
use App\Repositories\User\UserRepository;
use App\Services\Demande\demandeService;
use App\Services\Document\documentService;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    protected UserRepository $userRepository;
    protected documentService $documentService;
    protected demandeService $demandeService;

    public function __construct(UserRepository $userRepository, documentService $documentService, demandeService $demandeService)
    {
        $this->userRepository = $userRepository;
        $this->documentService = $documentService;
        $this->demandeService= $demandeService;
    }

    public function index()
    {
        $usersDemanding = $this->userRepository->getAllUsersDemanding();
        foreach ($usersDemanding as $user) {

            $user->diplome_info = $this->documentService->getFilesInfos('diplomes', $user->lienDiplome);
            $user->cin_info = $this->documentService->getFilesInfos('cin', $user->lienCIN);
        }
        return view('admin.index', compact('usersDemanding'));
    }

    public function acceptOrRefuse(UpdateDemandeRequest $request, User $user)
    {
        $demande = $this->userRepository->getDemande($user)->first();
        $this->demandeService->updateBeOuvrier($user, $demande, $request->validated());
        return redirect()->route('admin.index');
    }
}
