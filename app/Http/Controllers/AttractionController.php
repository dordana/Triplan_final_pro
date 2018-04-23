<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Attraction;
use App\City;
use App\Question;
use App\Review;
use App\Answer;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class AttractionController extends Controller
{
    public function showAllAttractions(){
        return view('attractions/attractions',[
            'attractions' => Attraction::all(),
            'cities' => City::all()
            ]);
    }
    
    public function showAttraction($id){
        $attraction = Attraction::find($id);
        $reviews = Review::where('kind', "attraction")->where('id_type', $id)->get();
        return view('attractions/showattraction', [
            'attraction' => $attraction,
            'user' =>  $user = Auth::user(),
            'reviews' => $reviews,
            'attractions' => Attraction::where('id', '!=', $id)->take(3)->get()
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
        $question->attraction_id = $request->aId;
        $question->save();
        $response = array(
            'status' => 'success',
            'msg' => 'Setting created successfully',
        );
        
        return \Response::json($response);
    }
    
     public function addAnswerToQuestion(Request $request){
        $user = Auth::user();
        $answer = new Answer;
        $answer->user_id = $user->id;
        $answer->body = $request->data;
        $answer->question_id = $request->qId;
        $answer->save();
        $response = array(
            'status' => 'success',
            'msg' => 'Setting created successfully',
        );
        return \Response::json($response);
    }
    
    
}
