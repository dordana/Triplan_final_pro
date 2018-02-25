<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;

class TripController extends Controller
{
    
    
    public function initTrip(Request $request){
        
        
        return $request->all();
        
    }
    
    
    
    
}
