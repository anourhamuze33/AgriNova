<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ville extends Model
{
    public function fields()
    {
        return $this->hasMany(Field::class);
    }
}
