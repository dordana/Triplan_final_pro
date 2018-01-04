<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserCountryPhoto extends Model
{
    public function country()
    {
        return $this->belongsTo('App\ountry');
    }
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
