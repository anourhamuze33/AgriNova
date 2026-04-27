<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateDemandeRequest;
use App\Models\User;
use App\Repositories\User\UserRepository;
use App\Services\Demande\demandeService;
use App\Services\Document\documentService;
use App\Services\User\userService;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class AdminController extends Controller
{
    protected userService $userService;
    protected documentService $documentService;
    protected demandeService $demandeService;

    public function __construct(userService $userService, documentService $documentService, demandeService $demandeService)
    {
        $this->userService = $userService;
        $this->documentService = $documentService;
        $this->demandeService= $demandeService;
    }

    public function index()
    {
        $style =  asset('css/admin/index.css');
        $stats = $this->userService->getStatus();
        $usersDemanding = $this->userService->getAllUsersDemanding();

        foreach ($usersDemanding as $user) {
            $user->diplome_info = $this->documentService->getFilesInfos('diplomes', $user->lienDiplome);
            $user->cin_info = $this->documentService->getFilesInfos('cin', $user->lienCIN);
        }

        return view('admin.index', compact('usersDemanding', 'stats', 'style'));
    }

    public function acceptOrRefuse(UpdateDemandeRequest $request, User $user)
    {
        $demande = $this->userService->getDemande($user);
        $this->demandeService->updateBeOuvrier($user, $demande, $request->validated());
        return redirect()->route('admin.index');
    }
}
