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
        $cities = City::all()->sortBy('name');
        return view('index',
        [
            'mainCountries' => country::orderBy('num_of_clicks', 'desc')->take(3)->get(),
            'citiesToTravel' => $cities,
            'countriesToTravel' => country::all()->sortBy('name'),
            'countries' => country::take(6)->get(),
        ]);
    }
    
    public function terms()
    {
        return view('general/terms');
    }
}
