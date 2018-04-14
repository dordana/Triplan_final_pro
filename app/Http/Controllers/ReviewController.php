<?php

namespace App\Http\Controllers;

use App\Country;
use App\Question;
use App\Answer;
use App\City;
use Image;
use File;
use App\Attraction;
use App\Review;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use App\User;
use App\ReviewPhoto;
use Illuminate\Http\Request;
use App\Http\Requests;

class ReviewController extends Controller
{
    public function showallreviews(){
        
        return view('reviews/reviews',[
            'reviews' => Review::all(),
        ]);
    }
    
    public function rating(Request $request){
        $rate = $request->rate;
        $user = Auth::user();
        $id = $request->id;
        $review = Review::where('id',$id)->first();
        if($review->rate == 0){
            $avgRate = intval($rate);
        }else{
            $avgRate = (floatval($review->rate) + intval($rate))/2;
        }
        $review->rate = $avgRate;
        $review->save();
        
        return $review;
    }
    
    public function addreviewpage(){
        return view('reviews/addReview',[
            'countries' => Country::orderBy('name', 'ASC')->get(),
            'cities' => City::orderBy('name', 'ASC')->get(),
            'attractions' => Attraction::orderBy('name', 'ASC')->get(),
        ]);
    }
    
    public function showreview($review_id){
        $review = Review::where('id',$review_id)->first();
        return view('reviews/showReview',[
            'review' => $review,
        ]);
    }
    
    public function addreview(Request $request){

        $user = Auth::user();
        $newReview = new Review;
        $newReview->user_id = $user->id;
        $newReview->body = $request->body;
        $newReview->title = $request->title;
        $newReview->start_date = $request->startDate;
        $newReview->end_date = $request->endDate;
        $newReview->kind = $request->kind_of;
        $newReview->id_type = $request->kind_id;
        $newReview->type_of_visit = $request->type;
        $newReview->type = $request->type_of_R;
        $newReview->save();
        
        if($request->hasFile('photos')){
    		$photosArray = $request->file('photos');
    		foreach ($photosArray as $photo) {
                $filename = time().rand(0,10000) . '.' . $photo->getClientOriginalExtension();
    		    Image::make($photo)->resize(700, 500)->save( public_path('/uploads/reviews/' . $filename ) );
    		    $rPhoto = new ReviewPhoto;
    		    $rPhoto->review_id = $newReview->id;
    		    $rPhoto->user_id = $user->id;
    		    $rPhoto->path = $filename;
    		    $rPhoto->save();
            }
            $review = Review::find($newReview->id);
            $review->mainpic = $filename;
            $review->save();
            
    	}

        return view('reviews/reviews',[
            'reviews' => Review::all(),
        ]);
    }
    
    
}
