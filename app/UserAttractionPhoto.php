<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserAttractionPhoto extends Model
{
    public function Attraction()
    {
        return $this->belongsTo('App\Attraction');
    }
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
