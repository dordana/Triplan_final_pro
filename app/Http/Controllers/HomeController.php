<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Country;
class HomeController extends Controller
{


    public function index()
    {
        return view('index',
        [
            'countries' => country::take(6)->get(),
        ]);
    }
    
    public function terms()
    {
        return view('general/terms');
    }
}
