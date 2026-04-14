<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
        protected $fillable = ['name','ville_id','size'];
        
        public function cultures()
        {
                return $this->hasMany(Culture::class);
        }

        public function ville()
        {
               return $this->belongsTo(Ville::class);
        }
}
