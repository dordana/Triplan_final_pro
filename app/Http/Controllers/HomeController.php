<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\country;
class HomeController extends Controller
{


    public function index()
    {
        return view('index',
        [
            'countries' => country::take(6)->get(),
        ]);
    }
}
