<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\City;
use App\Country;
use App\Attraction;
use App\Path;
use Illuminate\Support\Facades\Auth;
use \Datetime;


class TripController extends Controller
{
    public function initTrip(Request $request){
        
        return view('TripBuilder/tripbuilder',[
            'attractions' => Attraction::all(),
            'country' => country::where('id',$request->country)->first(),
            'city' => City::where('id',$request->city)->first(),
            'start' => $request->start,
            'end' => $request->end
            ]);
    }
    public function build(Request $request){
        $attractionList = array();
        $attr = json_decode($request->attractionList);
        for ($i = 0; $i < count($attr); $i++) {
            $attractionList[] = Attraction::where('id',$attr[$i])->first();
        }
        $newPath = new Path;
        $newPath->user_id = Auth::user()->id;
        $newPath->attraction_list = $request->attractionList;
        $newPath->title = $request->pathName;
        $date = new DateTime($request->startDate);
        $newPath->start_date =  $date->format('Y-m-d H:i:s');
        $date1 = new DateTime($request->endDate);
        $newPath->end_date =  $date1->format('Y-m-d H:i:s');
        $newPath->save();
        $this->calculateTrip($newPath);
        $interval = $date->diff($date1);
        $num_of_days = intval($interval->format('%a'));
       
       
       
        return view('TripBuilder/showTrip',[
            'attractions' => $attractionList,
            'days' => $num_of_days
            ]);
    }
    
    public function calculateTrip($pathDetalis){
        
        //
        
    }
    
    
    
    
}
