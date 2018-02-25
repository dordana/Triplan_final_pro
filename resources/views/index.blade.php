@extends('layouts.app')

@section('content')

<script src="{!! asset('pages/index/index.js') !!}"></script>
<link href="{!! asset('pages/index/index.css') !!}" rel="stylesheet" />
<style type="text/css">
	.selectcss{
		border: transparent;
		background: rgba(0, 0, 0, 0.05);
		cursor: pointer;
		color: #f78536;
		font-weight: bold;
		padding: 10px 10px;
		border-radius: 0px;
		
	}
	option:hover{
		
		background: red;
		cursor: pointer;
		
		
	}
	.selectcss > option{
		color: #7D7E7E;
		font-weight: bold;
		padding: 10px 10px;
		cursor: pointer;
		background-color: white;
	}
	.selectcss > option:focus {
    	background-color: #ddd;
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
	
	#tripsubmit:hover{
		background-color:#F78536 !important; 
	}
</style>
<p id="pageName" hidden >Home</p>
<div class="fh5co-hero">
			<div class="fh5co-overlay"></div>
			<div class="fh5co-cover" data-stellar-background-ratio="0.5"style=" top: 0; width: 100%; height: 100%; z-index: -1;">
				 <video class="bgvid" autoplay="autoplay" muted="muted" preload="auto" loop>
      <source src="https://coverr.co/s3/mp4/Fire-_-Ice.mp4" type="video/webm">
  </video>
				<div class="desc">
					<div class="container">
						<div class="row">
							<div class="col-sm-5 col-md-5">
								<div class="tabulation animate-box">
								   <!-- Tab panes -->
									<div class="tab-content">
									 <div role="tabpanel" class="tab-pane active" id="flights">
									 	<form id="formtrip" action="{{ url('/trip') }}" method="GET">
									 		<input id="countryname" type="hidden" name="country" value="">
									 		<input id="cityname" type="hidden" name="city" value="">
									 		<input id="num_of_passengers" type="hidden" name="num_of_passengers" value="">
											<div class="row">
												<div class="col-xxs-12 col-xs-6 mt">
													<div class="input-field">
														<label for="from">Country:</label>
														<select class="form-control selectcss" id="country-select" >
														  <option value="1">select country</option>
														  @foreach($countriesToTravel as $country)
														  	<option value="{{$country->id}}">{{$country->name}}</option>
														  @endforeach
														</select>
													</div>
												</div>
												<div class="col-xxs-12 col-xs-6 mt">
													<div class="input-field">
														<label for="from">City:</label>
														<select class="form-control selectcss" id="city-select">
														  <option value="">select city</option>
														</select>
													</div>
												</div>
												<div class="col-xxs-12 col-xs-6 mt alternate">
													<div class="input-field">
														<label for="date-start">Check In:</label>
														<input type="text" name="start" class="form-control" id="date-start" placeholder="mm/dd/yyyy"/>
													</div>
												</div>
												<div class="col-xxs-12 col-xs-6 mt alternate">
													<div class="input-field">
														<label for="date-end">Check Out:</label>
														<input type="text" class="form-control" name="end" id="date-end" placeholder="mm/dd/yyyy"/>
													</div>
												</div>
												<div class="col-xxs-12 col-xs-6 mt">
													<section>
														<label for="class">Passengers:</label>
														<select class="cs-select cs-skin-border" id="passenger-select">
															<option value="1" disabled selected>1</option>
															<option value="1">1</option>
															<option value="2">2</option>
															<option value="3">3</option>
															<option value="4">4</option>
														</select>
													</section>
												</div>
												<div class="col-xs-12">
													<input type="button" class="btn btn-primary btn-block" id="tripsubmit" value="Search Flight">
												</div>
											</div>
										</form>
									 </div>
									</div>

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="fh5co-tours" class="fh5co-section-gray">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">
						<h3>Hot Tours</h3>
						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4 col-sm-6 fh5co-tours animate-box" data-animate-effect="fadeIn">
						<div href="#"><img src="images/place-1.jpg" alt="Free HTML5 Website Template by FreeHTML5.co" class="img-responsive">
							<div class="desc">
								<span></span>
								<h3>New York</h3>
								<span>3 nights + Flight 5*Hotel</span>
								<span class="price">$1,000</span>
								<a class="btn btn-primary btn-outline" href="#">Book Now <i class="icon-arrow-right22"></i></a>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-6 fh5co-tours animate-box" data-animate-effect="fadeIn">
						<div href="#"><img src="images/place-2.jpg" alt="Free HTML5 Website Template by FreeHTML5.co" class="img-responsive">
							<div class="desc">
								<span></span>
								<h3>Philippines</h3>
								<span>4 nights + Flight 5*Hotel</span>
								<span class="price">$1,000</span>
								<a class="btn btn-primary btn-outline" href="#">Book Now <i class="icon-arrow-right22"></i></a>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-6 fh5co-tours animate-box" data-animate-effect="fadeIn">
						<div href="#"><img src="images/place-3.jpg" alt="Free HTML5 Website Template by FreeHTML5.co" class="img-responsive">
							<div class="desc">
								<span></span>
								<h3>Hongkong</h3>
								<span>2 nights + Flight 4*Hotel</span>
								<span class="price">$1,000</span>
								<a class="btn btn-primary btn-outline" href="#">Book Now <i class="icon-arrow-right22"></i></a>
							</div>
						</div>
					</div>
					<div class="col-md-12 text-center animate-box">
						<p><a class="btn btn-primary btn-outline btn-lg" href="#">See All Offers <i class="icon-arrow-right22"></i></a></p>
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
								<p>Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit.</p>
								<p><a href="#">Learn More</a></p>
							</div>
						</div>

					</div>

					<div class="col-md-4 animate-box">
						<div class="feature-left">
							<span class="icon">
								<i class="icon-search"></i>
							</span>
							<div class="feature-copy">
								<h3>Travel Plans</h3>
								<p>Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit.</p>
								<p><a href="#">Learn More</a></p>
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
								<p>Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit.</p>
								<p><a href="#">Learn More</a></p>
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
								<p>Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit.</p>
								<p><a href="#">Learn More</a></p>
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
								<p>Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit.</p>
								<p><a href="#">Learn More</a></p>
							</div>
						</div>

					</div>
					<div class="col-md-4 animate-box">
						<div class="feature-left">
							<span class="icon">
								<i class="icon-chat"></i>
							</span>
							<div class="feature-copy">
								<h3>Explorer</h3>
								<p>Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit.</p>
								<p><a href="#">Learn More</a></p>
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
							<li class="one-forth text-center" style="background-image: url(images/place-1.jpg); ">
								<a href="#">
									<div class="case-studies-summary">
										<h2>Los Angeles</h2>
									</div>
								</a>
							</li>
							<li class="one-forth text-center" style="background-image: url(images/place-2.jpg); ">
								<a href="#">
									<div class="case-studies-summary">
										<h2>Hongkong</h2>
									</div>
								</a>
							</li>
							<li class="one-forth text-center" style="background-image: url(images/place-3.jpg); ">
								<a href="#">
									<div class="case-studies-summary">
										<h2>Italy</h2>
									</div>
								</a>
							</li>
							<li class="one-forth text-center" style="background-image: url(images/place-4.jpg); ">
								<a href="#">
									<div class="case-studies-summary">
										<h2>Philippines</h2>
									</div>
								</a>
							</li>

							<li class="one-forth text-center" style="background-image: url(images/place-5.jpg); ">
								<a href="#">
									<div class="case-studies-summary">
										<h2>Japan</h2>
									</div>
								</a>
							</li>
							<li class="one-half text-center">
								<div class="title-bg">
									<div class="case-studies-summary">
										<h2>Most Popular Destinations</h2>
										<span><a href="#">View All Destinations</a></span>
									</div>
								</div>
							</li>
							<li class="one-forth text-center" style="background-image: url(images/place-6.jpg); ">
								<a href="#">
									<div class="case-studies-summary">
										<h2>Paris</h2>
									</div>
								</a>
							</li>
							<li class="one-forth text-center" style="background-image: url(images/place-7.jpg); ">
								<a href="#">
									<div class="case-studies-summary">
										<h2>Singapore</h2>
									</div>
								</a>
							</li>
							<li class="one-forth text-center" style="background-image: url(images/place-8.jpg); ">
								<a href="#">
									<div class="case-studies-summary">
										<h2>Madagascar</h2>
									</div>
								</a>
							</li>
							<li class="one-forth text-center" style="background-image: url(images/place-9.jpg); ">
								<a href="#">
									<div class="case-studies-summary">
										<h2>Egypt</h2>
									</div>
								</a>
							</li>
							<li class="one-forth text-center" style="background-image: url(images/place-10.jpg); ">
								<a href="#">
									<div class="case-studies-summary">
										<h2>Indonesia</h2>
									</div>
								</a>
							</li>
						</ul>		
					</div>
				</div>
			</div>
		</div>

		<div id="fh5co-blog-section" class="fh5co-section-gray">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">
						<h3>Recent From Blog</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit est facilis maiores, perspiciatis accusamus asperiores sint consequuntur debitis.</p>
					</div>
				</div>
			</div>
			<div class="container">
				<div class="row row-bottom-padded-md">
					<div class="col-lg-4 col-md-4 col-sm-6">
						<div class="fh5co-blog animate-box">
							<a href="#"><img class="img-responsive" src="images/place-1.jpg" alt=""></a>
							<div class="blog-text">
								<div class="prod-title">
									<h3><a href="#">30% Discount to Travel All Around the World</a></h3>
									<span class="posted_by">Sep. 15th</span>
									<span class="comment"><a href="">21<i class="icon-bubble2"></i></a></span>
									<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
									<p><a href="#">Learn More...</a></p>
								</div>
							</div> 
						</div>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-6">
						<div class="fh5co-blog animate-box">
							<a href="#"><img class="img-responsive" src="images/place-2.jpg" alt=""></a>
							<div class="blog-text">
								<div class="prod-title">
									<h3><a href="#">Planning for Vacation</a></h3>
									<span class="posted_by">Sep. 15th</span>
									<span class="comment"><a href="">21<i class="icon-bubble2"></i></a></span>
									<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
									<p><a href="#">Learn More...</a></p>
								</div>
							</div> 
						</div>
					</div>
					<div class="clearfix visible-sm-block"></div>
					<div class="col-lg-4 col-md-4 col-sm-6">
						<div class="fh5co-blog animate-box">
							<a href="#"><img class="img-responsive" src="images/place-3.jpg" alt=""></a>
							<div class="blog-text">
								<div class="prod-title">
									<h3><a href="#">Visit Tokyo Japan</a></h3>
									<span class="posted_by">Sep. 15th</span>
									<span class="comment"><a href="">21<i class="icon-bubble2"></i></a></span>
									<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
									<p><a href="#">Learn More...</a></p>
								</div>
							</div> 
						</div>
					</div>
					<div class="clearfix visible-md-block"></div>
				</div>

				<div class="col-md-12 text-center animate-box">
					<p><a class="btn btn-primary btn-outline btn-lg" href="#">See All Post <i class="icon-arrow-right22"></i></a></p>
				</div>

			</div>
		</div>
		<!-- fh5co-blog-section -->
		<div id="fh5co-testimonial" style="background-image:url(images/img_bg_1.jpg);">
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
					<h2>Happy Clients</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="box-testimony animate-box">
						<blockquote>
							<span class="quote"><span><i class="icon-quotes-right"></i></span></span>
							<p>&ldquo;Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.&rdquo;</p>
						</blockquote>
						<p class="author">John Doe, CEO <a href="http://freehtml5.co/" target="_blank">FREEHTML5.co</a> <span class="subtext">Creative Director</span></p>
					</div>
					
				</div>
				<div class="col-md-4">
					<div class="box-testimony animate-box">
						<blockquote>
							<span class="quote"><span><i class="icon-quotes-right"></i></span></span>
							<p>&ldquo;Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.&rdquo;</p>
						</blockquote>
						<p class="author">John Doe, CEO <a href="http://freehtml5.co/" target="_blank">FREEHTML5.co</a> <span class="subtext">Creative Director</span></p>
					</div>
					
					
				</div>
				<div class="col-md-4">
					<div class="box-testimony animate-box">
						<blockquote>
							<span class="quote"><span><i class="icon-quotes-right"></i></span></span>
							<p>&ldquo;Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.&rdquo;</p>
						</blockquote>
						<p class="author">John Doe, Founder <a href="#">FREEHTML5.co</a> <span class="subtext">Creative Director</span></p>
					</div>
					
				</div>
			</div>
		</div>
	</div>
	
	<script>
		var cities = JSON.parse('<?php echo json_encode($citiesToTravel) ?>');
		$('#country-select').change(function(){
			$("#city-select").find('option').remove();
			var country_id = ($( "#country-select option:selected" ).val());
			$.each(cities, function(key, value) {
				if(country_id == value.country_id){
		    		$('#city-select').append($('<option>', { value : key }).text(value.name));
				}
			});
		});
		
		
		
$('#tripsubmit').click(function() {
    var selected = $("#country-select").val();
    $("#countryname").val(selected);
    var selected1 = $("#city-select").val();
    $("#cityname").val(selected1);
    var selected2 = $("#passenger-select").val();
    $("#num_of_passengers").val(selected2);
    $("#formtrip").submit();
})
		
		
	</script>
@endsection