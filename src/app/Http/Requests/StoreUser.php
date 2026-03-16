<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUser extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'role_id'           => 'required',
            'name'              => 'required|string|max:150',
            'email'             => 'required|email|unique:users',
            'user_name'         => 'required|string|max:150|unique:users',
            'telephone'         => 'required|string|max:20',
            'ville_id'          => 'required|integer|exists:villes,id',
            'specialite'       => 'required|string|max:150',
            'annees_experience' => 'required|integer|min:0|max:70',
            'tarif_horaire'     => 'required|integer|min:500|max:9000',
            'interventions'     => 'required|integer',
            'password'          => 'required|min:8|confirmed',
            'diplome'           => 'required|file|mimes:pdf,jpg,png|max:2048',
            'cin'               => 'required|file|mimes:pdf,jpg,png|max:2048',
        ];
    }
}
