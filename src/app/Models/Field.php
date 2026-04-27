<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Field extends Model
{
        protected $fillable = ['name', 'ville_id', 'size'];

        public function getLocationAttribute()
        {
                return $this->ville->name;
        }

        public function cultures()
        {
                return $this->hasMany(Culture::class);
        }

        public function ville()
        {
                return $this->belongsTo(Ville::class);
        }

        public function equipments(): BelongsToMany
        {
                return $this->belongsToMany(
                        Equipment::class,
                        'equipment_allocations',
                        'field_id',
                        'equipment_id'
                )->withPivot(['start_date', 'end_date']);
        }
}
