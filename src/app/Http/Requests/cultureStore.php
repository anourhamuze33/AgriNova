<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class cultureStore extends FormRequest
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
            'img' => 'required|image|mimes:jpeg,png,webp|max:5120',
            'type_culture_id' => 'required|int',
            'field_id' => 'required|int',
            'user_id' => 'required|int',
            'season' => 'required|in:printemps,été,automne,hiver',
            'quantite_prevu'=>'required',
            'planting_date'=> 'required|date',
            'harvest_date' => 'required|date',
            'cycle' => 'required|in:planting,growth,treatment,harvest,done'
        ];
    }
}
