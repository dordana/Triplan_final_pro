<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Country;
use App\Question;
use App\Answer;
use App\UserCountryPhoto;
use App\City;
use Image;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Http\Requests;
class CountryController extends Controller
{
    public function showcountry($name){
        $country = country::where('name',$name)->first();
        $country->num_of_clicks += 1;
        $country->save();
        return view('countries/countrydetalis',[
            'country' => $country,
            'user' => Auth::user()
        ]);
        
    }
    
    public function showallcountries(){
        
        return view('countries/countries',[
            'countries' => country::all(),
        ]);
    }
    
    public function getCitiesByCountry($name){
        $countryId = country::where('name',$name)->first()->id;
        $cities = City::where('country_id',$countryId)->get();
        return $cities;
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
        // return $request->all();
        $user = Auth::user();
        $question = new Question;
        $question->user_id = $user->id;
        $question->body = $request->data;
        $question->title = $request->title;
        $question->country_id = $request->cId;
        
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