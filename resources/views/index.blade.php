@extends('layouts.app')

@section('content')

<script src="{!! asset('pages/index/index.js') !!}"></script>
<link href="{!! asset('pages/index/index.css') !!}" rel="stylesheet" />
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBYUrj824we7Ae73T3khwyy_epnUlgudSM&libraries=places"></script>
<script type="text/javascript" >
	document.title = 'Triplan - Home Page';
</script>

<style type="text/css">
.text-border{
	text-shadow: -1px 0 #fc3f00, 0 1px #fc3f00, 1px 0 #fc3f00, 0 -1px #fc3f00;	
}
	select, option{
		background: rgba(0, 0, 0, 0.05) !important;
    border: none !important;
    box-shadow: none !important;
    font-weight: bold !important;
    font-size: 14px !important;
    padding: 5px 10px !important;
    -webkit-border-radius: 0 !important;
    -moz-border-radius: 0 !important;
    -ms-border-radius: 0 !important;
    border-radius: 0 !important;
    color: #F78536 !important;
    cursor: pointer !important;
	}
	.contact-section {
		background: #F07E42 !important;
	}
	#date-start,#date-end{
		cursor: pointer;
	}
	.bgvid{
	  position:absolute;
	  left:0;
	  top:0;
	  width:100vw;
	  height: 100%;
	}
select option:checked,
select option:hover {
    box-shadow: 0 0 10px 100px #000 inset;
}
	.fh5co-hero{
		background: rgba(0, 0, 0, 0.04);
	}
	#tripsubmit:hover{
		background-color:#F78536 !important; 
	}
</style>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<p id="pageName" hidden >Home</p>

<div class="fh5co-hero">
	<div class="fh5co-overlay"></div>
		<div class="fh5co-cover" data-stellar-background-ratio="0.5" style="background-position: 0px 159px;">
			<video  autoplay muted preload="auto" loop>-->
			  <source src="{{ url('/pages/index/main.mp4') }}" type="video/webm">
			</video>
		<div class="desc">
			<div class="container">
				<div class="row">
					<div class="col-sm-5 col-md-5">
						<div class="tabulation animate-box fadeInUp animated">
						   <!-- Tab panes -->
							<div class="tab-content">
							 <div role="tabpanel" class="tab-pane active" id="flights">
							 	<form id="formtrip" action="{{ url('/trip') }}" method="GET">
							 		<input id="countryname" type="hidden" name="country" value="">
							 		<input id="cityname" type="hidden" name="city" value="">
							 		<input id="typeTrip" type="hidden" name="type" value="">
							 		<input id="numPassengers" type="hidden" name="passengers" value="">
							 		<input id="budgetInput" type="hidden" name="budget" value="">
							 		<input id="startLocationLt" type="hidden" name="startLocation" value="">
							 		<input id="startLocationInput" type="hidden" name="startLocationString" value="">
							 		<input id="pathNameInput" type="hidden" name="pathName" value="">
									<div class="row">
										<div class="col-xxs-12 col-xs-6 mt">
											<div class="input-field">
												<label for="from">Country:</label>
												<select class="form-control custom-select sources" id="country-select" required >
												  <option value="">Select country</option>
												  @foreach($countriesToTravel as $country)
												  	<option value="{{$country->id}}">{{$country->name}}</option>
												  @endforeach
												</select>
											</div>
										</div>
										<div class="col-xxs-12 col-xs-6 mt">
											<div class="input-field">
												<label for="from">City:</label>
												<select class="form-control custom-select sources" id="city-select" required>
												  <option value="">Select city</option>
												</select>
											</div>
										</div>
									
										<!--<p id="dateserror" style="text-align: center; color:red; display:none;"><b id="errorMsg">Check out must be greater then check in</b></p>-->
										<div class="col-xxs-12 col-xs-6 mt">
											<div class="input-field">
												<label for="date-start">Check In:</label>
												<input type="text" name="start" class="form-control" autoComplete="off" id="date-start" placeholder="dd/mm/yyyy" required/>
											</div>
										</div>
										<div class="col-xxs-12 col-xs-6 mt">
											<div class="input-field">
												<label for="date-end">Check Out:</label>
												<input type="text" class="form-control" name="end" id="date-end" autoComplete="off" placeholder="dd/mm/yyyy" required/>
											</div>
										</div>
										<div class="col-xxs-12 col-xs-12 mt">
											<div class="input-field">
												<label for="from">Type:</label>
												<select class="form-control custom-select sources" id="type-select" required >
												  <option value="">Select type</option>
												  	<option value="normal">Normal</option>
												  	<option value="budget">Budget</option>
												</select>
											</div>
										</div>
										<div class="col-xxs-12 col-xs-6 mt PassengersSelect" hidden>
											<div class="input-field">
												<label for="from">Passengers:</label>
												<select class="form-control custom-select sources" id="passengers-select" required >
												  <option value="">#</option>
												  	<option value="1">1</option>
												  	<option value="2">2</option>
												  	<option value="3">3</option>
												  	<option value="4">4</option>
												  	<option value="5">5</option>
												  	<option value="6">6</option>
												  	<option value="7">7</option>
												  	<option value="8">8</option>
												  	<option value="9">9</option>
												  	<option value="10">10</option>
												</select>
											</div>
										</div>
										<div class="col-xxs-12 col-xs-6 mt BudgetsSelect" hidden>
											<div class="input-field">
												<label for="from">Budget:</label>
												<input type="text" class="form-control" id="budgetTxt" placeholder="Enter your budget (USD)">
											</div>
										</div>
										<div class="col-xxs-12 col-xs-6 mt BudgetsSelect" hidden>
											<div class="input-field">
												<label for="from">Start location:</label>
												<input type="text" class="form-control" id="startLocation" placeholder="Enter your starting location">
											</div>
										</div>
										<div class="col-xxs-12 col-xs-6 mt BudgetsSelect" hidden>
											<div class="input-field">
												<label for="from">Path name:</label>
												<input type="text" class="form-control" id="pathName" placeholder="Give your path a name">
											</div>
										</div>
										<div class="col-xs-12">
											@if (Auth::guest())
       											<input type="button" class="btn btn-primary btn-block" onClick="nonRegisteredUserAlert();" value="Trip Builder">
						                    @else
						                    	@if (Auth::user()->active == "0")
       												<input type="button" class="btn btn-primary btn-block" id="tripsubmit" onClick="inactiveAlert();" value="Trip Builder">
       											@else
       												<input type="button" class="btn btn-primary btn-block" id="tripsubmit" onClick="formSub();" value="Trip Builder">
       											@endif
						                    @endif
										</div>
									</div>
								</form>
							 </div>
							</div>
						</div>
					</div>
					<div class="desc2 animate-box fadeInUp animated" style="top:-150px;position: relative;">
						<div class="col-sm-7 col-sm-push-1 col-md-7 col-md-push-1">
							<h1 class="text-border" style="color:white; font-size:75px;"><b>Welcome to Triplan</b></h1>
							<h2 class="text-border" style="color:white;">Make your dream come true</h2>
							<h3 class="text-border" style="color:white;">500 Attractions, 100 Paths and 1 Great site</h3>
							<!-- <p><a class="btn btn-primary btn-lg" href="#">Get Started</a></p> -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<br><br><br><br><br><br><br><br>
		<div id="fh5co-tours" class="fh5co-section-gray">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">
						<h3>Most Popular Countries</h3>
						<p>Explore the most popular and viewed countries</p>
					</div>
				</div>
				<div class="row">
					 @foreach($mainCountries as $country)
					<div class="col-md-4 col-sm-6 fh5co-tours animate-box" data-animate-effect="fadeIn">
						<div href="#"><img src="{{ url('/uploads/countries') }}/{{$country->name}}/{{$country->mainpic}}" class="img-responsive">
							<div class="desc">
								<span></span>
								<h3>{{$country->name}}</h3>
								<span>{{$country->continent}}</span>
								<a class="btn btn-primary btn-outline" href="{{route('show-countrydetalis', $country->name)}}">More detalis<i class="icon-arrow-right22"></i></a>
							</div>
						</div>
					</div>
					@endforeach
					<div class="col-md-12 text-center animate-box">
						<p><a class="btn btn-primary btn-outline btn-lg" href="{{route('showcountries')}}">See All Countries <i class="icon-arrow-right22"></i></a></p>
					</div>
				</div>
			</div>
		</div>

		<div id="fh5co-features">
			<div class="container">
				<div class="row">
					
					<div class="col-md-4 animate-box">

						<div class="feature-left">
							<span class="icon">
								<i class="icon-hotairballoon"></i>
							</span>
							<div class="feature-copy">
								<h3>Family Travel</h3>
								<p>Find the best vacation for you and your family</p>
							</div>
						</div>

					</div>

					<div class="col-md-4 animate-box">
						<div class="feature-left">
							<span class="icon">
								<i class="icon-search"></i>
							</span>
							<div class="feature-copy">
								<h3>Trip Builder</h3>
								<p>Using our unique system, plan your trip in the most optimal way</p>
							</div>
						</div>
					</div>
					<div class="col-md-4 animate-box">
						<div class="feature-left">
							<span class="icon">
								<i class="icon-wallet"></i>
							</span>
							<div class="feature-copy">
								<h3>Honeymoon</h3>
								<p>Take full advantage of the time with the one you love</p>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4 animate-box">

						<div class="feature-left">
							<span class="icon">
								<i class="icon-wine"></i>
							</span>
							<div class="feature-copy">
								<h3>Business Travel</h3>
								<p>Take a break from business and enjoy the attractions around you</p>
							</div>
						</div>

					</div>

					<div class="col-md-4 animate-box">
						<div class="feature-left">
							<span class="icon">
								<i class="icon-genius"></i>
							</span>
							<div class="feature-copy">
								<h3>Solo Travel</h3>
								<p>Like to travel alone? Find out how to get the most out of your trip</p>
							</div>
						</div>

					</div>
					<div class="col-md-4 animate-box">
						<div class="feature-left">
							<span class="icon">
								<i class="icon-chat"></i>
							</span>
							<div class="feature-copy">
								<h3>Social Network</h3>
								<p>Share, Recommend, and Connect to other users through multiple platforms we've created for you</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		
		<div id="fh5co-destination">
			<div class="tour-fluid">
				<div class="row">
					<div class="col-md-12">
						<ul id="fh5co-destination-list" class="animate-box">
							@for ($i = 0; $i < 5; $i++)
							<li class="one-forth text-center" style="background-image: url({{ url('/uploads/cities') }}/{{str_replace(' ', '', $cities[$i]->name)}}/{{$cities[$i]->mainpic}});">
								<a href="{{route('show-citydetalis', $cities[$i]->name)}}">
									<div class="case-studies-summary">
										<h2>{{$cities[$i]->name}}</h2>
									</div>
								</a>
							</li>
							@endfor
							<li class="one-half text-center">
								<div class="title-bg">
									<div class="case-studies-summary">
										<h2>Most Popular Cities</h2>
										<span><a href="{{route('showcities')}}">View All Cities</a></span>
									</div>
								</div>
							</li>
							@for ($i = 5; $i < count($cities); $i++)
							<li class="one-forth text-center" style="background-image: url({{ url('/uploads/cities') }}/{{str_replace(' ', '', $cities[$i]->name)}}/{{$cities[$i]->mainpic}});">
								<a href="{{route('show-citydetalis', $cities[$i]->name)}}">
									<div class="case-studies-summary">
										<h2>{{$cities[$i]->name}}</h2>
									</div>
								</a>
							</li>
							@endfor
						</ul>		
					</div>
				</div>
			</div>
		</div>

		<div id="fh5co-blog-section" class="fh5co-section-gray">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">
						<h3>Recent From Reviews</h3>
						<p>Read reviews and recommendations from users to find out more about the destination you are looking for.</p>
					</div>
				</div>
			</div>
			<div class="container">
				<div class="row row-bottom-padded-md">
					@foreach($reviews as $review)
					<div class="col-lg-4 col-md-4 col-sm-6">
						<div class="fh5co-blog animate-box">
							<a href="{{route('show-review', $review->id)}}"><img class="img-responsive" src="{{ url('/uploads/reviews')}}/{{$review->mainpic}}" alt=""></a>
							<div class="blog-text">
								<div class="prod-title">
									<h2><a href="{{route('show-review', $review->id)}}">{{$review->title}}</a></h2>
									<span class="posted_by">{{$review->created_at}}</span>
									<span class="comment">{{App\User::find($review->user_id)->username}}</span>
									<p>{{substr($review->body, 0,40)}}...</p>
									<p><a href="{{route('show-review', $review->id)}}">Learn More...</a></p>
								</div>
							</div> 
						</div>
					</div>
					<div class="clearfix visible-md-block"></div>
					@endforeach
				</div>

				<div class="col-md-12 text-center animate-box">
					<p><a class="btn btn-primary btn-outline btn-lg" href="{{route('showreviews')}}">See All Reviews <i class="icon-arrow-right22"></i></a></p>
				</div>

			</div>
		</div>
		<!-- fh5co-blog-section -->
		<div id="fh5co-testimonial" style="background-image:url(images/img_bg_1.jpg);">
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
					<h2>Happy Users</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="box-testimony animate-box">
						<blockquote>
							<span class="quote"><span><i class="icon-quotes-right"></i></span></span>
							<p>&ldquo;The best website for trip planning, convenient interface, efficient and user friendly.
<br>I really enjoyed the holiday planning and will be back in the future!&rdquo;</p>
						</blockquote>
						<p class="author">Alex Shmukler</a> <span class="subtext">Happy user</span></p>
					</div>
					
				</div>
				<div class="col-md-4">
					<div class="box-testimony animate-box">
						<blockquote>
							<span class="quote"><span><i class="icon-quotes-right"></i></span></span>
							<p>&ldquo;Thank you Triplan for my dream vacation with my wife.
<br>Thanks to your interface, I've got many users recommendations and reviews&rdquo;</p>
						</blockquote>
						<p class="author">Danny Ofer</a> <span class="subtext">Happy user</span></p>
					</div>
					
				</div>
				<div class="col-md-4">
					<div class="box-testimony animate-box">
						<blockquote>
							<span class="quote"><span><i class="icon-quotes-right"></i></span></span>
							<p>&ldquo;I thought that I would not be able to enjoy my two days trip.<br> but thanks to your platform 
							I managed to build a path for myself that made the most of these days. Thanks!&rdquo;</p>
						</blockquote>
						<p class="author">Tammie Green</a> <span class="subtext">Happy user</span></p>
					</div>
					
				</div>
			</div>
		</div>
	</div>
	
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

		<div id="fh5co-contact" class="fh5co-section-gray">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">
						<h3>Our Address</h3>
					</div>
				</div>
				<form method="POST" action="" autocomplete="off">
		                {{ csrf_field() }}
					<div class="row animate-box">
						<div class="col-md-12">
							<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3410.94470319847!2d34.791500584625325!3d31.249954067570997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1502666cc7f87775%3A0xaf5e654731053ad8!2z15TXnteb15zXnNeUINeU15DXp9eT157XmdeqINec15TXoNeT16HXlCDXoiLXqSDXodee15kg16nXntei15XXnw!5e0!3m2!1siw!2sfr!4v1523278282217" width="100%" height="600" frameborder="0" style="border:0" allowfullscreen></iframe>
						</div>
					</div>
						<div class="row">
							<br><br><br>
							<div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">
								<h3>Contact Us</h3>
							</div>
						</div>
					<div class="row animate-box">
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<input name="name" type="text" class="form-control" placeholder="Name">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<input name="email" type="text" class="form-control" placeholder="Email">
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<textarea  name="msg" name="" class="form-control" id="" cols="30" rows="7" placeholder="Message"></textarea>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group text-center">
										<input type="button" style="width:350px;" value="Send Message" class="btn btn-primary send">
									</div>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	
	
	
	
	
	<script type="text/javascript">
		$( "#type-select" ).change(function() {
		  var type = $(this).val();
		  if(type == "budget"){
		  	$(".PassengersSelect").show();
		  	$(".BudgetsSelect").show();
		  }else{
		  	$(".PassengersSelect").hide();
		  	$(".BudgetsSelect").hide();
		  }
		});
	</script>
	
	
	
	<script>
		var cities = {!! json_encode($citiesToTravel->toArray()) !!};
		console.log(cities);
		$('#country-select').change(function(){
			$("#city-select").find('option').remove();
			$('#city-select').append($('<option>', { value : '' }).text('Select city'));
			var country_id = ($( "#country-select option:selected" ).val());
			$.each(cities, function(key, value) {
				if(country_id == value.country_id){
		    		$('#city-select').append($('<option>', { value : value.id }).text(value.name));
				}
			});
		});
		
function nonRegisteredUserAlert(){
	swal("Hey, You must log in to use this option", {
	  buttons: {
	    cancel: "Close",
	    Login: 'Login',
	    Register: 'Register',
	  },
	})
	.then((value) => {
	  switch (value) {
	 
	    case "Login":
	      window.location = "/login";
	      break;
	 
	    case "Register":
			window.location = "/register";
			break;
	 
	    default:
	      
	  }
	});
}		
		function inactiveAlert(){
			swal("Thank you for choosing Triplan."+"\nPlease waiting for Admin Approval", {
					  buttons: false,
					  timer: 5000,
					});
		}
		
		function formSub(){
			if ($("#country-select").val() == "" || $("#city-select").val() == "" || $('#date-start').val() == "" || $('#date-end').val() == ""){
				  swal("Please fill in all the fields", {
					  buttons: false,
					  timer: 3000,
					});
			}else{
				    if($("#type-select").val() == "budget"){
				    	geocoder = new google.maps.Geocoder();
			            geocoder.geocode( { 'address' : $("#startLocation").val() }, function( results, status ) {
			                if( status == google.maps.GeocoderStatus.OK ) {
			                	var selected = $("#country-select").val();
							    $("#countryname").val(selected);
							    var selected1 = $("#city-select").val();
							    $("#cityname").val(selected1);
			                    $("#startLocationLt").val(results[0].geometry.location);
			                    $("#typeTrip").val($("#type-select").val());
						    	$("#numPassengers").val($("#passengers-select").val());
						    	$("#budgetInput").val($("#budgetTxt").val());
						    	$("#startLocationInput").val($("#startLocation").val());
						    	$("#pathNameInput").val($("#pathName").val());
						    	var start = $('#date-start').val();
							    var end = $('#date-end').val();
							    if (start > end) {
							    	swal("Check out must be greater then check in", {
									  buttons: false,
									  timer: 3000,
									});
							    }else{
							    	$("#formtrip").submit();
						                }
				            }
						});
				}else{
				    var selected = $("#country-select").val();
				    $("#countryname").val(selected);
				    var selected1 = $("#city-select").val();
				    $("#cityname").val(selected1);
				    var start = $('#date-start').datepicker( "getDate" );
				    var end = $('#date-end').datepicker( "getDate" );
				    alert(start)
				    alert(end)
				    
				    if (start > end) {
				    	swal("Check out must be greater then check in", {
						  buttons: false,
						  timer: 3000,
						});
				    }else{
				    	$("#formtrip").submit();
				    }
				}
			}
		}
	$('#date-start, #date-end').datepicker({ dateFormat: "DD/MM/y",autoclose: true });
		autoComplete = new google.maps.places.Autocomplete(document.getElementById("startLocation")); 
	</script>
@endsection