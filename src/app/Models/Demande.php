<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Demande extends Model
{
    protected $fillable = ['name','description','status', 'type', 'user_id', 'notes'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
