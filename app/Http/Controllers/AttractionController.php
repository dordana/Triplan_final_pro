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
        $user = Auth::user();
        $fav_arr = [];
        $attraction = Attraction::find($id);
        $reviews = Review::where('kind', "attraction")->where('id_type', $id)->get();
        $isRated = false;
        if($user){
            $userFavorites = $user->favorites;
            for($i = 0 ; $i < count($userFavorites) ; $i++){
                array_push($fav_arr,$userFavorites[$i]->attraction_id);
            }
            $usersRated = $attraction->users_id_rated;
            $usersIdArray = explode(",", $usersRated);
            if(in_array($user->id,$usersIdArray)){
                $isRated = true;
            }
        }
        
        
        
        return view('attractions/showattraction', [
            'attraction' => $attraction,
            'user' =>  $user,
            'userFavorites' => $fav_arr,
            'reviews' => $reviews,
            'attractions' => Attraction::where('id', '!=', $id)->take(3)->get(),
            'questions' => Question::where('attraction_id',$id)->get(),
            'isRated' => $isRated
            ]);
    }


    public function addratetoattraction(Request $request){
        $attraction = Attraction::find($request->attrId);
        if($attraction->rate == 0){
            $avgRate = intval($request->ratingValue);
        }else{
            $avgRate = (floatval($attraction->rate) + intval($request->ratingValue))/2;
        }
        $attraction->rate = $avgRate;
        $user = Auth::user();
        $users_id_rated = $attraction->users_id_rated . "," . $user->id;
        $attraction->users_id_rated = $users_id_rated;
        $attraction->save();
        return $attraction;
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
        
        return $question;
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
