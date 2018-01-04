<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CountryPhoto extends Model
{
    public function country()
    {
        return $this->belongsTo('App\Country');
    }
}
