<?php

namespace App\Http\Controllers;

use App\DTOs\inscriptionDTO;
use App\Http\Requests\StoreUser;
use App\Models\User;
use App\Services\User\Authentification\inscrireService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    protected  $service;
    public function __construct(inscrireService $service)
    {
        $this->service = $service;
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
}
