<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Culture extends Model
{
      protected $fillable = ['field_id', 'type_culture_id', 'cycle','season','planting_date','harvest_date','status','user_id', 'quantite_prevu'];
      protected $casts = ['harvest_date' => 'datetime','planting_date' => 'datetime'];

      public function field()
      {
            return $this->belongsTo(Field::class, 'field_id');
      }

      public function user()
      {
            return $this->belongsTo(User::class);
      }

      public function typeCulture()
      {
            return $this->belongsTo(Type_cultures::class);
      }
}
