@extends('layouts.empty')
@section('content')
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Google Map - Path Optimization</title>
    <script src="/scripts/jquery-1.11.2.min.js" type="text/javascript"></script>
    <script src="/scripts/bootstrap.min.js" type="text/javascript"></script>
    <script src="/scripts/ie10-viewport-bug-workaround.js" type="text/javascript"></script>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">

    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyANCJz6VCN08LgrmIuFXA612KyffxWyqec&libraries=places&language=en"></script>
    <link rel="styleshehttps://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.csset" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" type="text/css" />

    <style type="text/css">
      #googleMap{
        height: 100%;
        z-index:0;
        position:relative;
      }
.goBack{
    margin: 0 auto;
    display:block;
    background:#ff7847;
    border:none;
    color:white !important;
       position: absolute;
    top: 3%;
    left: 40%;
    z-index: 99;
    width: 300px;
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
    </style>
</head>

<body>
  <div id="map" class="tab-pane fad in active">
    <div id="googleMap"></div>
      <div id="infoPanel" class="tab-pane fad">
          <div id="panel" class="col-md-12 panel"></div>
      </div>
  </div>
  <a href="/" class="btn btn-primary goBack">Back to home page</a>
<div class="v-centered">
		<div class="carousel days" >
		    
			<div class="roll">
			  @for($i=0;$i < count($attractionList); $i++)
  				<div class="project" indexAttr="{{$i}}">
  					<img   src="{{ url('/uploads/attractions') }}/{{$attractionList[$i]['pic']}}" alt="Project img 1">
  					<h4>{{$attractionList[$i]["weekDay"]}}<br>{{ Carbon\Carbon::parse( $attractionList[$i]["date"])->format('d/m/Y') }}</h4>
  				</div>
				@endfor
				
			</div>
			<div class="sections">
			</div>
			<button class="navigation" id="nav-left"><i class="fa fa-angle-left" aria-hidden="true"></i></button>
			<button class="navigation" id="nav-right"><i class="fa fa-angle-right" aria-hidden="true"></i></button>
		</div>
	</div>
<!-- Load scripts -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</body>
    







<script type="text/javascript">
var num_of_days = parseInt('{{$num_of_days}}');
if (num_of_days > 5){
  $(".carousel").css("width","1240px");
  $(".navigation").show();
}else{
  var px = 210;
  $(".carousel").css("width",(px*num_of_days)+"px");
  $(".navigation").hide();
}



	var attractionList = {!! json_encode($attractionList) !!};
  $(".project").click(function(){
    var dayIndex = $(this).attr("indexAttr");
    var attractionsPerDay = attractionList[dayIndex];
    initializeMap(attractionsPerDay);
});






/* global $ */
var directionsRenderer;
var autoComplete;
var googleMap;
var marker;
var geocoder = new google.maps.Geocoder;
function initializeMap(attractions) {
  if(attractions.attractions != undefined){
      console.log(attractions.attractions)
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
            draggable: true
        });
        
    if(wayPoints.length > 1){
        //origin and destination lat lng to address
        var directionsRequest = {
            origin: new google.maps.LatLng(parseFloat(attractions.attractions[0].lat),parseFloat(attractions.attractions[0].lng)),
            destination: new google.maps.LatLng(parseFloat(attractions.attractions[0].lat),parseFloat(attractions.attractions[0].lng)),
            travelMode: google.maps.TravelMode["DRIVING"],
            waypoints: wayPoints,
            optimizeWaypoints: true
        }
      
        var x;
        // Send request to the directions service.
        directionsService.route(directionsRequest, function (response, status) {
            if (status == google.maps.DirectionsStatus.OK) {
                directionsRenderer.setDirections(response);
                console.log(response.routes[0].waypoint_order);
                x = response.routes[0].waypoint_order.pop();
                var destinationLat = attractions.attractions[x+1].lat;
                var destinationLng= attractions.attractions[x+1].lng;
                console.log("x: " +x);
                var wayPoints2 = [];
                for(var i = 0 ; i < wayPoints.length; i++){
                    if(i != x){
                        wayPoints2.push(wayPoints[i]); 
                    }
                }
                var directionsRequest = {
                    origin: new google.maps.LatLng(parseFloat(attractions.attractions[0].lat),parseFloat(attractions.attractions[0].lng)),
                    destination: new google.maps.LatLng(parseFloat(destinationLat),parseFloat(destinationLng)),
                    travelMode: google.maps.TravelMode["DRIVING"],
                    waypoints: wayPoints2,
                    optimizeWaypoints: true
                }
            
            
                // Send request to the directions service.
                directionsService.route(directionsRequest, function (response, status) {
                    if (status == google.maps.DirectionsStatus.OK) {
                        directionsRenderer.setDirections(response);
                    } else {
                        console.log(google.maps.DirectionsStatus);
                        console.log(status);
                    }
                });
            }
            });
        }else{
            var directionsRequest = {
            origin: new google.maps.LatLng(parseFloat(attractions.attractions[0].lat),parseFloat(attractions.attractions[0].lng)),
            destination: new google.maps.LatLng(parseFloat(attractions.attractions[1].lat),parseFloat(attractions.attractions[1].lng)),
            travelMode: google.maps.TravelMode["DRIVING"],
            optimizeWaypoints: true
        }
        
        directionsService.route(directionsRequest, function (response, status) {
        if (status == google.maps.DirectionsStatus.OK) {
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
        zoom: 7
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

</script>






























<script type="text/javascript">    
var currentSection = 1;
var sections;

$('document').ready(function () {
	setCurrentSection();
	setSectionIndicator(1);
	$('.navigation').click(function () {
		if (this.id == "nav-left") { 
			if (currentSection != 1) {
				scrollToSection(currentSection - 1);
				$('#nav-left').prop('disabled', true);
			}
		}
		else  {
			if (currentSection+1 <= sections) {
				scrollToSection(currentSection + 1);
				$('#nav-right').prop('disabled', true);
			}
		}
	});

	$('.navigation').on('mouseover', function() {
		if (this.id == 'nav-left') {
			if (currentSection != 1) $(this).addClass('navigation-hover');
		} else {
			if (currentSection+1 <= sections) $(this).addClass('navigation-hover');
		}
	}).on('mouseout', function () {
		$(this).removeClass('navigation-hover');
	});

	$(window).resize(function() {
		setCurrentSection();
		setSectionIndicator(currentSection);
	});

});

function setCurrentSection() {
	var carouselWidth = $('.carousel').width();
	var projectWidth = $('.project').width() + parseInt($('.project').css('margin-right').replace('px',''));
	var projectsQtt = $('.project').size();
	var projectsPerSection = carouselWidth / projectWidth;
	sections = Math.round(projectsQtt / projectsPerSection);
	var rollLeft = Math.abs(parseInt($('.roll').css('left').replace('px','')));
	if (rollLeft == 0) currentSection = 1;
	else {
		currentSection = Math.round((rollLeft / carouselWidth) + 1);
	}
	$('#nav-left').prop('disabled', false);
	$('#nav-left').removeClass('navigation-hover');
	$('#nav-right').prop('disabled', false);
	$('#nav-right').removeClass('navigation-hover');
}

function scrollToSection(section) {
	var width = $('.carousel').width() * (Math.abs(currentSection - section));
	if (section < currentSection) {
		$('.roll').animate({left: '+='+width}, "slow", setCurrentSection);
	} else {
		$('.roll').animate({left: '-='+width}, "slow", setCurrentSection);
	}
	setSectionIndicator(section);
}

function setSectionIndicator(section) {
	$('.sections').html('');
	for (var i = 1; i <= sections; i++) {
		if (i == section) circleClass = 'fa fa-circle';
		else circleClass = 'fa fa-circle-thin';
		$('.sections').html($('.sections').html() + '<i class="'+circleClass+' indicator" data-id="'+i+'" aria-hidden="true"></i>');
	}
	$('.indicator').click(function() {
		scrollToSection($(this).attr('data-id'));
	});
}


</script>

</html>
@endsection