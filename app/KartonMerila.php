<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KartonMerila extends Model
{
    protected $guarded = [];
    
    public function mernaOpremaSpisak()
    {
        return $this->belongsTo(MernaOpremaSpisak::class);
    }

    public function kartonMerilaUnos()
    {       
        return $this->hasMany(KartonMerilaUnos::class)->orderBy('vaziDo', 'DESC');
        
    }

}
