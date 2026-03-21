<?php

namespace App\Http\Controllers;

use App\Repositories\User\UserRepository;
use App\Services\Document\documentService;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    protected UserRepository $userRepository;
    protected documentService $documentService;

    public function __construct(UserRepository $userRepository, documentService $documentService)
    {
        $this->userRepository = $userRepository;
        $this->documentService = $documentService;
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
}
