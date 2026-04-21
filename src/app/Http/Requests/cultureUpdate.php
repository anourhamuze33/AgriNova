<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class cultureUpdate extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'type_culture_id' => 'required|int',
            'field_id' => 'required|int',
            'user_id' => 'required|int',
            'season' => 'required|in:printemps,été,automne,hiver',
            'quantite_prevu' => 'required|numeric',
            'planting_date' => 'required|date',
            'harvest_date' => 'required|date|after_or_equal:planting_date',
            'cycle' => 'required|in:planting,growth,treatment,harvest,done',
        ];
    }
}
