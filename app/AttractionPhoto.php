<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttractionPhoto extends Model
{
    public function Attraction()
    {
        return $this->belongsTo('App\Attraction');
    }
}
