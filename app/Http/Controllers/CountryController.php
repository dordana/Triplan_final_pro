<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\country;
use App\Http\Requests;

class CountryController extends Controller
{
    public function showcountry($name){
        
        return view('countries/countrydetalis',[
            'country' => country::where('name',$name)->first()
        ]);
    }
}
