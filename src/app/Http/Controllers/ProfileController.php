<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use App\Services\villeService;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function __construct(protected villeService $villeService)
    {
    }

    public function show()
    {
        $id = Auth::id();
        $user = User::find($id);        $villes = $this->villeService->getAll();

        return view('profile.show', compact('user', 'villes'));
    }

    public function update(ProfileUpdateRequest $request)
    {
        $id = Auth::id();
        $user = User::find($id);
        $user->update($request->validated());
        $user->refresh();

        return redirect()->route('profile.show');
    }
}
