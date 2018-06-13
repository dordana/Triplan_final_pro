@extends('layouts.app')

@section('content')
<script type="text/javascript" >
	document.title = 'Triplan - Attractions';
</script>
<style type="text/css">
@import url(https://fonts.googleapis.com/css?family=Raleway:400,600,700);
@import url(https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css);
figure.snip1253 {
  font-family: 'Raleway', Arial, sans-serif;
  color: #fff;
  height: 300px !important;
  position: relative;
  float: left;
  overflow: hidden;
  margin: 10px 1%;
  min-width: 250px;
  max-width: 310px;
  width: 100%;
  background-color: #ffffff;
  color: #000000;
  text-align: left;
  font-size: 16px;
  box-shadow: 0 0 5px rgba(0, 0, 0, 0.15);
}
figure.snip1253 * {
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
  -webkit-transition: all 0.3s ease;
  transition: all 0.3s ease;
}
figure.snip1253 .image {
  max-height: 220px;
  overflow: hidden;
}
figure.snip1253 img {
  max-width: 100%;
  vertical-align: top;
  position: relative;
  transform: scale(1.30);
}
figure.snip1253 figcaption {
  margin: -40px 15px 0;
  padding: 15px ;
  position: relative;
  background-color: #ffffff;
}
figure.snip1253 .date {
  background-color: #f67930;
  top: 15px;
  color: #fff;
  left: 15px;
  min-height: 48px;
  min-width: 48px;
  position: absolute;
  text-align: center;
  font-size: 20px;
  font-weight: 700;
  text-transform: uppercase;
}
figure.snip1253 .date span {
  display: block;
  line-height: 24px;
}
figure.snip1253 .date .month {
  font-size: 14px;
  background-color: rgba(0, 0, 0, 0.1);
}
figure.snip1253 h3,
figure.snip1253 p {
  margin: 0;
  padding: 0;
}
figure.snip1253 h3 {
  min-height: 50px;
  margin-bottom: 10px;
  margin-left: 60px;
  display: inline-block;
  font-weight: 600;
  text-transform: uppercase;
}
figure.snip1253 p {
  font-size: 0.8em;
  margin-bottom: 20px;
  line-height: 1.6em;
}
figure.snip1253 footer {
  padding: 0 25px;
  background-color: #20638f;
  color: #e6e6e6;
  font-size: 0.8em;
  line-height: 30px;
  text-align: right;
}
figure.snip1253 footer > div {
  display: inline-block;
  margin-left: 10px;
}
figure.snip1253 footer i {
  color: rgba(255, 255, 255, 0.2);
  margin-right: 5px;
}
figure.snip1253 a {
  left: 0;
  right: 0;
  top: 0;
  bottom: 0;
  position: absolute;
  z-index: 1;
}
figure.snip1253:hover img,
figure.snip1253.hover img {
  -webkit-transform: scale(1.50);
  transform: scale(1.50);
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
  <figure class="snip1253">
    <div class="image"><img  src="{{ url('/uploads/attractions') }}/{{$attraction->mainpic}}" alt="sample59"/></div>
    <figcaption>
      <div class="date"><span class="day">{{$attraction->pricePerPerson}}</span><span class="month">USD</span></div>
      <h3>{{$attraction->name}}</h3>
      <p>
        {{substr($attraction->description, 0,80)}}
      </p>
    </figcaption>
    <a href="{{route('showattraction', $attraction->id)}}"></a>
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