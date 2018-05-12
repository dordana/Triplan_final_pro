 @extends('layouts.app')

@section('content')
<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
<style type="text/css">
	
* {
	margin:0px;
	padding:0px;
}
*, *:after, *:before { -webkit-box-sizing: border-box; -moz-box-sizing: border-box; -ms-box-sizing:border-box; -o-box-sizing:border-box; box-sizing: border-box; }

.clearfix:before, .clearfix:after { display: table; content: ''; }
.clearfix:after { clear: both; }


input:focus, textarea:focus, keygen:focus, select:focus {
	outline: none;
}
::-moz-placeholder {
	color: #666;
	font-weight: 300;
	opacity: 1;
}

::-webkit-input-placeholder {
	color: #666;
	font-weight: 300;
}

.grid .col2 {
	width: 50%;
	padding: 0 10px 0 0;
}
.grid .col2.first {
	float: left;
}
.grid .col2.last {
	float: right;
}

.grid .col3 {
	width: 32%;
	float: left;
	margin-right: 11px;
}
.grid .col3.first {
	margin-left: 0;
	float: left;
}
.grid .col3.last {
	margin-right: 0;
	float: right;
}

/* profile page */
/*.container {*/
/*    padding: 60px 50px 70px;*/
/*}*/

.innerwrap {
    width: 1200px;
    margin: 0 auto;
}

.section1 {
	background: #fff;
	position: relative;
	border-radius: 2px;
}
.section1 div .row:first-child {
	padding: 25px;
}


.section1 .col2.first img {
	border-radius: 50%;
	margin: 0 20px;
	width: 120px;
	border:2px solid #f1f1f1;
	padding: 2px;
	float: left;
}
.section1 .col2.first {
	line-height: 25px;
	position: relative;
	border-right:1px solid #a2a2a2;
}
.section1 .col2.first h1 {
    font-weight: normal;
    margin-bottom: 10px;
	margin-top: 15px;
	text-transform: capitalize;
}
.section1 .col2.first p {
	font-size: 14px;
}
.section1 .col2.first span {
	position: absolute;
    right: 15px;
    top: 16px;
    background: #32363E;
    padding: 5px 11px;
    font-size: 12px;
    line-height: 1;
    border-radius: 2px;
    color: #fff;
  cursor:pointer;
}

.section1 .col2.last {
	padding: 8px 0;
}
.section1 .col2.last .col3 span {
    color: #a2a2a2;
    font-size: 14px;
}
.section1 .col2.last .col3 h1 {
    color: #f68546;
}

.section1 .col2.last .col3 {
    text-align: center;
    line-height: 30px;
    border-right: 1px solid #ccc;
}
.section1 .col2.last .col3.last {
	border-right: 0;
}

.row2tab li {
    list-style: none;
    float: left;
    width: 33%;
    padding: 15px;
    font-size: 14px;
    text-align: center;
    cursor:pointer;
    background: #f1f1f1;
    color: #555;
    border-bottom: 2px solid #f1f1f1;
}
.row2tab li {
    border-radius: 0 0 2px 2px;
}
.active-tab{
	    border-bottom: 2px solid #f68546 !important;
	    color: #f68546 !important;
}

.row2tab li i {
        margin-right: 3px;
    font-size: 14px;
}

.smalltri {
	    border-right: 40px solid #f68546;
    height: 0;
    width: 0;
    border-left: 20px solid transparent;
    border-top: 10px solid #f68546;
    border-bottom: 20px solid transparent;
    padding: 0px;
    top: 0;
    right: 0;
    position: absolute;
}
.smalltri i {
    position: absolute;
    top: -5px;
    right: -33px;
    color: #fff;
    border: 0px;
    font-size: 12px;
}

section.section2 {
    margin: 50px 0;
}

.section2 .col3 {
	width: 30%;
	margin-right: 60px;
	background: #fff;
	border-radius: 2px;
}

.section2 .postcont img {

	width: 100%;
}
.section2 .profileinfo {
    text-align: center;
    padding: 0 10px 30px;
    color: #555;
    font-size: 14px;
    line-height: 25px;
}
.section2 .profileinfo img {
    border-radius: 50%;
    width: 80px;
    padding: 2px;
    border: 3px solid #f68546;
    margin-top: -48px;
    margin-bottom: 18px;
}
.section2 .col3.center .profileinfo img {
    border: 3px solid #f68546 !important;

}
.section2 .profileinfo p {
	text-align: justify;
}
.section2 .profileinfo span {
	margin-top: 15px;
    display: block;
    text-align: left;
    color: #f68546;
    cursor: pointer;
}
.section2 .profileinfo span i {
	margin-left: 10px;
}

@media only screen and (max-width: 1300px) {
	.innerwrap {
		width: 90%;
	}
	.section2 .col3 {
		margin-right: 5%;
	}
	.section1 .grid .col3 {
		margin-right: 2%;
	}
	.section1 .col2.last .col3.last {
		margin-right: 0;
	}
}

@media only screen and (max-width: 1060px) {
	.section1 .col2 {
		width: 100%;
		border-right:0 !important;
		padding: 0;
	}
}

@media only screen and (max-width: 660px) {
	.section2 .col3 {
		width: 100%;
		float: none !important;
		margin-bottom: 10px;
	}
	.row2tab li {
		width: 50%;
		text-align: left;
	}
	.section1 .col2.first {
		text-align: center;
	}
	.section1 .col2.first img {
		display: inline-block;
		float: none;
	}
	.section1 .col2.first span {
		position: relative;
		right: 0;
	}
  .section1 .col2.last {
    margin-top:25px;
  }
}
@media only screen and (max-width: 450px) {
	.container {
    padding: 60px 5px 70px;
}
  .row2tab li {
		width: 100%;
		text-align: left;
	}
	.section1 .col2.last .col3 span {
		font-size: 10px;
	}
	.section1 .col2.last .col3 h1 {
		font-size: 18px;
	}
	
}

.fullcont{
	margin-top:30px;
	margin-bottom:30px;
}

/**/
/**/
/**/

.gallery-title
{
    font-size: 36px;
    color: #42B32F;
    text-align: center;
    font-weight: 500;
    margin-bottom: 70px;
}
.gallery-title:after {
    content: "";
    position: absolute;
    width: 7.5%;
    left: 46.5%;
    height: 45px;
    border-bottom: 1px solid #5e5e5e;
}
.filter-button
{
    font-size: 18px;
    border: 1px solid #42B32F;
    border-radius: 5px;
    text-align: center;
    color: #42B32F;
    margin-bottom: 30px;

}
.filter-button:hover
{
    font-size: 18px;
    border: 1px solid #42B32F;
    border-radius: 5px;
    text-align: center;
    color: #ffffff;
    background-color: #42B32F;

}
.btn-default:active .filter-button:active
{
    background-color: #42B32F;
    color: white;
}

.port-image
{
    width: 100%;
}

.gallery_product
{
    margin-bottom: 30px;
}
/**/
/**/
/**/


html {
  font-size: 100%;
  line-height: 1.5em;
  font-family: "Karla", "Helvetica Neue", Helvetica, Arial, sans-serif;
  color: #1D1311;
}
@media print {
  html {
    font-size: 12pt;
  }
}

h1 {
  font-size: 36px;
  font-size: 2.25rem;
}

h2 {
  font-size: 24px;
  font-size: 1.5rem;
}

h3 {
  font-size: 24px;
  font-size: 1.5rem;
}

h1 + p, h2 + p, h3 + p {
  margin-top: 0;
}

a {
  text-decoration: none;
  color: #FF7867;
}
a:hover, a:focus {
  text-decoration: underline;
}
.Review {
  padding: 24px;
  padding: 1.5rem;
}
@media screen and (min-width: 650px) {
  .Review {
    padding: 48px;
    padding: 3rem;
  }
}
.Review-details {
  display: flex;
  align-items: center;
}
.Review-details p {
  margin: 0;
}
.Review-details img {
  width: 54px;
  height: 54px;
  margin-right: 24px;
  margin-right: 1.5rem;
  border-radius: 50%;
}
.Review-author {
  font-weight: bold;
}
.Review-date {
  color: #b6c2cc;
}
.Review-star {
  color: #B6C2CC;
}
.Review-star--active {
  color: #FF7867;
}
.Review-body .Review-title + p {
  margin-top: 0;
}
.Review-body img {
  margin: 12px 0px;
  margin: 0.75rem 0rem;
}

/**/
/**/
/**/
@import url(https://fonts.googleapis.com/css?family=Open+Sans:400,600,700);
@import url(https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css);
.snip1493 {
  font-family: 'Open Sans', Arial, sans-serif;
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

.snip1493 * {
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
}

.snip1493:after {
  position: absolute;
  top: 12px;
  left: 0;
  width: 0;
  height: 0;
  border-style: solid;
  border-width: 25px 0 25px 25px;
  border-color: transparent transparent transparent #d2652d;
  content: '';
  -webkit-transform: translateX(-100%);
  transform: translateX(-100%);
  -webkit-transition: all 0.3s ease;
  transition: all 0.3s ease;
}

.snip1493 img {
  max-width: 100%;
  height: 230px;
  vertical-align: top;
  position: relative;
}

.snip1493 figcaption {
  padding: 20px 20px 30px;
  background-color: #ffffff;
}

.snip1493 .date {
  background-color: #d2652d;
  top: 15px;
  color: #fff;
  right: 15px;
  min-height: 48px;
  min-width: 48px;
  position: absolute;
  text-align: center;
  font-size: 18px;
  font-weight: 700;
  text-transform: uppercase;
  border-radius: 50%;
  padding: 10px 0;
}

.snip1493 .date span {
  display: block;
  line-height: 14px;
}

.snip1493 .date .month {
  font-size: 11px;
}

.snip1493 h3,
.snip1493 p {
  margin: 0;
  padding: 0;
}

.snip1493 h3 {
  margin-bottom: 10px;
  display: inline-block;
  font-weight: 700;
}

.snip1493 p {
  font-size: 0.8em;
  margin-bottom: 20px;
  line-height: 1.6em;
}

.snip1493 footer {
  padding: 0 25px;
  color: #999999;
  font-size: 0.8em;
  line-height: 50px;
  text-align: left;
  position: absolute;
  bottom: 0;
  left: 0;
  width: 100%;
}

.snip1493 footer > div {
  display: inline-block;
  margin-right: 15px;
}

.snip1493 footer i {
  margin-right: 5px;
  font-size: 1.2em;
}

.snip1493 a {
  left: 0;
  right: 0;
  top: 0;
  bottom: 0;
  position: absolute;
  z-index: 1;
}

.snip1493:hover:after,
.snip1493.hover:after {
  -webkit-transform: translateX(0%);
  transform: translateX(0%);
}


/**/
/**/
/**/
</style>

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
<p id="pageName" hidden >Home</p>

<div class="container fullcont">
	<div class="innerwrap">
		<section class="section1 clearfix">
			<div>
				<div class="row grid clearfix">
					<div class="col2 first">
						<img src="{{url('/uploads/user-photos')}}/{{$user->profile_phote_path}}" alt="">
						<h1>{{ $user->firstname }} {{ $user->lastname}}</h1>
						<p>{{$user->age}} years old {{$user->gender}} from {{$user->city}},{{$user->country}}</p>
						@if (Auth::check())
							@if (Auth::user()->id != $user->id)
								@if(in_array($user->id,$userFriends))
									<span style="background:orange"><i class='fas fa-user-friends'></i> Friends</span>
								@else
									<span class="friends"><i class="fas fa-user-plus"></i>  Add as friend</span>
								@endif
							@endif
						@endif
						
					</div>
					<div class="col2 last">
						<div class="grid clearfix">
							<div class="col3 first">
								<h1>{{ count($user->friends) }}</h1>
								<span>Friends</span>
							</div>
							<div class="col3"><h1>{{ count($user->reviews) }}</h1>
							<span>Reviews</span></div>
							<div class="col3 last"><h1>{{ count($user->paths)}}</h1>
							<span>Paths</span></div>
						</div>
					</div>
				</div>
				<div class="row clearfix">
					<ul class="row2tab clearfix">
						<li class="alltab tab_1 active-tab"><i class="fa fa-image"></i> Photos </li>
						<li class="alltab tab_2"><i class="fa fa-newspaper"></i> Reviews </li>
						<li class="alltab tab_3"><i class="fas fa-suitcase"></i> Paths </li>
					</ul>
				</div>
			</div>
			<span class="smalltri">
			</span>
		</section>
		
		
		
		<section class="section2 clearfix tab1">
			<div class="container">
        <div class="row">
					@foreach($user->reviewPhotos as $photo)
						@if($photo->path != null)
		          <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter hdpe">
		                <img src="{{url('/uploads/reviews')}}/{{$photo->path}}" class="img-responsive">
		          </div>
	          @endif
          @endforeach
          @foreach($user->answers as $a)
	          @if($a->img_path != null)
		          <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter hdpe">
		                <img src="{{url('/uploads/answers')}}/{{$a->img_path}}" class="img-responsive">
		          </div>
	          @endif
          @endforeach
            
        </div>
    </div>
		</section>
		
		<section hidden class="section2 clearfix tab2">
			<div class="container">
				
				
				@foreach($user->reviews as $review)
        <div class="row" style="border: solid 2px #efefef">
        	<div class="Review">
					  <div class="Review-details">
					    <img src="{{url('/uploads/user-photos')}}/{{$user->profile_phote_path}}">
					    <div class="Review-meta">
					      <p class="Review-author">{{ $user->firstname }} {{ $user->lastname}}</p>
					      <p class="Review-date">{{ Carbon\Carbon::parse($review->created_at)->format('d-m-Y') }}</p>
					      <div class="Review-rating">
					      	@for($i=0; $i < intval($review->rate); $i++)
					        	<span class="Review-star Review-star--active">&#9733;</span>
					        @endfor
					        @for($i; $i < 5; $i++)
					        	<span class="Review-star">&#9733;</span>
					        @endfor
					        
					      </div>
					    </div>
					  </div>
					  <div class="Review-body">
					    <h3 class="Review-title"><a href="{{route('show-review', $review->id)}}">{{ $review->title}}</a></h3>
					    <p>{{ $review->body}}</p>
					  </div>
					</div>
        	<hr>
        </div>
        @endforeach
        
        
	    </div>	
	    
		</section>
		
		
		
		
		
		
		
		
		
		<section hidden class="section2 clearfix tab3">
			<div class="container">
				@foreach($user->paths as $path)
					<figure class="snip1493">
					  <div class="image"><img src="{{ url('/uploads/cities') }}/{{str_replace(' ', '', App\City::find($path->city_id)->name)}}/{{App\City::find($path->city_id)->mainpic}}" alt="ls-sample1" /></div>
					  <figcaption>
					    <div class="date"><span class="day">{{ Carbon\Carbon::parse($path->start_date)->format('d') }}</span><span class="month">{{ date("F", mktime(0, 0, 0, Carbon\Carbon::parse($path->start_date)->format('m'), 1)) }}</span></div>
					    <h3 style="text-align: center;display: block;">{{ $path->pathName }}</h3>
					    <p style="text-align:center">
									Dates: {{ $path->startDate }} - {{ $path->endDate }} <br>
									Country: {{ $path->countryName }} <br>
									City: {{ App\City::find($path->city_id)->name }}<br>
									Type: {{ $path->type }}
					    </p>
					  </figcaption>
					  <a href="{{route('tripbuilder', $path->toArray())}}"></a>
					</figure>
				@endforeach
	    </div>	
		</section>
		
		
		
		
		
		
		<section hidden class="section2 clearfix tab4">
			<div class="grid">
				
				
				<div class="col3 first">
					<div class="postcont"><img src="{{url('/uploads/user-photos')}}/{{$user->profile_phote_path}}" alt="">
					</div>
					<div class="postcont"><img src="{{url('/uploads/user-photos')}}/{{$user->profile_phote_path}}" alt="">
					</div>
					<div class="profileinfo">
						<img src="{{url('/uploads/user-photos')}}/{{$user->profile_phote_path}}" alt="">
					</div>
				</div>
				
				
				<div class="col3 center">
					<div class="postcont"><img src="{{url('/uploads/user-photos')}}/{{$user->profile_phote_path}}" alt="">
					</div>
					<div class="profileinfo">
						<img src="{{url('/uploads/user-photos')}}/{{$user->profile_phote_path}}" alt="">
						<p>Lorem Idsfdsfdsffdfsdpsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy tex</p>
						<span>Read more <i class="fa fa-angle-right"></i></span>
					</div>
				</div>
				
				
				<div class="col3 last">
					<div class="postcont"><img src="{{url('/uploads/user-photos')}}/{{$user->profile_phote_path}}" alt="">
					</div>
					<div class="profileinfo">
						<img src="{{url('/uploads/user-photos')}}/{{$user->profile_phote_path}}" alt="">
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy tex</p>
						<span>Read more <i class="fa fa-angle-right"></i></span>
					</div>
				</div>
				
				
			</div>
		</section>
		
	</div>
</div>	



<script type="text/javascript">
	$(document).ready(function() {
		$(".friends").click(function() {
				var userId = "{{$user->id}}";
				var url = "{{route('addfriend')}}";
				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});
			
				$.ajax({
			    	type: 'ajax',
			    	method: 'post',
			    	url: url,
			    	data: {id:userId},
			    	async: false,
			    	dataType: 'json',
			    	success: function(data){
			    	   $(".friends").html("<i class='fas fa-user-friends'></i> Friends")
			    	   $(".friends").css("background","orange");
			    	   $( ".friends" ).unbind( "click" );
			    	},
			    	error: function(data){
			    		console.log(data)
			    	}
			    });
		})
		
		
		
		
		
		
		$(".alltab").removeClass("active");
		$(".tab_1").click(function(){
			$(".section2").hide();
			$(".tab1").show();
			$(".alltab").removeClass("active-tab");
			$(".tab_1").addClass("active-tab");
		});
		$(".tab_2").click(function(){
			$(".section2").hide();
			$(".tab2").show();
			$(".alltab").removeClass("active-tab");
			$(".tab_2").addClass("active-tab");
		});
		$(".tab_3").click(function(){
			$(".section2").hide();
			$(".tab3").show();
			$(".alltab").removeClass("active-tab");
			$(".tab_3").addClass("active-tab");
		});
		$(".tab_4").click(function(){
			$(".section2").hide();
			$(".tab4").show();
			$(".alltab").removeClass("active-tab");
			$(".tab_4").addClass("active-tab");
		});
		
		
		
	});
</script>
@endsection