<?php

namespace App\Services\User\Authentification;

use App\Http\Requests\loginRequest;
use App\Models\User;
use App\Services\User\userService;
use Illuminate\Support\Facades\Auth;

class loginService
{
    public function login(loginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        
        if (Auth::attempt($credentials)) {
            
            $user = userService::getLogedUser();
            $demande = $user->demandes()->where('type', 'be_ouvrier')->first();
            
            if ($demande && $demande->status !== 'approved') {
                
                Auth::logout();
                
                return back()->withErrors([
                    'email' => 'Votre demande n\'est pas encore approuvée.',
                    ]);
            }
            return redirect()->route('admin.index');
        }
        return back()->withErrors([
            'email' => 'Email ou mot de passe incorrect.',
        ]);
    }
}
