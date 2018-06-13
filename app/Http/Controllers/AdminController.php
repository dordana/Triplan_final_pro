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
        $user = Auth::user();
        if ($user->admin == "0")
        {
             return view('index',[
                'mainCountries' => country::orderBy('num_of_clicks', 'desc')->take(3)->get(),
                'citiesToTravel' => City::all()->sortBy('name'),
                'countriesToTravel' => country::all()->sortBy('name'),
                'countries' => country::take(6)->get(),
                'reviews' => Review::take(3)->get()
            ]);
        }else{
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
    }
    
    public function showallusers(){
        $user = Auth::user();
        if ($user->admin == "0")
        {
             return view('index',[
                'mainCountries' => country::orderBy('num_of_clicks', 'desc')->take(3)->get(),
                'citiesToTravel' => City::all()->sortBy('name'),
                'countriesToTravel' => country::all()->sortBy('name'),
                'countries' => country::take(6)->get(),
                'reviews' => Review::take(3)->get()
            ]);
        }else{
            return view('admin/allusers',[
                'users' => User::all()
            ]);
        }
    }
    
    public function userEdit(Request $request){
        
        $id = $request->id;
        $type = $request->type;
        $val = $request->value;
        $user = User::find($id);
        $user->update([$type => strval($val)]);
        return;
    }
    
     public function userInactive(Request $request){
        $id = $request->id;
        $user = User::find($id);
        $user->active = "0";
        $user->save();
        return $user;
    }
    
    public function userActive(Request $request){
        $id = $request->id;
        $user = User::find($id);
        $user->active = "1";
        $user->save();
        return $user;
    }
    
    public function adduser(){
        return view('admin.adduser');
    }
    
}
