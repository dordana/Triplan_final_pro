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
        $date = new DateTime($request->start);
        $dateEnd = new DateTime($request->end);
        $interval = $date->diff($dateEnd);
        $num_of_days = intval($interval->format('%a')) +1;
        $num_of_attractions = $num_of_days*4;
        return view('TripBuilder/tripbuilder',[
            'attractions' => Attraction::where("city_id",$request->city)->get(),
            'country' => country::where('id',$request->country)->first(),
            'city' => City::where('id',$request->city)->first(),
            'start' => $request->start,
            'end' => $request->end,
            'num_of_attractions' => $num_of_attractions
            ]);
    }
    
    
    
    
    public function build(Request $request){
        $attractionsListById = $request->attractionList;
        $dateStart = new DateTime($request->startDate);
        $dateEnd = new DateTime($request->endDate);
        $interval = $dateStart->diff($dateEnd);
        $num_of_days = intval($interval->format('%a')) +1;
        $attractionsListById = json_decode($attractionsListById);
        $attractionsListByLatLng = array();
        $tempString = str_replace("(","",$request->startLocation);
        $tempString = str_replace(")","",$tempString);
        $tempString = str_replace(" ","",$tempString);
        $startLocation = explode(",",$tempString);
  
        foreach ($attractionsListById as $id) {
            array_push($attractionsListByLatLng,
            array(
                "lat" => Attraction::find($id)->lat,
                "lng" => Attraction::find($id)->lng
            ));
            
        }
        
        
        
        
        
        
        // Array of dates
        $step = '+1 day';
        $output_format = 'd/m/Y';
        $dates = array();
        $current = strtotime($dateStart->format('Y-m-d'));
        $last = strtotime($dateEnd->format('Y-m-d'));

        while( $current <= $last ) {
            $dates[] = date($output_format, $current);
            $current = strtotime($step, $current);
        }
        
        
        $num_of_attractions = count($attractionsListByLatLng);
        
        
        $i = 0;
        $num_of_iterations = 0;
        $num_of_iterations_outsite_for = 1;
        $attractionsListPerDay = array();
        if (intval($num_of_attractions) >= intval($num_of_days)){
            $avg = intval(ceil(intval($num_of_attractions) / intval($num_of_days)));
            
            foreach ($dates as $date) {
                $oneDate = array(
                    "date"=> $date,
                    "attractions" => array
                        (
                            "0" => array(
                                "lat" => $startLocation[0],
                                "lng" => $startLocation[1]
                            )
                        )
                    );
                for($i; $i < $avg*$num_of_iterations_outsite_for; $i++) {
                    if(count($attractionsListByLatLng) > $num_of_iterations)
                    {
                        array_push($oneDate["attractions"],
                            array(
                                "lat" => $attractionsListByLatLng[$i]["lat"],
                                "lng" => $attractionsListByLatLng[$i]["lng"]
                            ));
                        $num_of_iterations++;
                    }else{
                        $break;
                    }
                } 
                array_push($attractionsListPerDay,$oneDate);
                $num_of_iterations_outsite_for++;
            }
        }else{
           foreach ($dates as $date) {
                $oneDate = array("date"=> $date,"attractions" => []);
                if($i < $num_of_attractions){
                    $attr = $attractionsListByLatLng[$i++];
                    $oneDate["attractions"] = array
                    (
                        "0" => array(
                            "lat" => $startLocation[0],
                            "lng" => $startLocation[1]
                        ),
                        "1" => $attr
                    );
                }
                array_push($attractionsListPerDay,$oneDate);
            } 
        }
        
        
        
        
        
        
        return view('TripBuilder/showTrip',[
            "attractionList" => $attractionsListPerDay,
            "num_of_days" => count($attractionsListPerDay)
            ]);
    }
    
 
    
    
    
    
    
    
    
    
    
    function distance($lat1, $lon1, $lat2, $lon2) {
      $theta = $lon1 - $lon2;
      $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
      $dist = acos($dist);
      $dist = rad2deg($dist);
      $miles = $dist * 60 * 1.1515;
      $unit = strtoupper("K");
      return ($miles * 1.609344);
    }
    
    
    
    
}
