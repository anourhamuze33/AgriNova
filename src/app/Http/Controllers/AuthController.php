<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showRegister()
    {
        return view('auth.register');
    }
    public function register(Request $request)
    {
        $validated = $request->validate([
            'role_id'=>'required|array',
            'name' => 'required|string|max:150',
            'email' => 'required|email|unique:users',
            'user_name' => 'required|string|max:150|unique:users',
            'telephone' => 'required|string|max:20',
            'ville_id' => 'required|integer',
            'specialites' => 'required|string|max:150',
            'annees_experience' => 'required|integer|min:0|max:70',
            'tarif_horaire' => 'required|integer|min:500|max:9000',
            'diplome' => 'required|string|max:255',
            'cin'=>'required|string',
            'password' => 'required|min:8|confirmed'
        ]);
//required|integer|exists:villes,id
//table and input of cin
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'user_name'=>$request->user_name,
            'password' => Hash::make($request->password),
        ]);
        // $user = User::create($validated)

    }
}
