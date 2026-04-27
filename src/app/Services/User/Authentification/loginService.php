<?php

namespace App\Services\User\Authentification;

use App\Http\Requests\loginRequest;
use App\Models\User;
use App\Services\User\userService;
use Illuminate\Support\Facades\Auth;

class loginService
{
    protected userService $userService;
    public function __construct(userService $userService)
    {
        $this->userService = $userService;
    }
    public function login(loginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        $user = User::where('email', $credentials['email'])->first();

        if (Auth::attempt($credentials)) {
            $demande = $this->userService->getDemande($user);
            
            if ($demande && $demande->status !== 'approved') {
                return back()->withErrors(['email' => 'Votre demande n\'est pas encore approuvée.',]);
            }

            Auth::login($user);

            if(!$user->roles()){
            $user->roles()->attach($user->role_id);
            }

            return redirect()->route('admin.index');
        }
        return back()->withErrors(['email' => 'Email ou mot de passe incorrect.']);
    }
}
