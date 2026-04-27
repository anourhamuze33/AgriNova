<?php

namespace App\Http\Controllers;

use App\Http\Requests\loginRequest;
use App\Http\Requests\StoreUser;
use App\Services\User\Authentification\inscrireService;
use App\Services\User\Authentification\loginService;
use App\Services\villeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    protected inscrireService $service;
    protected loginService $loginService;
    protected villeService $villeService;
    
    public function __construct(inscrireService $service, loginService $loginService, villeService $villeService)
    {
        $this->service = $service;
        $this->loginService = $loginService;
        $this->villeService = $villeService;
    }

    public function showRegister()
    {
        $villes = $this->villeService->getAll();
        return view('auth.register', compact('villes'));
    }

    public function register(StoreUser $request)
    { 
        $this->service->register($request);
        return redirect()->route('cultures.index');
    }

    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(loginRequest $request)
    {
        $this->loginService->login($request);
        return redirect()->route('cultures.index');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('index');
    }
}
