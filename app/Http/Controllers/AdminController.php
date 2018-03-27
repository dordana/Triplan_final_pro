<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Country;
use App\Question;
use App\Answer;
use App\City;
use App\Attraction;
use App\User;
use App\Review;
use Illuminate\Support\Facades\Auth;
class AdminController extends Controller
{
    public function index(){
        return view('admin/dashboard',[
            'countries' => country::all(),
            'cities' => City::all(),
            'questions' => Question::all(),
            'answers' => Answer::all(),
            'attractions' => Attraction::all(),
            'reviews' => Review::all(),
            'users' => User::all(),
        ]);
    }
    
    public function showallusers(){
        return view('admin/allusers',[
            'users' => User::all()
        ]);
    }
    
}
