@extends('layouts.empty')
@section('content')
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Triplan - Show trip</title>
    <meta id="token" name="token" content="{{ csrf_token() }}">
    <script src="/scripts/jquery-1.11.2.min.js" type="text/javascript"></script>
    <script src="/scripts/bootstrap.min.js" type="text/javascript"></script>
    <script src="/scripts/ie10-viewport-bug-workaround.js" type="text/javascript"></script>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">

    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyANCJz6VCN08LgrmIuFXA612KyffxWyqec&libraries=places&language=en"></script>
    <link rel="styleshehttps://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.csset" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" type="text/css" />
<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <style type="text/css">
    
    body{
        font-family: 'Montserrat', sans-serif;
    }
      #googleMap{
        height: 100%;
        z-index:0;
        position:relative;
      }

.goBack:hover{
    background:#ff7847;
}
.v-centered {
	display: flex;
    justify-content: center;
    align-items: center;
    width: 100vw;
    height: 0px;
    position: absolute;
    top: 85%;
    left: 10px;
    z-index: 99;
}
.carousel {
	position: absolute;
	overflow: hidden;
	width: 839px;
}
.roll {
	position: relative;
	white-space: nowrap;
	font-size: 0;
	left:  0px;
}
.project {
	width: 200px;
    height: 225px;
	background-color: #FFF;
	-webkit-box-shadow: 5px 5px 5px 1px rgba(0,0,0,0.5); 
    -moz-box-shadow: 5px 5px 5px 1px rgba(0,0,0,0.5); 
	box-shadow: 5px 5px 5px 1px rgba(0,0,0,0.5); 
	text-align: center;
	margin: 0 10px 15px 0;
	display: inline-block;
	font-size: 18px;
	cursor: pointer;
}
.project img {
	margin-top: 10px;
	    width: 185px;
    height: 150px;
}
.project p {
	margin: 10px;
	font-family: 'Source Sans Pro', sans-serif;
	font-weight: 200;
	text-align: left;
	white-space: normal;
}

.sections {
	text-align: center;
	color: #b4fdc0;
	font-size: 12px;
}

.sections i {
	margin: 0 2px;
	cursor: pointer;
}

.navigation {
	position:  absolute;
	border: none;
	padding: 0;
	background-color: rgba(35,35,35,0.8);
	height: 34px;
	width: 34px;
	color:  #FFF;
	font-size: 20px;
	text-align: center;
	top: 176px;
	z-index: 10;
	cursor: pointer;
}
.navigation:visited  {
	text-decoration: none;
}
.navigation-hover {
	height: 50px;
	width: 50px;
	top:  168px;
}
.navigation:active {
	text-decoration: none;
}
.navigation:focus {
	outline: none;
}
.navigation:first-of-type {
	left: 0px;
}
.navigation:last-of-type {
	right: 10px;
}


@media screen and (max-width: 950px) {
    .carousel {
		position: relative;
		overflow: hidden;
		width: 620px;
	}
}
@media screen and (max-width: 655px) {
    .carousel {
		position: relative;
		overflow: hidden;
		width: 310px;
	}
}
h4{
  font-family: 'Muli', sans-serif;
      margin-top: 8px;
}
.days{
 opacity: 0.3;
}
.days:hover{
 opacity: 1;
}

#wrapper {
    width: 50%;
    height: 1060px;
    overflow: hidden;
    margin: 20px auto;
    background: #fff;
    border: 1px solid #c6c6c6;
}

div.screen {
    height: 1060px;
    overflow: hidden;
    background: transparent;
    margin: 15px;
}

.list {
    margin-top: 36px;
    text-align: left;
}

.item {
    height: 115px;
    margin-left: 115px;
    clear: both;
}

.item .img, .item span {
    background: #f0f0f0;
}

.item .img {
    float: left;
    width: 96px;
    height: 81px;
    margin-left: -113px;
}

.item span {
    height: 11px;
    width: 320px;
    margin-bottom: 19px;
    float: left;
}

.item span:nth-of-type(3) {
    width: 95px;
    margin-bottom: 0;
}

.opt:link {
    color: #e76e66;
    text-decoration: none;
    outline: none;
    transition: all 0.25s;
}

.opt:visited {
    color: #666;
    text-decoration: none;
}

.opt:link:hover {
    color: #666;
    text-decoration: none;
}

.opt:visited:hover {
    color: #e76e66;
    text-decoration: none;
}
#social-sidebar a{text-decoration:none}
#social-sidebar ul,#social-sidebar ul li,#social-sidebar ul li a{list-style:none;margin:0;padding:0}
/* ---------- Social Sidebar ---------- */
#social-sidebar{right:0;margin-top:-75px;/* (li * a:width) / -2 */
	position:fixed;top:50%}
#social-sidebar ul li:first-child a{border-radius:5px 0 0}
#social-sidebar ul li:last-child a{border-radius:0   0 0 5px}
#social-sidebar ul li a{
    color: white;
    display: block;
    height: auto !important;
    font-size: 10px;
    padding: 17px;
    position: relative;
    text-align: center;
    width: 94px;
    font-weight: bold;
}
#social-sidebar ul li a:hover span{right:130%;opacity:1}
#social-sidebar ul li a span{border-radius:3px;line-height:24px;right:-100%;margin-top:-16px;-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";filter:alpha(opacity=0);opacity:0;padding:4px 8px;position:absolute;-webkit-transition:opacity .3s,left .4s;-moz-transition:opacity .3s,left .4s;-ms-transition:opacity .3s,left .4s;-o-transition:opacity .3s,left .4s;transition:opacity .3s,left .4s;top:50%}
#social-sidebar ul li a span:before{content:"";display:block;height:8px;right:-4px;margin-top:-4px;position:absolute;top:50%;-webkit-transform:rotate(45deg);-moz-transform:rotate(45deg);-ms-transform:rotate(45deg);-o-transform:rotate(45deg);transform:rotate(45deg);width:8px;}
#social-sidebar ul li a[class*="twitter"]:hover,#social-sidebar ul li a[class*="twitter"] span,#social-sidebar ul li a[class*="twitter"] span:before{background:#7d7e7e}
#social-sidebar ul li a[class*="gplus"]:hover,#social-sidebar ul li a[class*="gplus"] span,#social-sidebar ul li a[class*="gplus"] span:before{background:#7d7e7e}
#social-sidebar ul li a[class*="tumblr"]:hover,#social-sidebar ul li a[class*="tumblr"] span,#social-sidebar ul li a[class*="tumblr"] span:before{background:#7d7e7e}
#social-sidebar ul li a[class*="facebook"]:hover,#social-sidebar ul li a[class*="facebook"] span,#social-sidebar ul li a[class*="facebook"] span:before{background:#7d7e7e}
#social-sidebar ul li a[class*="rss"]:hover,#social-sidebar ul li a[class*="rss"] span,#social-sidebar ul li a[class*="rss"] span:before{background:#7d7e7e}
#social-sidebar ul li a[class*="attraction"]:hover,#social-sidebar ul li a[class*="attraction"] span,#social-sidebar ul li a[class*="attraction"] span:before{background:#7d7e7e}
#social-sidebar{
    z-index:99;
        top: 15%;
}
.far,.fas {
    font-size: 35px !important;
}



.entypo-twitter{
    background: #f79b5d;
}
.entypo-gplus{
    background: #f78536;
}
.entypo-tumblr{
    background: #ff7500;
}
.entypo-facebook{
    background: #e05200;
}
.entypo-rss{
    background: #f96230;
}
.fa-check-circle{
    font-size: 45px !important;
}
/*right sidebar*/
.entypo-attraction{
    background:white;
    color:black !important;
    border: solid 1px #f67930;
    height: 90px !important;
        font-size: 14px!important;
     padding: 0px !important; 
}

#social-sidebar ul li a[class*="attraction"]:hover{
    background:orange;
    color:white !important;
}
b:hover{
    color:white !important;
}

#social-sidebar ul li a[class*="attraction"] span,
#social-sidebar ul li a[class*="attraction"] span:before
{
    background:white;
    border: solid 1px #f67930;
}


/**/

/**/
/* navbar styles */
.navbar__component {
  background-color: #fff;
  border-top: 4px solid #f67930;
  box-shadow:  0 0 10px #777;
  max-height: 60px;
  max-width: 100%;
  width: 100%;
  z-index: 999;
}
.navbar--hidden {
  display: none;
}
.navbar--slideup {
  display: block;
  max-height: 60px;
  animation: slideUp 1s forwards;
}
.navbar__list {
  display: -webkit-flex;
  display: flex;
  -webkit-flex-direction: row;
  flex-direction: row;
  line-height: 55px;
  max-height: 55px;
  margin: 0;
  padding: 0;
}
.navbar__item {
  display: inline-block;
  -webkit-flex: 1 0 0;
  flex: 1 0 0;
  border-right: 1px solid #f67930;
  color: #555;
  font-size: .9em;
  padding-left: 15px;
  padding-right: 15px;
  text-align: center;
  vertical-align: middle;
  white-space: nowrap;
}
/*.navbar__item:first-child,
.navbar__item:last-child {
  -webkit-flex: 1 0 0;
  flex: 1 0 0;
}
.navbar--main {
  webkit-flex: 3 0 0;
  flex: 3 0 0;
}*/
.navbar__item:last-child {
  border-right: none;
}
.navbar--ad {
  webkit-flex: 3 0 0;
  flex: 3 0 0;
}
.navbar--link {
  cursor: pointer;
  text-decoration: none;
  text-transform: capitalize;
}
.navbar--bottom {
  position: fixed;
  bottom: 0;
  left: 0;
}
.navbar--sticky {
  position: -webkit-sticky; /* for safari */
  position: sticky;
  top: 0;
  bottom: initial;
}
.navbar--sticky .navbar--link {
  color: red;
}
.navbar__item .minutes-icon {
  display: block;
  border-radius: initial;
  margin: 10px auto 2px;
  fill: #333;
}
.navbar__item .minutes-icon + span {
  display: inline-block;
  line-height: 15px;
  vertical-align: top;
}
.navbar--green {
  color: #008000;
}
.navbar--green .minutes-icon {
  fill: green;
}
.navbar__component .share-page {
  border-right: 1px solid #ddd;
}

/* animations */
@keyframes fadeIn {
  from { opacity: 0}
  to   { opacity: 1}
}
@keyframes slideUp {
  0%   { transform: translate(0px,100px); }
  100% { transform: translate(0px,0px); }
}


@media (max-width: 325px) {
  .navbar__item {
    font-size: .75em;
    padding-left: 7px;
    padding-right: 7px;
  }
}
@media (max-width: 425px) {
  .navbar__item {
    -webkit-flex: initial;
    flex: initial;
  }
}
#cityNameNavBar{
    color:#f67930; 
    font-size:40px;
    text-transform: uppercase;
    font-weight: bold;
}
.titles{
    font-size:12px;
    text-transform: uppercase;
    font-weight: bold;
}
/**/
    </style>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
    <script type="text/javascript" src="https://unpkg.com/sweetalert2@7.19.1/dist/sweetalert2.all.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{!! asset('pages/showtrip/showtrip.css') !!}" rel="stylesheet" />

</head>

<body>
<style type="text/css">

h1 {
  text-align:center;
  font-size: 40px;
  color:white;
}
input {
  width: 120px;
  height: 40px;
  font-family: 'Ubuntu', sans-serif;
  font-size: 15px;
  border: none;
  color: white;
  z-index: 22;
  cursor: pointer;
  box-shadow: 0 3px 5px rgba(0,0,0, 0.5);
}
#warning {
    z-index: 22;
  position: fixed;
  top: 90%;
  transform: translate(-50%, -65%);
  background: #FFAB40;
  right: -50px;
}

#warning:hover {
  background: #ff950d;
  box-shadow: 0 5px 5px rgba(0,0,0, 0.5);
}

input:focus{
  outline: none;
}
    </style>


    <!-- UI - X Starts -->
    
					<div class="ui-item-three">
						<!-- UI Icons -->
						<a href="#" class="travelModeCh act" type="DRIVING" title="Car"><i class="fa fa-car"></i></a>
						<a href="#" class="travelModeCh" type="BICYCLING" title="Bicycle"><i class="fa fa-bicycle"></i></a>
						<a href="#" class="travelModeCh" type="TRANSIT" type1="TRAIN" title="Train"><i class="fa fa-train"></i></a>
						<a href="#" class="travelModeCh" type="WALKING" title="Walk"><i class="fa fa-male"></i></a>
						<a href="#" class="travelModeCh" type="TRANSIT" type1="BUS" title="Bus"><i class="fa fa-bus"></i></a>
						
					</div>
<!-- UI - X Ends -->
    
    
<!--left sidebar-->
<div id='social-sidebar'>
    <!--<input id="warning" type="button" value="Budget Mode" />-->
    <ul>
        <li>
        	<a class='entypo-rss opt' style="font-size:12px;" href='javascript:void(0)' target='_blank' >
        		<span>Details</span>
        	    Budget:<br>{{$request["totalBudget"]}} $<br><hr>
        	    Passengers:<br>{{$request["numPass"]}}
        	</a>
        </li>
        <li id="saveTrip">
        	<a class='entypo-twitter opt' href='javascript:void(0)' target='_blank' id="saveText">
        		<span>Save</span>
        		<i id="saveIco" class="far fa-save"></i><br>
        		Save my trip
        	</a>
        </li>
        <li>
        	<a class='entypo-gplus opt' href='javascript:void(0)' target='_blank' id="sendEmail">
        		<span>Email</span>
        		<i class="far fa-envelope"></i><br>
        		Send to email
        	</a>
        </li>
        <li>
        	<a class='entypo-tumblr opt' href='javascript:void(0)' target='_blank' id="pdfFile">
        		<span>PDF</span>
        		<i class="far fa-file-pdf"></i><br>
        		Download PDF file
        	</a>
        </li>
        <li>
        	<a class='entypo-facebook opt' href='javascript:void(0)' target='_blank' id="listview">
        		<span>List</span>
        		 <i class="fas fa-list-ul"></i><br>
        	    Show list view
        	</a>
        </li>
        <li>
        	<a class='entypo-facebook opt' href='/'>
        		<span>Homepage</span>
        		 <i class="fas fa-home"></i><br>
        	    Back to homepage
        	</a>
        </li>
    </ul>
</div>
<!--end left sidebar-->

<!--google maps-->
<div id="map" class="tab-pane fad in active">
<div id="googleMap"></div>
  <div id="infoPanel" class="tab-pane fad">
      <div id="panel" class="col-md-12 panel"></div>
  </div>
</div>
<!--end google maps-->

<!--right sidebar-->
<div id='social-sidebar' style="right: auto;">
    <ul>
        @for($i=0;$i < count($attractionList); $i++)
        <li class="attraction_li" indexAttr="{{$i}}">
        	<a class='entypo-attraction' href='javascript:void(0)' target='_blank' style="height: 70px!important;width: 150px">
        	    <b style="color:#f67930; font-size:17px;font-weight: bold;">Day {{$i+1}}</b>
        	    <br>
  				{{$attractionList[$i]["weekDay"]}}
  				<br>
  				{{ Carbon\Carbon::parse( $attractionList[$i]["date"])->format('d/m') }}
        	</a>
        </li>
        @endfor
    </ul>
</div>
<!--end right sidebar-->

<!-- bottom navbar -->
<div class="navbar__component navbar--bottom">
  <div class="navbar__area">
    <nav role="navigation">
      <ul class="navbar__list">
        <li class="navbar__item"><span class="titles">City: </span>{{App\City::find($request["cityname"])->name}}, {{$request["countryName"]}}</li>
        <li class="navbar__item"><span class="titles">Trip name: </span>{{$request["pathName"]}}</li>
        <li class="navbar__item"><span class="titles">Duration: </span><span class="duration">0 hours 0 minutes 0 seconds</span></li>
        <li onClick="document.location.href = '/'" class="navbar__item navbar--link navbar--ad" id="cityNameNavBar">TRIPLAN</li>
        <li class="navbar__item"><span class="titles">Distance: </span><span class="distance">0 km</span></li>   
        <li class="navbar__item"><span class="titles">First day: </span>{{ Carbon\Carbon::parse($request["startDate"])->format('d/m/Y') }}</li>
        <li class="navbar__item"><span class="titles">Last day: </span>{{ Carbon\Carbon::parse( $request["endDate"])->format('d/m/Y') }}</li>
      </ul>
    </nav>
  </div>
</div>
<!---->




















<script src="https://code.jquery.com/jquery-1.12.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/0.9.0rc1/jspdf.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</body>

<!--actions-->
<script type="text/javascript">
var req = {!! json_encode($request) !!};
    $('#saveTrip').click(function(){
	    	var url = "{{route('savetrip')}}";
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': '{{csrf_token()}}'
				}
			});
            
			$.ajax({
				type: "POST",
				url: url,
				data : {req,type:"budget"},
				success: function(data) {
				    $("#saveText").html("<i class='fa fa-circle-o-notch fa-spin' style='font-size:35px'></i>Saving");
				    setTimeout(function(){
                        $("#saveText").html("<span>Saved!</span><i class='far fa-check-circle'><br></i>Saved!");
                        $(".entypo-twitter").css("background", "green");
                        $(this).off( "click");
                    },3000); 
				},error: function(data){
				    swal({
                      type: 'error',
                      title: 'Oops...',
                      text: 'Something went wrong!',
                    })
				}
			});
	    });
	    
        $('#backToBuilder').click(function () {
           history.go(-2);
        });
        $('#listview').click(function () {
           generateObjToSend("listView");
        });
        $('#pdfFile').click(function () {
            generateObjToSend("downloadPDF");
        });
         $('#sendEmail').click(function () {
            generateObjToSend("sendEmail");
        });
</script>



<script src="{!! asset('js/async.js') !!}"></script>


<script type="text/javascript">
	var attractionList = {!! json_encode($attractionList) !!};
  $(".attraction_li").click(function(){
    var dayIndex = $(this).attr("indexAttr");
    var attractionsPerDay = attractionList[dayIndex];
    if(attractionsPerDay.attractions.length <= 1){
        swal({
          type: 'warning',
          title: 'Oops...',
          text: 'Unfortunately, this day left without attractions',
        });
    }else{
         initializeMap(attractionsPerDay);
    }
});






/* global $ */
var directionsRenderer;
var autoComplete;
var googleMap;
var marker;
var travelMode = "DRIVING";
var transitMode = null;
var geocoder = new google.maps.Geocoder;
$(".act").css("color","#F67930");


$(".travelModeCh").click(function(){
    transitMode = null;
     $(".duration").text("0 hours 0 minutes 0 seconds");
    $(".distance").text("0 km");
   travelMode = $(this).attr("type");
   if(travelMode == "TRANSIT"){
       transitMode = $(this).attr("type1");
   }
   $(".travelModeCh").css("color","#666");
   $(this).css("color","#F67930");
});


function initializeMap(attractions) {
  if(attractions.attractions != undefined){
     // Add way points to array.
    
        var locationList = [];
        var wayPoints = [];
        for(var i = 1 ; i < attractions.attractions.length; i++){
          var wayPoint =
          {
              location:  new google.maps.LatLng(parseFloat(attractions.attractions[i].lat),parseFloat(attractions.attractions[i].lng)),
              stopover: true,
          };
          var obj = {lat : parseFloat(attractions.attractions[i].lat),
                    id : parseFloat(attractions.attractions[i].id),
                    lng : parseFloat(attractions.attractions[i].lng)};
            locationList.push(obj);
            
            wayPoints.push(wayPoint);                
        }
    // Clear previous directions, if any.
        if (directionsRenderer) {
            directionsRenderer.setMap(null);
        }
        var directionsService = new google.maps.DirectionsService;
        directionsRenderer = new google.maps.DirectionsRenderer({
            map: googleMap,
            draggable: true,
            polylineOptions: { strokeColor: "#f67930" }
        });
    if(wayPoints.length > 1){
        //origin and destination lat lng to address
        
        if (travelMode == "TRANSIT"){
            var directionsRequest = {
                origin: new google.maps.LatLng(parseFloat(attractions.attractions[0].lat),parseFloat(attractions.attractions[0].lng)),
                destination: new google.maps.LatLng(parseFloat(attractions.attractions[0].lat),parseFloat(attractions.attractions[0].lng)),
                travelMode: google.maps.TravelMode[travelMode],
                transitOptions: {
                    modes: [transitMode],
                    routingPreference: 'FEWER_TRANSFERS'
                },
                waypoints: wayPoints,
                optimizeWaypoints: true
            }
        }else{
            var directionsRequest = {
                origin: new google.maps.LatLng(parseFloat(attractions.attractions[0].lat),parseFloat(attractions.attractions[0].lng)),
                destination: new google.maps.LatLng(parseFloat(attractions.attractions[0].lat),parseFloat(attractions.attractions[0].lng)),
                travelMode: google.maps.TravelMode[travelMode],
                waypoints: wayPoints,
                optimizeWaypoints: true
            }
        }
        var x;
        // Send request to the directions service.
        directionsService.route(directionsRequest, function (response, status) {
            if (status == google.maps.DirectionsStatus.ZERO_RESULTS){
                swal({
                      type: 'error',
                      title: 'Oops...',
                      text: 'There is no ' +(transitMode ? transitMode.toLowerCase() : travelMode.toLowerCase())+ ' path',
                    });
            }
            else if (status == google.maps.DirectionsStatus.OK) {
                // directionsRenderer.setDirections(response);
                x = response.routes[0].waypoint_order.pop();
                var destinationLat = attractions.attractions[x+1].lat;
                var destinationLng= attractions.attractions[x+1].lng;
                var wayPoints2 = [];
                for(var i = 0 ; i < wayPoints.length; i++){
                    if(i != x){
                        wayPoints2.push(wayPoints[i]); 
                    }
                }
                
                if (travelMode == "TRANSIT"){
                    var directionsRequest = {
                        origin: new google.maps.LatLng(parseFloat(attractions.attractions[0].lat),parseFloat(attractions.attractions[0].lng)),
                        destination: new google.maps.LatLng(parseFloat(destinationLat),parseFloat(destinationLng)),
                        travelMode: google.maps.TravelMode[travelMode],
                        transitOptions: {
                            modes: [transitMode],
                            routingPreference: 'FEWER_TRANSFERS'
                        },
                        waypoints: wayPoints2,
                        optimizeWaypoints: true
                    }
                }else{
                    var directionsRequest = {
                        origin: new google.maps.LatLng(parseFloat(attractions.attractions[0].lat),parseFloat(attractions.attractions[0].lng)),
                        destination: new google.maps.LatLng(parseFloat(destinationLat),parseFloat(destinationLng)),
                        travelMode: google.maps.TravelMode[travelMode],
                        waypoints: wayPoints2,
                        optimizeWaypoints: true
                    }
                }
                
            
            
                // Send request to the directions service.
                directionsService.route(directionsRequest, function (response, status) {
                    
                    if (status == google.maps.DirectionsStatus.ZERO_RESULTS){
                        swal({
                          type: 'error',
                          title: 'Oops...',
                            text: 'There is no ' +(transitMode ? transitMode.toLowerCase() : travelMode.toLowerCase())+ ' path',
                        });
                    }
                    else if (status == google.maps.DirectionsStatus.OK) {
                        var distance = 0;
                        var time = 0;
                        var route = response.routes[0].legs;
                        for (var j = 0 ; j < route.length; j++){
                            distance += route[j].distance.value;
                            time += route[j].duration.value;
                        }
                        var hours = Math.floor(time / 3600);
                        time %= 3600;
                        var minutes = Math.floor(time / 60);
                        var seconds = time % 60;
                        $(".duration").text(hours + " hours " + minutes + " minutes " + seconds + " seconds");
                        $(".distance").text((distance/1000) + " km");
                        directionsRenderer.setDirections(response);
                        // for(var step = 0; step < route.length; step++){
                        //     var infowindow = new google.maps.InfoWindow();
                        //     infowindow.setContent(route[step].start_address);
                        //     infowindow.setPosition(route[step].start_location);
                        //     infowindow.open(googleMap);
                        // }
                        } else {
                                console.log(google.maps.DirectionsStatus);
                                console.log(status);
                            }
                        });
            }
            });
        }else if(wayPoints.length == 1){
            if (travelMode == "TRANSIT"){
                var directionsRequest = {
                    origin: new google.maps.LatLng(parseFloat(attractions.attractions[0].lat),parseFloat(attractions.attractions[0].lng)),
                    destination: new google.maps.LatLng(parseFloat(attractions.attractions[1].lat),parseFloat(attractions.attractions[1].lng)),
                    travelMode: google.maps.TravelMode[travelMode],
                    transitOptions: {
                        modes: [transitMode],
                        routingPreference: 'FEWER_TRANSFERS'
                    },
                    optimizeWaypoints: true
                }
            }else{
                var directionsRequest = {
                    origin: new google.maps.LatLng(parseFloat(attractions.attractions[0].lat),parseFloat(attractions.attractions[0].lng)),
                    destination: new google.maps.LatLng(parseFloat(attractions.attractions[1].lat),parseFloat(attractions.attractions[1].lng)),
                    travelMode: google.maps.TravelMode[travelMode],
                    optimizeWaypoints: true
                }
            }
            
                
                directionsService.route(directionsRequest, function (response, status) {
                if (status == google.maps.DirectionsStatus.ZERO_RESULTS){
                    swal({
                      type: 'error',
                      title: 'Oops...',
                      text: 'There is no ' +(transitMode ? transitMode.toLowerCase() : travelMode.toLowerCase())+ ' path',
                    });
                }
                else if (status == google.maps.DirectionsStatus.OK) {
                    var route = response.routes[0].legs;
                    var distance = route[0].distance.value;
                    var time = route[0].duration.value;
                    var hours = Math.floor(time / 3600);
                    time %= 3600;
                    var minutes = Math.floor(time / 60);
                    var seconds = time % 60;
                    $(".duration").text(hours + " hours " + minutes + " minutes " + seconds + " seconds");
                    $(".distance").text((distance/1000) + " km");
                        directionsRenderer.setDirections(response);
                    }else{
                        console.log(google.maps.DirectionsStatus);
                        console.log(status);
                    }
                });
        
        
        
        
    }

    
  }else{
    var latLng = new google.maps.LatLng(attractionList[0].attractions[0].lat, attractionList[0].attractions[0].lng);

    var mapOptions = {
        center: latLng,
        zoom: 7,
        disableDefaultUI: true,
    };

    googleMap = new google.maps.Map(document.getElementById("googleMap"), mapOptions);

    google.maps.event.addListener(googleMap, 'click', function (e) {
        // Remove previous marker, if any.
        if (marker) {
            marker.setMap(null);
        }

        // Get address by lat/lng.
        var geocoder = new google.maps.Geocoder();
        
        geocoder.geocode({ 'latLng': e.latLng }, function (results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                if (results[0]) {
                    var address = results[0].formatted_address;

                    marker = new google.maps.Marker({
                        position: e.latLng,
                        map: googleMap,
                        title: address
                    });
                }
            }
        });
    });
  }
}


// Add window load event.
google.maps.event.addDomListener(window, "load", initializeMap);



function generateObjToSend(url){
    var tripObject = [];
    var array = [];
    var attractionList = {!! json_encode($attractionList) !!};
    
    function itrDay(day){
        array = [];
        var locationList = [];
        var attractionDay = day;
        var wayPoints = [];
        var objStart = {lat : parseFloat(attractionDay.attractions[0].lat),
                    id : 0,
                    lng : parseFloat(attractionDay.attractions[0].lng)};
        array.push(objStart);
        for(var i = 1 ; i < attractionDay.attractions.length; i++){
            var wayPoint =
            {
              location:  new google.maps.LatLng(parseFloat(attractionDay.attractions[i].lat),parseFloat(attractionDay.attractions[i].lng)),
              stopover: true,
            };
            var obj = {lat : parseFloat(attractionDay.attractions[i].lat),
                    id : parseFloat(attractionDay.attractions[i].id),
                    lng : parseFloat(attractionDay.attractions[i].lng)};
            locationList.push(obj);
            wayPoints.push(wayPoint);                
        }
        var directionsService = new google.maps.DirectionsService;
        if(wayPoints.length > 1){
            
            if (travelMode == "TRANSIT"){
                var directionsRequest = {
                    origin: new google.maps.LatLng(parseFloat(attractionDay.attractions[0].lat),parseFloat(attractionDay.attractions[0].lng)),
                    destination: new google.maps.LatLng(parseFloat(attractionDay.attractions[0].lat),parseFloat(attractionDay.attractions[0].lng)),
                    travelMode: google.maps.TravelMode[travelMode],
                    transitOptions: {
                        modes: [transitMode],
                        routingPreference: 'FEWER_TRANSFERS'
                    },
                    waypoints: wayPoints,
                    optimizeWaypoints: true
                }
            }else{
                var directionsRequest = {
                    origin: new google.maps.LatLng(parseFloat(attractionDay.attractions[0].lat),parseFloat(attractionDay.attractions[0].lng)),
                    destination: new google.maps.LatLng(parseFloat(attractionDay.attractions[0].lat),parseFloat(attractionDay.attractions[0].lng)),
                    travelMode: google.maps.TravelMode[travelMode],
                    waypoints: wayPoints,
                    optimizeWaypoints: true
                }
            }
            
            
        var x;
        // Send request to the directions service.
        directionsService.route(directionsRequest, function (response, status) {
            if (status == google.maps.DirectionsStatus.ZERO_RESULTS){
                swal({
                      type: 'error',
                      title: 'Oops...',
                      text: 'There is no ' +(transitMode ? transitMode.toLowerCase() : travelMode.toLowerCase())+ ' path',
                    });
            }
            else if (status == google.maps.DirectionsStatus.OK) {
                
                x = response.routes[0].waypoint_order.pop();
                var destinationLat = attractionDay.attractions[x+1].lat;
                var destinationLng= attractionDay.attractions[x+1].lng;
                var destinationId= attractionDay.attractions[x+1].id;
                var objLast = {lat : parseFloat(destinationLat),
                    id : parseFloat(destinationId),
                    lng : parseFloat(destinationLng)};
                   
                var wayPoints2 = [];
                var locationList2 = [];
                for(var i = 0 ; i < wayPoints.length; i++){
                    if(i != x){
                        wayPoints2.push(wayPoints[i]); 
                        locationList2.push(locationList[i]);
                    }
                }
                
                if (travelMode == "TRANSIT"){
                    var directionsRequest = {
                        origin: new google.maps.LatLng(parseFloat(attractionDay.attractions[0].lat),parseFloat(attractionDay.attractions[0].lng)),
                        destination: new google.maps.LatLng(parseFloat(destinationLat),parseFloat(destinationLng)),
                        travelMode: google.maps.TravelMode[travelMode],
                        transitOptions: {
                            modes: [transitMode],
                            routingPreference: 'FEWER_TRANSFERS'
                        },
                        waypoints: wayPoints2,
                        optimizeWaypoints: true
                    }
                }else{
                    var directionsRequest = {
                        origin: new google.maps.LatLng(parseFloat(attractionDay.attractions[0].lat),parseFloat(attractionDay.attractions[0].lng)),
                        destination: new google.maps.LatLng(parseFloat(destinationLat),parseFloat(destinationLng)),
                        travelMode: google.maps.TravelMode[travelMode],
                        waypoints: wayPoints2,
                        optimizeWaypoints: true
                    }
                }
                
            
            
                // Send request to the directions service.
                directionsService.route(directionsRequest, function (response, status) {
                    
                    if (status == google.maps.DirectionsStatus.ZERO_RESULTS){
                        swal({
                          type: 'error',
                          title: 'Oops...',
                            text: 'There is no ' +(transitMode ? transitMode.toLowerCase() : travelMode.toLowerCase())+ ' path',
                        });
                    }
                    else if (status == google.maps.DirectionsStatus.OK) {
                        var order = response.routes[0].waypoint_order;
                        var route = response.routes[0].legs;
                        
                        for (var x = 0 ; x < response.routes[0].waypoint_order.length; x++){
                            array.push(locationList2[response.routes[0].waypoint_order[x]]);
                        }
                        array.push(objLast);
                        
                        var distance = 0;
                        var time = 0;
                        console.log(route)
                        for (var j = 0 ; j < route.length; j++){
                            distance += route[j].distance.value;
                            time += route[j].duration.value;
                        }
                        var hours = Math.floor(time / 3600);
                        time %= 3600;
                        var minutes = Math.floor(time / 60);
                        var seconds = time % 60;
                         tripObject.push({"day": day.weekDay, "date": day.date,
                            "attractions":array , "time": hours + " hours " + minutes + " minutes " + seconds + " seconds",
                            "distance": distance,"pathname": '{{$request["pathName"]}}'
                        });
                        
                    }else{
                            console.log(google.maps.DirectionsStatus);
                            console.log(status);
                    }
                    
                });
                
            }
        })
    }else if(wayPoints.length == 1){
         
            if (travelMode == "TRANSIT"){
                var directionsRequest = {
                    origin: new google.maps.LatLng(parseFloat(attractionDay.attractions[0].lat),parseFloat(attractionDay.attractions[0].lng)),
                    destination: new google.maps.LatLng(parseFloat(attractionDay.attractions[1].lat),parseFloat(attractionDay.attractions[1].lng)),
                    travelMode: google.maps.TravelMode[travelMode],
                    transitOptions: {
                        modes: [transitMode],
                        routingPreference: 'FEWER_TRANSFERS'
                    },
                    optimizeWaypoints: true
                }
            }else{
                
                var directionsRequest = {
                    origin: new google.maps.LatLng(parseFloat(attractionDay.attractions[0].lat),parseFloat(attractionDay.attractions[0].lng)),
                    destination: new google.maps.LatLng(parseFloat(attractionDay.attractions[1].lat),parseFloat(attractionDay.attractions[1].lng)),
                    travelMode: google.maps.TravelMode[travelMode],
                    optimizeWaypoints: true
                }
            }
            
                
                directionsService.route(directionsRequest, function (response, status) {
                if (status == google.maps.DirectionsStatus.ZERO_RESULTS){
                    swal({
                      type: 'error',
                      title: 'Oops...',
                      text: 'There is no ' +(transitMode ? transitMode.toLowerCase() : travelMode.toLowerCase())+ ' path',
                    });
                }
                else if (status == google.maps.DirectionsStatus.OK) {
                    var order = response.routes[0].waypoint_order;
                    var route = response.routes[0].legs;
                    var time = route[0].duration.value;
                    var distance = 0;
                    var hours = Math.floor(time / 3600);
                    time %= 3600;
                    var minutes = Math.floor(time / 60);
                    var seconds = time % 60;
                    $(".duration").text(hours + " hours " + minutes + " minutes " + seconds + " seconds");
                    $(".distance").text((distance/1000) + " km");
                    
                    }else{
                        console.log(google.maps.DirectionsStatus);
                        console.log(status);
                    }
                })
                
            }
        }
        var promise = Promise.resolve();
        var interval = 500;
        attractionList.forEach(function (el) {
          promise = promise.then(function () {
            itrDay(el)
            return new Promise(function (resolve) {
              setTimeout(resolve, interval);
            });
          });
        });
        promise.then(function () {
            console.log(tripObject);
            if(url == "downloadPDF"){
                $("#pdfFile").html("<i class='fa fa-circle-o-notch fa-spin' style='font-size:35px'></i>Creating");
                setTimeout(function(){
                    $("#pdfFile").html("<span>Downloaded!</span><i class='far fa-check-circle'><br></i>Downloaded!");
                    tripObject = JSON.stringify(tripObject);
                    window.location.href = "/"+url+"?array=" +  tripObject ;
                },1000);
            }else if(url == "sendEmail") {
                $("#sendEmail").html("<i class='fa fa-circle-o-notch fa-spin' style='font-size:35px'></i>Creating");
                setTimeout(function(){
                    $("#sendEmail").html("<span>Sent!</span><i class='far fa-check-circle'><br></i>Sent!");
                	var url = "{{route('sendEmail')}}";
                	tripObject = JSON.stringify(tripObject);
        			$.ajaxSetup({
        				headers: {
        					'X-CSRF-TOKEN': '{{csrf_token()}}'
        				}
        			});
        
        			$.ajax({
        				type:"GET",
        				url: url,
        				data : {array: tripObject},
        				success: function(data) {
        				    console.log(data)
        				}
        			});
                },2000);
            }else{
                tripObject = JSON.stringify(tripObject);
                window.location.href = "/"+url+"?array=" +  tripObject ;
            }
        }); 
    }
</script>






</html>
@endsection