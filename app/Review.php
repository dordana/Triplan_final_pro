<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    public function attraction()
    {
        return $this->belongsTo('App\Attraction');
    }
    
    public function photos(){
        return $this->hasMany('App\ReviewPhoto');
    }
}
