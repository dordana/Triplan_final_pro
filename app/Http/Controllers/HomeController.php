<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Country;
use App\City;
class HomeController extends Controller
{


    public function index()
    {
        return view('index',
        [
            'citiesToTravel' => City::all()->sortBy('name'),
            'countriesToTravel' => country::all()->sortBy('name'),
            'countries' => country::take(6)->get(),
        ]);
    }
    
    public function terms()
    {
        return view('general/terms');
    }
}
