<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public function country()
    {
        return $this->belongsTo('App\Country');
    }
    
    public function attractions(){
        return $this->hasMany('App\Attraction');
    }
    
    public function userPhotos(){
        return $this->hasMany('App\UserCityPhoto');
    }
    
    public function photos(){
        return $this->hasMany('App\CityPhoto');
    }
    
    public function airports(){
        return $this->hasMany('App\Airport');
    }
    
    public function questions(){
        return $this->hasMany('App\Question');
    }
}
