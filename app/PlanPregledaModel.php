<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlanPregledaModel extends Model
{
     protected $guarded = [];

     public function mernaOpremaSpisak()
    {
        return $this->belongsTo(MernaOpremaSpisak::class);
    }
}
