<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Country;
use Mail;
use Config;
use App\City;
use App\User;
use App\Path;
use App\Review;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if(Auth::check()){
            if(Auth::user()->first_login == "0"){
                $user = Auth::user();
                $user->first_login = "1";
                $user->save();
            }
        }
        
        return view('index',
        [
            'mainCountries' => country::orderBy('num_of_clicks', 'desc')->take(3)->get(),
            'citiesToTravel' => City::all()->sortBy('name'),
            'countriesToTravel' => country::all()->sortBy('name'),
            'countries' => country::take(6)->get(),
            'reviews' => Review::take(3)->get(),
            'cities' => City::take(10)->get(),
            'paths' => Path::take(5)->get(),
        ]);
    }
   
    
    public function activeuser($id){
        $user = User::find($id);
        $user->active = 1;
        $user->save();
        
        return view('index',
            [
                'mainCountries' => country::orderBy('num_of_clicks', 'desc')->take(3)->get(),
                'citiesToTravel' => City::all()->sortBy('name'),
                'countriesToTravel' => country::all()->sortBy('name'),
                'countries' => country::take(6)->get(),
                'reviews' => Review::take(3)->get(),
                'cities' => City::take(10)->get(),
                'paths' => Path::take(5)->get(),
            ]);
    }
    public function userMsgEmail(Request $request)
    {
         $data = array(
            'name' => "Learning Laravel",
        );
        Mail::send('email-templates/welcome', $data, function ($message) {
            $message->from('triplan2018@gmail.com', 'Learning Laravel');
            $message->to('triplan2018@gmail.com')->subject("Hello");
        });
        return view('general/contact');
    }
    
    
    
    
     //General functions
     public function test()
    {
        return view('test');
    }
    public function terms()
    {
        return view('general/terms');
    }
    public function faq()
    {
        return view('general/faq');
    }
    public function contact()
    {
        return view('general/contact');
    }
    public function partners()
    {
        return view('general/partners');
    }
     public function shareus()
    {
        return view('general/shareus');
    }
      public function aboutus()
    {
        return view('general/aboutus');
    }
}