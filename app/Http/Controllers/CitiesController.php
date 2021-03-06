<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use GuzzleHttp\Client;
use App\Country;
use App\Question;
use App\Answer;
use Image;
use App\City;
use Illuminate\Support\Facades\Auth;
use App\User;

class CitiesController extends Controller
{
    public function showcities()
    {
        return view('cities/cities',[
            'cities' => City::all(),
            'countries' => Country::all(),
        ]);
    }
    public function showcity($name){
        $city = City::where('name',$name)->first();
        $city->num_of_clicks += 1;
        $city->save();
        return view('cities/citydetails',[
            'city' => $city,
            'user' => Auth::user()
        ]);
    }
    
     public function editQuestion(Request $request){
        $question = Question::where('id',$request->qId)->first();
        $question->title = $request->title;
        $question->body = $request->body;
        $question->save();
        $response = array(
            'status' => 'success',
            'msg' => 'Setting created successfully',
        );
        return \Response::json($response);
    }
    
    public function addLike(Request $request){
        $question = Question::where('id',$request->qId)->first();
        $question->num_of_likes += 1;
        $question->save();
        $response = array(
            'status' => 'success',
            'msg' => 'Setting created successfully',
        );
        return \Response::json($response);
    }
    
      public function deleteQuestion(Request $request){
        $question = Question::where('id',$request->qId)->first();
        $question->delete();
        Answer::where('question_id',$request->qId)->delete();
        $response = array(
            'status' => 'success',
            'msg' => 'Setting created successfully',
        );
        return \Response::json($response);
    }
    
    public function addQuestion(Request $request){
        $user = Auth::user();
        $question = new Question;
        $question->user_id = $user->id;
        $question->body = $request->data;
        $question->title = $request->title;
        $question->city_id = $request->cId;
        
         if($request->hasFile('image_path')){
    		$photo= $request->file('image_path');
            $filename = time().rand(0,10000) . '.' . $photo->getClientOriginalExtension();
		    Image::make($photo)->resize(700, 500)->save( public_path('/uploads/questions/' . $filename ) );
		    $question->img_path = $filename;
    	}
        $question->save();
        return redirect()->back();
    }
    
     public function addAnswerToQuestion(Request $request){
        $user = Auth::user();
        $answer = new Answer;
        $answer->user_id = $user->id;
        $answer->body = $request->data;
        $answer->question_id = $request->qId;
         if($request->hasFile('image_path')){
    		$photo= $request->file('image_path');
            $filename = time().rand(0,10000) . '.' . $photo->getClientOriginalExtension();
		    Image::make($photo)->resize(700, 500)->save( public_path('/uploads/answers/' . $filename ) );
		    $answer->img_path = $filename;
    	}
        $answer->save();
        return redirect()->back();
    }

}
