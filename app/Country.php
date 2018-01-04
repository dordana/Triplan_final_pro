<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class country extends Model
{
    public function photos(){
        return $this->hasMany('App\CountryPhoto');
    }
    
    public function userPhotos(){
        return $this->hasMany('App\UserCountryPhoto');
    }
    
    public function cities(){
        return $this->hasMany('App\City');
    }
}
