<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public function answers(){
        return $this->hasMany('App\Answer');
    }
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    public function city()
    {
        return $this->belongsTo('App\City');
    }
    
    public function country()
    {
        return $this->belongsTo('App\Country');
    }
    
    public function attraction()
    {
        return $this->belongsTo('App\Attraction');
    }
    
    
}
