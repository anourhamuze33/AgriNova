<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $userId = Auth::id() ?? User::query()->value('id');

        return [
            'name' => 'required|string|max:255',
            'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')->ignore($userId)],
            'user_name' => ['nullable', 'string', 'max:255', Rule::unique('users', 'user_name')->ignore($userId)],
            'telephone' => 'nullable|string|max:30',
            'ville_id' => 'nullable|integer|exists:villes,id',
            'specialite' => 'nullable|string|max:255',
            'annees_experience' => 'nullable|integer|min:0|max:60',
            'tarif_horaire' => 'nullable|numeric|min:0',
            'interventions'     => 'required|integer',
        ];
    }
}
