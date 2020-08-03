<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KartonMerilaUnos extends Model
{
    public function kartonMerila()
    {
        return $this->belongsTo(KartonMerila::class);
    }
}
