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
    public function loading(Request $request){
        return view('general/loading',[
            'request' => $request->all(),
            ]);
    }
    
    
    
    public function initTrip(Request $request){
        $date = new DateTime($request->start);
        $dateEnd = new DateTime($request->end);
        $interval = $date->diff($dateEnd);
        $num_of_days = intval($interval->format('%a')) +1;
        $num_of_attractions = $num_of_days*4;
        $attractions = Attraction::where("city_id",$request->city)->get();
        $typesArr = array('restauant'=> 0,
                        'sights'=> 0,
                        'museum'=> 0,
                        'tour'=> 0,
                        'park'=> 0,
                        'shopping'=> 0,
                        'concert'=> 0,
                        'nightlife'=> 0,
                        'water sport'=> 0,
                        'spa&wellness'=> 0,
                        'zoo'=> 0,
                        'airport'=> 0,
                        'casino'=> 0,
                        'beaches'=> 0,
                        'other'=> 0
                        );
                        
        for($i = 0; $i < count($attractions);$i++) {
          $val = ($attractions[$i]["type"]);
          $typesArr[$val]++;
        }

        
        
        
        
        
        return view('TripBuilder/tripbuilder',[
            'attractions' => $attractions,
            'country' => country::where('id',$request->country)->first(),
            'city' => City::where('id',$request->city)->first(),
            'start' => $request->start,
            'end' => $request->end,
            'num_of_attractions' => $num_of_attractions,
            'types' => $typesArr
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
                "lng" => Attraction::find($id)->lng,
                "id" => $id
            ));
            
        }
        // Array of dates
        $step = '+1 day';
        $output_format = 'Y-m-d';
        $dates = array();
        $weekDays = array();
        $current = strtotime($dateStart->format('Y-m-d'));
        $last = strtotime($dateEnd->format('Y-m-d'));

        while( $current <= $last ) {
            $dateN = date($output_format, $current);
            $dates[] = $dateN;
            //Convert the date string into a unix timestamp.
            $unixTimestamp = strtotime($dateN);
            //Get the day of the week using PHP's date function.
            $dayOfWeek = date("l", $unixTimestamp);
            array_push($weekDays,$dayOfWeek);
            $current = strtotime($step, $current);
        }
        
        
        $num_of_attractions = count($attractionsListByLatLng);
        
        
        $i = 0;
        $day = 0;
        $num_of_iterations = 0;
        $num_of_iterations_outsite_for = 1;
        $attractionsListPerDay = [];
        if (intval($num_of_attractions) >= intval($num_of_days)){
            $avg = intval(ceil(intval($num_of_attractions) / intval($num_of_days)));
            
            foreach ($dates as $date) {
                $oneDate = array(
                    "date"=> $date,
                    "weekDay" => array_shift($weekDays),
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
                                "lng" => $attractionsListByLatLng[$i]["lng"],
                                "id" => $attractionsListByLatLng[$i]["id"]
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
                $oneDate = array(
                    "date"=> $date,
                    "weekDay" => array_shift($weekDays),
                    "attractions" => []
                    );
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
            "num_of_days" => count($attractionsListPerDay),
            "request" => $request->all(),
            ]);
    }

    public function saveTrip(Request $request){
        $newPath = new Path;
        $user = Auth::user();
        $newPath->user_id = $user->id;
    	$newPath->city_id = $request->req["cityname"];
        $newPath->startLocation = $request->req["startLocation"];
        $newPath->startLocationString = $request->req["startLocationString"];
        $newPath->countryName = $request->req["countryName"];
        $newPath->attraction_list = $request->req["attractionList"];
        $newPath->title = $request->req["pathName"];	
        $newPath->start_date = $request->req["startDate"];	
        $newPath->end_date = $request->req["endDate"];
        $newPath->save();
        return $newPath;
    }
}
