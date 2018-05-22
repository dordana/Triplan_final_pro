<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\City;
use App\Country;
use App\Attraction;
use App\Path;
use Mail;
use Illuminate\Support\Facades\Auth;
use \Datetime;
use \PDF;

class TripController extends Controller
{
    public function loading(Request $request){
        return view('general/loading',[
            'request' => $request->all(),
            ]);
    }
    
    
    public function initTrip(Request $request){
        if($request->type == ""){
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
        }else{
            $date = new DateTime($request->start);
            $dateEnd = new DateTime($request->end);
            $interval = $date->diff($dateEnd);
            $num_of_days = intval($interval->format('%a')) +1;
            $num_of_attractions = $num_of_days*4;
            $attractions = Attraction::where("city_id",$request->city)->get();
            $pathName = $request->pathName;
            $startLocationString = $request->startLocationString;
            $startLocation = $request->startLocation;
            $budget = $request->budget;
            $items4 = array();$w4 = array();$v4 = array();
            foreach($attractions as $attr){
                array_push($items4,$attr->id);
                array_push($w4,$attr->pricePerPerson*intval($request->passengers));
                array_push($v4,100);
            }
            $numcalls = 0;
            $m = array();
            $pickedItems = array();
            list($m4,$pickedItems) = $this->knapSolveFast2($w4, $v4, sizeof($v4) -1, intval($budget), $m);
            $attractionList = array();
            $totalBudget = 0;
            foreach($pickedItems as $key) {
            	array_push($attractionList,"\"".$items4[$key]."\"");
            	$totalBudget += $w4[$key];
            }
            $attractionList = implode(',',$attractionList);
            $attractionListstring = "[".$attractionList."]";
            
            $data = [
                'attractionList' => $attractionListstring ,
                'totalBudget' => $totalBudget,
                'pathName' => $pathName,
                'cityname' => $request->city,
                'startDate' => $request->start,
                'endDate' => $request->end,
                'startLocation' => $startLocation,
                'startLocationString' => $startLocationString,
                'countryName' => country::where('id',$request->country)->first()->name,
                'numPass' => $request->passengers
            ];
            
            return view('general/loadingbudget',[
                'request' => $data
            ]);
        }
    }
    
    
    public function knapSolveFast2($w, $v, $i, $aW, &$m) {
 
    	global $numcalls;
    	$numcalls ++;
    	// echo "Called with i=$i, aW=$aW<br>";
     
    	// Return memo if we have one
    	if (isset($m[$i][$aW])) {
    		return array( $m[$i][$aW], $m['picked'][$i][$aW] );
    	} else {
     
    		// At end of decision branch
    		if ($i == 0) {
    			if ($w[$i] <= $aW) { // Will this item fit?
    				$m[$i][$aW] = $v[$i]; // Memo this item
    				$m['picked'][$i][$aW] = array($i); // and the picked item
    				return array($v[$i],array($i)); // Return the value of this item and add it to the picked list
     
    			} else {
    				// Won't fit
    				$m[$i][$aW] = 0; // Memo zero
    				$m['picked'][$i][$aW] = array(); // and a blank array entry...
    				return array(0,array()); // Return nothing
    			}
    		}	
     
    		// Not at end of decision branch..
    		// Get the result of the next branch (without this one)
    		list ($without_i, $without_PI) = $this->knapSolveFast2($w, $v, $i-1, $aW, $m);
     
    		if ($w[$i] > $aW) { // Does it return too many?
     
    			$m[$i][$aW] = $without_i; // Memo without including this one
    			$m['picked'][$i][$aW] = $without_PI; // and a blank array entry...
    			return array($without_i, $without_PI); // and return it
     
    		} else {
     
    			// Get the result of the next branch (WITH this one picked, so available weight is reduced)
    			list ($with_i,$with_PI) = $this->knapSolveFast2($w, $v, ($i-1), ($aW - $w[$i]), $m);
    			$with_i += $v[$i];  // ..and add the value of this one..
     
    			// Get the greater of WITH or WITHOUT
    			if ($with_i > $without_i) {
    				$res = $with_i;
    				$picked = $with_PI;
    				array_push($picked,$i);
    			} else {
    				$res = $without_i;
    				$picked = $without_PI;
    			}
     
    			$m[$i][$aW] = $res; // Store it in the memo
    			$m['picked'][$i][$aW] = $picked; // and store the picked item
    			return array ($res,$picked); // and then return it
    		}	
    	}
    }
    
    public function buildbudget(Request $request){
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
        
        return view('TripBuilder/showTripB',[
            "attractionList" => $attractionsListPerDay,
            "num_of_days" => count($attractionsListPerDay),
            "request" => $request->all(),
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
    	$newPath->cityname = City::find($request->req["cityname"])->name;
        $newPath->startLocation = $request->req["startLocation"];
        $newPath->startLocationString = $request->req["startLocationString"];
        $newPath->countryName = $request->req["countryName"];
        $newPath->attractionList = $request->req["attractionList"];
        $newPath->pathName = $request->req["pathName"];	
        $newPath->startDate = $request->req["startDate"];	
        $newPath->endDate = $request->req["endDate"];
        $newPath->type = $request->type;
        $newPath->save();
        return $newPath;
    }
    
    public function listView(Request $request){
        $data = $request->array;
        $data = json_decode($data);
        return view('test',['array' => $data]);
    }
    
    public function calendarView(Request $request){
        $data = $request->array;
        $data = json_decode($data);
        return view('TripBuilder/calendarView',['array' => $data]);
    }
    
    
    public function downloadPDF(Request $request){
        $data = $request->array;
        $data = json_decode($data);
        $pdf = \PDF::loadView('test',['array' => $data]);
        return $pdf->download('Your-next-trip.pdf');
    }
    
    public function sendEmail(Request $request){
        $data1 = $request->array;
        $data1 = json_decode($data1);
        $data = array(
            'array' => $data1,
        );
        Mail::send('test', $data, function ($message) {
            $message->from('triplan2018@gmail.com', 'Learning Laravel');
            $message->to('triplan2018@gmail.com')->subject("Your trip");
        });
    }
}
