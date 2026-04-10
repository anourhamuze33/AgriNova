<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type_cultures extends Model
{
    protected $fillable = ['type','name', 'imgUrl'];
    public function cultures()
    {
        return $this->hasMany(Culture::class);
    }
}

