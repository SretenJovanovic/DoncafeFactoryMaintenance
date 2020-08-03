<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MernaOpremaSpisak extends Model
{

    protected $guarded = [];
    
    public function user()
    {
        
        return $this->belongsTo(User::class);
        
    }

    public function kartonMerila()
    {
        return $this->hasOne(KartonMerila::class);
    }

    public function planPregledaModel()
    {
        return $this->hasOne(PlanPregledaModel::class);
    }
}
