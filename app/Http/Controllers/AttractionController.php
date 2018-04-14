<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Attraction;
use App\City;
use App\Http\Requests;

class AttractionController extends Controller
{
    public function showAllAttractions(){
        return view('attractions/attractions',[
            'attractions' => Attraction::all(),
            'cities' => City::all()
            ]);
        
        
    }
}
