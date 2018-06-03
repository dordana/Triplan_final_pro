<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = [
        'firstname','lastname','first_login','admin','age','username','gender','city','country', 'email','active', 'password','provider_id','provider','profile_phote_path'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function questions(){
        return $this->hasMany('App\Question');
    }
    
    public function friends(){
        return $this->hasMany('App\friend');
    }
    
    public function favorites(){
        return $this->hasMany('App\user_favorite');
    }
    
    public function answers(){
        return $this->hasMany('App\Answer');
    }
    
    public function reviews(){
        return $this->hasMany('App\Review');
    }
    
    public function paths(){
        return $this->hasMany('App\Path');
    }
    
    public function countryPhotos(){
        return $this->hasMany('App\UserCountryPhoto');
    }
    
    public function cityPhotos(){
        return $this->hasMany('App\UserCityPhoto');
    }
    
    public function attractionPhotos(){
        return $this->hasMany('App\UserAttractionPhoto');
    }
    
    public function reviewPhotos(){
        return $this->hasMany('App\ReviewPhoto');
    }
}
