<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Country;
use App\City;
use App\Http\Requests;
class CountryController extends Controller
{
    public function showcountry($name){
        $country = country::where('name',$name)->first();
        $country->num_of_clicks += 1;
        $country->save();
        return view('countries/countrydetalis',[
            'country' => $country
        ]);
    }
    
    public function showallcountries(){
        
        return view('countries/countries',[
            'countries' => country::all()
        ]);
    }
    
    public function getCitiesByCountry($name){
        $countryId = $country = country::where('name',$name)->first()->id;
        $cities = City::where('country_id',$countryId)->get();
        return $cities;
    }
}