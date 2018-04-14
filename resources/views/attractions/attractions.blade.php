@extends('layouts.app')

@section('content')
<style type="text/css">
@import url(https://fonts.googleapis.com/css?family=Roboto:300,400,600);
.snip1336 {
  font-family: 'Roboto', Arial, sans-serif;
  position: relative;
  float: left;
  overflow: hidden;
  margin: 10px 1%;
  min-width: 230px;
  max-width: 315px;
  width: 100%;
  color: #ffffff;
  text-align: left;
  line-height: 1.4em;
  background-color: #141414;
}
.snip1336 {
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
  -webkit-transition: all 0.25s ease;
  transition: all 0.25s ease;
}
.snip1336 img {
  max-width: 100%;
  vertical-align: top;
  opacity: 0.85;
}
.snip1336 figcaption {
  width: 100%;
  background-color: #ebebeb;
  padding: 25px;
  position: relative;
}
.snip1336 figcaption .info {
  padding: 5px;
  border: 1px solid #f68546 ;
  font-size: 0.7em;
  text-transform: uppercase;
  margin: 0 auto;
  display: block;
  opacity: 0.65;
  width: 47%;
  text-align: center;
  text-decoration: none;
  font-weight: 600;
  letter-spacing: 1px;
}
.snip1336 figcaption a:hover {
  opacity: 1;
}
.snip1336 .profile {
  border-radius: 50%;
  position: absolute;
  bottom: 100%;
  left: 25px;
  z-index: 1;
  max-width: 90px;
  opacity: 1;
  box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
}
.snip1336 .follow {
  margin-right: 4%;
  border-color: #2980b9;
  color: #2980b9;
}
.snip1336 h2 {
  margin: 0 0 5px;
  font-weight: 300;
}
.snip1336 h2 span {
  display: block;
  font-size: 0.5em;
  color: #2980b9;
}
.snip1336 p {
  margin: 0 0 10px;
  font-size: 0.8em;
  letter-spacing: 1px;
  opacity: 0.8;
}
p{
  color:black;
}


.search {
  width: 50%;
  position: relative;
  display: block;
  margin: 0 auto;
}
.search:before {
  position: absolute;
  top: 0;
  right: 0;
  width: 40px;
  height: 40px;
  line-height: 40px;
  font-family: 'FontAwesome';
  content: '\f002';
  background: #f68546;
  text-align: center;
  color: #fff;
  border-radius: 5px;
  -webkit-font-smoothing: subpixel-antialiased;
  font-smooth: always;
}

.heading-section {
    padding-bottom: 0 !important; 
    margin-bottom: 20px !important;
}

.searchTerm {
  -moz-box-sizing: border-box;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
  width: 100%;
  border: 3px solid #f68546;
  padding: 5px;
  height: 40px;
  border-radius: 5px;
  outline: none;
}

.searchButton {
  position: absolute;
  top: 0;
  right: 0;
  width: 40px;
  height: 40px;
  opacity: 0;
  cursor: pointer;
}
</style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" type="text/css" />


<p id="pageName" hidden >Attractions</p>

<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">
					  <br>
					  <br>
					  <br>
						<h3 style="color:black;">Attractions</h3>
						<p></p>
					</div>
				</div>
		</div>

  
  <br>
  
  <br><br>
  <form class="search">
  <input list="browsers" class="searchTerm"  placeholder="Enter city or attraction..." />
  <input class="searchButton" />
  <datalist id="browsers">
    @foreach($cities as $city)
      <option value="{{$city->name}}">
    @endforeach
     @foreach($attractions as $attraction)
      <option class="attra" value="{{$attraction->name}}">
    @endforeach
  </datalist>
</form>
<br>  <br>
  <hr>
  <div class="container">
    <div class="row">
   
   <h3 style="text-align:center;"><span id="numAttr">0</span> <span id="textnumAttr">Attractions were</span> found</h3>
@foreach($attractions as $attraction)  
<div class="attraItem" name="{{$attraction->name}}" cityname="{{App\City::find($attraction->city_id)->name}}">
  <div class="col-md-4" >
   <figure class="snip1336">
    <img style="width:315px;height:180px;" src="{{ url('/uploads/attractions') }}/{{$attraction->mainpic}}" alt="sample87" />
    <figcaption>
      <h2><B>{{$attraction->name}}</B><span><a href="{{route('show-citydetalis', App\City::find($attraction->city_id)->name)}}">{{App\City::find($attraction->city_id)->name}}</a></span></h2>
      <p>{{substr($attraction->description, 0,80)}}</p>
      <a href="#" class="info">More Info</a>
    </figcaption>
  </figure>
  </div>
</div>
@endforeach


    </div>
  </div>
 


<br>  <br>  <br>


<script type="text/javascript">
$( document ).ready(function() {

  $(".attraItem").hide();
  var cities = {!! json_encode($cities->toArray()) !!};
	var attractions = {!! json_encode($attractions->toArray()) !!}; 
	
  $('.searchButton').click(function(e){
    e.preventDefault();
    var numAttr = 0;
    $(".attraItem").fadeOut("slow");
    var searchValue = $(this).prev().val().toLowerCase();
    var i = 0;
    var cityOrAttr = false;
    for (i = 0; i < cities.length; i++) { 
        if (cities[i].name.toLowerCase() == searchValue){
          cityOrAttr = true;
        }
    } 
    if(cityOrAttr){
      //cities
      $(".attraItem").each(function( index ) {
        if($(this).attr("cityname").toLowerCase() == searchValue){
          console.log($(this));
          $(this).fadeIn("slow");
          numAttr++;
        }
      });
    }else{
      //attractions
      $(".attraItem").each(function( index ) {
        if($(this).attr("name").toLowerCase() == searchValue){
          $(this).fadeIn("slow");
          numAttr++;
        }
      });
    }
    
    $("#numAttr").text(numAttr);
    if(numAttr == 1){
      $("#textnumAttr").text(" Attraction was");
    }
  });
 
});
</script>
@endsection