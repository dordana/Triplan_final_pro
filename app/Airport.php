<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Airport extends Model
{
    public function city()
    {
        return $this->belongsTo('App\City');
    }
}
