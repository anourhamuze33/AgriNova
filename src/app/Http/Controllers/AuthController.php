<?php

namespace App\Http\Controllers;

use App\DTOs\inscriptionDTO;
use App\Http\Requests\loginRequest;
use App\Http\Requests\StoreUser;
use App\Models\User;
use App\Services\User\Authentification\inscrireService;
use App\Services\User\Authentification\loginService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    protected inscrireService $service;
    protected loginService $loginService;
    public function __construct(inscrireService $service, loginService $loginService)
    {
        $this->service = $service;
        $this->loginService = $loginService;
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(StoreUser $request)
    { 
        $this->service->register($request);
        return redirect()->route('index');
    }

    public function showLogin()
    {
        return view('auth.login');
    }
    public function login(loginRequest $request)
    {
        return $this->loginService->login($request);
    }
}
