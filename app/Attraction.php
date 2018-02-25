<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attraction extends Model
{
    public function city()
    {
        return $this->belongsTo('App\City');
    }
    
    public function photos(){
        return $this->hasMany('App\AttractionPhoto');
    }
    
    public function userPhotos(){
        return $this->hasMany('App\UserAttractionPhoto');
    }
    
    public function questions(){
        return $this->hasMany('App\Question');
    }
}
