<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    public function showRegister()
    {
        return view('auth.register');
    }
    public function register(Request $request)
    {
        $validated = $request->validate([
            'role_id' => 'required',
            'name' => 'required|string|max:150',
            'email' => 'required|email|unique:users',
            'user_name' => 'required|string|max:150|unique:users',
            'telephone' => 'required|string|max:20',
            'ville_id' => 'required|integer',
            'specialites' => 'required|string|max:150',
            'annees_experience' => 'required|integer|min:0|max:70',
            'tarif_horaire' => 'required|integer|min:500|max:9000',
            'interventions' => 'required|integer',
            'password' => 'required|min:8|confirmed',
            'diplome' => 'required|file|mimes:pdf,jpg,jpeg,png|max:5120',
            'cin'     => 'required|file|mimes:pdf,jpg,jpeg,png|max:5120',
        ]);
        //required|integer|exists:villes,id
        //table and input of cin

        //changer le nom du fichier uplodee to be unique
        if ($request->hasFile('diplome')) {
            $fileDiplome = $request->file('diplome');
            $fileNameDiplome = time() . '_Diplome_' . $fileDiplome->getClientOriginalName();
            $fileDiplome->storeAs('diplomes', $fileNameDiplome);
        }
        if ($request->hasFile('cin')) {
            $fileCIN = $request->file('cin');
            $fileNameCin = time() . '_CIN_' . $fileCIN->getClientOriginalName();
            Storage::disk('local')->putFileAs('cin', $fileCIN, $fileNameCin);
        }
        $user = User::create([
            'role_id' => $request->role_id,
            'name' => $request->name,
            'email' => $request->email,
            'user_name' => $request->user_name,
            'telephone' => $request->telephone,
            'ville_id' => $request->ville_id,
            'specialite' => $request->specialites,
            'annees_experience' => $request->annees_experience,
            'tarif_horaire' => $request->tarif_horaire,
            'interventions' => $request->interventions,
            'password' => Hash::make($request->password),
            'lienDiplome' => $fileNameDiplome,
            'lienCIN' => $fileNameCin,
        ]);
        // $user = User::create($validated)
        return redirect()->route('index');
    }
}
