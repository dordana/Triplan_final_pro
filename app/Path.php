<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Path extends Model
{
    public $timestamps = true;
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
