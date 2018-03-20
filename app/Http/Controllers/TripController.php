<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\City;
use App\Attraction;

class TripController extends Controller
{
    public function initTrip(Request $request){
        return view('TripBuilder/tripbuilder',[
            'attractions' => Attraction::all()
            ]);
    }
    public function build(Request $request){
        $attractionList = array();
        $attr = json_decode($request->attractionList);

        for ($i = 0; $i < count($attr); $i++) {
            $attractionList[] = Attraction::where('id',$attr[$i])->first();
        }
        return view('TripBuilder/showTrip',[
            'attractions' => $attractionList
            ]);
    }
}
