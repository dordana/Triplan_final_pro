@extends('layouts.app')

@section('content')
<script type="text/javascript" >
	document.title = 'Triplan - Show Attraction - {{$attraction->name}}';
</script>
	<p id="pageName" hidden >Attractions</p>
	<meta name="csrf_token" content="{ csrf_token() }" />
	<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
	<link rel="stylesheet" href="/pages/attraction/css/linearicons.css">
	<link rel="stylesheet" href="/pages/attraction/css/font-awesome.min.css">
	<link rel="stylesheet" href="/pages/attraction/css/bootstrap.css">
	<link rel="stylesheet" href="/pages/attraction/css/magnific-popup.css">
	<link rel="stylesheet" href="/pages/attraction/css/nice-select.css">	
	<link rel="stylesheet" href="/pages/attraction/css/hexagons.min.css">							
	<link rel="stylesheet" href="/pages/attraction/css/animate.min.css">
	<link rel="stylesheet" href="/pages/attraction/css/owl.carousel.css">
	<link rel="stylesheet" href="/pages/attraction/css/main.css">
<!---->
<style type="text/css">
	/*         Just for demo     */
body {
  padding: 10px;
  text-align: center;
}
#carousel-example-generic {
  display: inline-block;
  width:100%;
	padding: 5px 0 0 0;
    margin: 0;
    list-style-type: none;
    text-align: center;
}
/*****************************/

/* Plugin styles */
ul.thumbnails-carousel {
	padding: 5px 0 0 0;
	margin: 0;
	list-style-type: none;
	text-align: center;
}
ul.thumbnails-carousel .center {
	display: inline-block;
}
ul.thumbnails-carousel li {
	margin-right: 5px;
	float: left;
	cursor: pointer;
}
.controls-background-reset {
	background: none !important;
}
.active-thumbnail {
	opacity: 0.4;
}
.indicators-fix {
	bottom: 120px;
}

.left-sidebar{
  border:#393E46 solid 1px;
  height:600px;
  margin-right: 3px;
  width: 24%;
}

.right-sidebar{
  border:#393E46 solid 1px;
  height:600px;
  width: 24%;
}

.center_content{
  border:#393E46 solid 1px;
  height:600px;
  margin-right: 3px;
  width: 50%;
}

.info-container{
	padding: 100px;
}
.info{
	border: black solid 1px;
	height:150px;
	margin-right:10px ;
	margin-bottom:10px;
}

.image1{
	margin:0 auto;
	width:80%;
	height: 100%;
}

/**/
/** ====================
 * Lista de Comentarios
 =======================*/

.comments-container h1 {
	font-size: 36px;
	color: #283035;
	font-weight: 400;
}

.comments-container h1 a {
	font-size: 18px;
	font-weight: 700;
}

.comments-list {
	margin-top: 30px;
	position: relative;
}

.comments-list li {
	margin-bottom: 15px;
	display: block;
	position: relative;
}

.comments-list li:after {
	content: '';
	display: block;
	clear: both;
	height: 0;
	width: 0;
}

.reply-list {
	padding-left: 88px;
	clear: both;
	margin-top: 15px;
}
/**
 * Avatar
 ---------------------------*/
.comments-list .comment-avatar {
	width: 65px;
	height: 65px;
	position: relative;
	z-index: 99;
	float: left;
	border: 3px solid #FFF;
	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
	border-radius: 4px;
	-webkit-box-shadow: 0 1px 2px rgba(0,0,0,0.2);
	-moz-box-shadow: 0 1px 2px rgba(0,0,0,0.2);
	box-shadow: 0 1px 2px rgba(0,0,0,0.2);
	overflow: hidden;
}

.comments-list .comment-avatar img {
	width: 100%;
	height: 100%;
}

.reply-list .comment-avatar {
	width: 50px;
	height: 50px;
}

.comment-main-level:after {
	content: '';
	width: 0;
	height: 0;
	display: block;
	clear: both;
}
/**
 * Caja del Comentario
 ---------------------------*/
.comments-list .comment-box {
	width: 680px;
	float: right;
	position: relative;
	-webkit-box-shadow: 0 1px 1px rgba(0,0,0,0.15);
	-moz-box-shadow: 0 1px 1px rgba(0,0,0,0.15);
	box-shadow: 0 1px 1px rgba(0,0,0,0.15);
}

.comments-list .comment-box:before, .comments-list .comment-box:after {
	content: '';
	height: 0;
	width: 0;
	position: absolute;
	display: block;
	border-width: 10px 12px 10px 0;
	border-style: solid;
	border-color: transparent #FCFCFC;
	top: 8px;
	left: -11px;
}

.comments-list .comment-box:before {
	border-width: 11px 13px 11px 0;
	border-color: transparent rgba(0,0,0,0.05);
	left: -12px;
}

.reply-list .comment-box {
	width: 610px;
}
.comment-box .comment-head {
	background: #FCFCFC;
	padding: 10px 12px;
	border-bottom: 1px solid #E5E5E5;
	overflow: hidden;
	-webkit-border-radius: 4px 4px 0 0;
	-moz-border-radius: 4px 4px 0 0;
	border-radius: 4px 4px 0 0;
}

.comment-box .comment-head i {
	float: right;
	margin-left: 14px;
	position: relative;
	top: 2px;
	color: #A6A6A6;
	cursor: pointer;
	-webkit-transition: color 0.3s ease;
	-o-transition: color 0.3s ease;
	transition: color 0.3s ease;
}

.comment-box .comment-head i:hover {
	color: #03658c;
}

.comment-box .comment-name {
	color: #283035;
	font-size: 14px;
	font-weight: 700;
	float: left;
	margin-right: 10px;
}

.comment-box .comment-name a {
	color: #283035;
}

.comment-box .comment-head span {
	float: left;
	color: black;
	font-size: 13px;
	position: relative;
	top: 1px;
}

.comment-box .comment-content {
	background: #FFF;
	padding: 12px;
	font-size: 15px;
	color: #595959;
	-webkit-border-radius: 0 0 4px 4px;
	-moz-border-radius: 0 0 4px 4px;
	border-radius: 0 0 4px 4px;
}

.comment-box .comment-name.by-author, .comment-box .comment-name.by-author a {color: #393E46 !important;}
.comment-box .comment-name.by-author:after {
	content: 'autor';
	background: #03658c;
	color: #FFF;
	font-size: 12px;
	padding: 3px 5px;
	font-weight: 700;
	margin-left: 10px;
	-webkit-border-radius: 3px;
	-moz-border-radius: 3px;
	border-radius: 3px;
}
.date{
    color: white;
}
/** =====================
 * Responsive
 ========================*/
@media only screen and (max-width: 766px) {
	.comments-container {
		width: 480px;
	}

	.comments-list .comment-box {
		width: 390px;
	}

	.reply-list .comment-box {
		width: 320px;
	}
}
.modal-footer{
   text-align: center;
}

.evenFlip{
    color:white;
}

.boldValue{
    font-weight: bold;
    font-size: 18px;
}

/**/

/*Rate*/
@import url(https://fonts.googleapis.com/css?family=Roboto:100,300,400);
@import url(https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);


.container_rate {
  width: 100%;
  margin: 0 auto;
  margin-top: 3em;
  background-color: #EFEFEF;
  padding: 4px;
}

.inner {
  display: flex;
  justify-content: center;
  padding: 1em;
  background-color: white;
  overflow: hidden;
  position: relative;
  -webkit-border-radius: 4px; 
  -moz-border-radius: 4px; 
  border-radius: 4px; 
}

.rating {
  float: left;
  width: 45%;
  margin-right: 5%;
  text-align: center;
}

.rating-num {
  color: #333333;
  font-size: 72px;
  font-weight: 100;
  line-height: 1em; 
}

.rating-stars {
  font-size: 16px;
  color: #E3E3E3;
  margin-bottom: .5em;
}
.rating-stars .active {
  color: #737373;
}

.rating-stars .half_active {
	/*background: -webkit-linear-gradient(red, green);*/
	-webkit-background-clip: text;
	-webkit-text-fill-color: #737373;
}


.rating-users {
  font-size: 14px;
}

.histo {
  float: left;
  width: 50%;
  font-size: 13px;
}

.histo-star {
  float: left;
  padding: 3px;

}

.histo-rate {
  width: 100%;
  display: block;
  clear: both;
}

.bar-block {
  margin-left: 5px;
  color: black;
  display: block;
  float: left;
  width: 75%;
  position: relative;
}

.bar {
  padding: 4px;
  display: block;
}

#bar-five {
  width: 0;
  background-color: #9FC05A;
}

#bar-four {
  width: 0;
  background-color: #ADD633;
}

#bar-three {
  width: 0;
  background-color: #FFD834;
}

#bar-two {
  width: 0;
  background-color: #FFB234;
}

#bar-one {
  width: 0;
  background-color: #FF8B5A;
}

.single-defination{
	background: #efefef;
	padding: 15px 20px;
	height: 300px;
}

.show-more{
    position: absolute;
    bottom: 16px;
    right: 15px;
    left: 25%;
    width: 50%;
}
.recent-posts-widget .single-recent-post .recent-details {
     margin-left: 0px; 
}
/*rating css*/

pre {
display: block;
padding: 9.5px;
margin: 0 0 10px;
font-size: 13px;
line-height: 1.42857143;
color: #333;
word-break: break-all;
word-wrap: break-word;
background-color: #F5F5F5;
border: 1px solid #CCC;
border-radius: 4px;
}

.single-recent-post:hover{
	background-color:#FBFBFB;
	cursor : pointer;
}


#a-footer {
  margin: 20px 0;
}

.new-react-version {
  padding: 20px 20px;
  border: 1px solid #eee;
  border-radius: 20px;
  box-shadow: 0 2px 12px 0 rgba(0,0,0,0.1);
  
  text-align: center;
  font-size: 14px;
  line-height: 1.7;
}

.new-react-version .react-svg-logo {
  text-align: center;
  max-width: 60px;
  margin: 20px auto;
  margin-top: 0;
}





.success-box {
  padding:10px 10px;
}

.success-box img {
  margin-right:10px;
  display:inline-block;
  vertical-align:top;
}

.success-box > div {
  vertical-align:top;
  display:inline-block;
  color:#888;
}

.rating-widget{
    margin-top: 60px;
}


/* Rating Star Widgets Style */
.rating-stars ul {
  list-style-type:none;
  padding:0;
  
  -moz-user-select:none;
  -webkit-user-select:none;
}
.rating-stars ul > li.star {
  display:inline-block;
  
}

/* Idle State of the stars */
.rating-stars ul > li.star > i.fa {
  font-size:2.5em; /* Change the size of the stars */
  color:#ccc; /* Color on idle state */
}

/* Hover state of the stars */
.rating-stars ul > li.star.hover > i.fa {
  color:#FFCC36;
}

/* Selected state of the stars */
.rating-stars ul > li.star.selected > i.fa {
  color:#FF912C;
}

/**/
</style>

	<div id="carousel-example-generic" class="carousel slide" data-ride="carousel" data-interval="false">
		<br><br><br>
		  <!-- Indicators -->
		  <ol class="carousel-indicators">
		    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
		    @for ($i = 1; $i < count($attraction->photos)+1; $i++)
	          <li data-target="#carousel-example-generic" data-slide-to="{{$i}}"></li>
	      	@endfor
		    
		  </ol>
	
		  <!-- Wrapper for slides -->
		  <div class="carousel-inner">
	      <div class="item active srle">
		      <img class="image1" src="{{ url('/uploads/attractions') }}/{{$attraction->mainpic}}" class="img-responsive">
		      <div class="carousel-caption">
		      </div>
		    </div>
	      @foreach ($attraction->photos as $photo)
		    <div class="item">
		      <img class="image1" src="{{ url('/uploads/attractions') }}/{{$photo->path}}" class="img-responsive">
		      <div class="carousel-caption">
		      </div>
		    </div>
	      @endforeach
		  </div>
	
	
			<div class="indecators">
				<!-- Controls -->
				  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
				    <span class="glyphicon glyphicon-chevron-left"></span>
				  </a>
				  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
				    <span class="glyphicon glyphicon-chevron-right"></span>
				  </a>
			</div>
		  
	
		  <!-- Thumbnails --> 
		  <ul class="thumbnails-carousel clearfix">
		  	<li><img src="{{ url('/uploads/attractions') }}/{{$attraction->mainpic}}" style="width:80px;height:70px;"></li>
		    @foreach ($attraction->photos as $photo)
		  		<li><img src="{{ url('/uploads/attractions') }}/{{$photo->path}}" style="width:80px;height:70px;"></li>
		    @endforeach
		  </ul>
		</div> 
			
			<!-- Start blog-posts Area -->
			<section class="blog-posts-area section-gap">
				<div class="container">
					<div class="row">
						<div class="col-lg-8 post-list blog-post-list">
							<div class="single-post">
								<a href="javascript:void(0)">
									<h1>
										{{$attraction->name}}
									</h1>
								</a>
								<div class="content-wrap">
									<p>{{ $attraction->description }}</p>
								</div>
<!--rating-->
@if(Auth::check())
	@if(!$isRated)
	<section class='rating-widget'>
		<h3 class="mb-30">Rating</h3>
	  <!-- Rating Stars Box -->
	  <div class='rating-stars text-center'>
	    <ul id='stars'>
	      <li attrId="{{$attraction->id}}" class='star' title='Poor' data-value='1'>
	        <i class='fa fa-star fa-fw'></i>
	      </li>
	      <li attrId="{{$attraction->id}}" class='star' title='Fair' data-value='2'>
	        <i class='fa fa-star fa-fw'></i>
	      </li>
	      <li attrId="{{$attraction->id}}" class='star' title='Good' data-value='3'>
	        <i class='fa fa-star fa-fw'></i>
	      </li>
	      <li attrId="{{$attraction->id}}" class='star' title='Excellent' data-value='4'>
	        <i class='fa fa-star fa-fw'></i>
	      </li>
	      <li attrId="{{$attraction->id}}" class='star' title='WOW!!!' data-value='5'>
	        <i class='fa fa-star fa-fw'></i>
	      </li>
	    </ul>
	  </div>
	  <div class='success-box'>
	    <div class='clearfix'></div>
	    <div class='text-message'></div>
	    <div class='clearfix'></div>
	  </div>
	</section>
	@endif
@endif
<!--end rating-->
			<div class="whole-wrap">
				<div class="container">
					<div class="section-top-border">
						<h3 class="mb-30">Users Reviews</h3>
						<div class="row">
							@if(count($reviews) == 0)
							<p style="margin: 0 auto;">No reviews</p>
							@endif
							@foreach($reviews as $review)
							<div class="col-md-4">
								<div class="single-defination">
									<h4 class="mb-20">{{ $review->title }}</h4>
									<p>{{substr($review->body, 0,120)}}...</p>
									<a class="show-more btn btn-primary" href="{{route('show-review', $review->id)}}">Show more</a>
								</div>
							</div>
							@endforeach
						</div>
					</div>
				</div>
			</div>
<!-- Start comment-sec Area -->
<!--add a new comment modal-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New comment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
  		<div class="form-group">
            <label for="message-text" class="form-control-label">Title:</label>
				<input class="form-control" type="text" name="title" id="textTitle"/>    
			</div>
		<div class="form-group">
			<label for="message-text" class="form-control-label">Content:</label>
			<textarea class="form-control" id="commentText"></textarea>
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" data-dismiss="modal" attraId="{{$attraction->id}}" class="btn btn-primary saveComment">Save </button>
      </div>
    </div>
  </div>
</div>

<!--edit comment modal-->
<div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit comment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <input type="text" hidden id="edit_qId_hidden"/>
      <div class="modal-body">
  		<div class="form-group">
            <label for="message-text" class="form-control-label">Title:</label>
				<input class="form-control" type="text" name="title" id="editTextTitle" value=""/>    
			</div>
		<div class="form-group">
			<label for="message-text" class="form-control-label">Content:</label>
			<textarea class="form-control" id="editCommentText" value=""></textarea>
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" data-dismiss="modal" class="btn btn-primary editComment">Save</button>
      </div>
    </div>
  </div>
</div>

<!--comment Inner Modal-->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      	<input type="text" hidden id="qId_hidden"/>
        <h5 class="modal-title" id="exampleModalLabel1">New answer to question</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		<div class="form-group">
			<label for="message-text" class="form-control-label">Answer:</label>
			<textarea class="form-control" id="commentText1"></textarea>
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" data-dismiss="modal" class="btn btn-primary saveAnswer">Save </button>
      </div>
    </div>
  </div>
</div>
<!---->
<section class="comment-sec-area pt-80 pb-80">
    <div class="container">
        <div class="row flex-column">
        	<h3 class="mb-30">Q&A</h3>
        		<div class="comments-container">
			@if (Auth::check())
			<div class="newComment">
				<div>
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Add a new question</button>
				</div>
			</div>
			@endif
			<br><br>
			@if(count($questions) == 0)
				<p style="margin: 0 auto;">No questions</p>
			@endif
		<ul id="comments-list" class="comments-list">
			@foreach ($questions as $q)
			<li>
				<div class="comment-main-level">
					<div class="comment-avatar"><img src="{{ url('/uploads/user-photos') }}/{{App\User::find($q->user_id)->profile_phote_path}}" alt=""></div>
					<div class="comment-box">
						<div class="comment-head">
							<h6 class="comment-name by-author"><a href="{{route('showuserprofile', $q->user_id)}}">{{App\User::find($q->user_id)->username}}</a></h6>
							<span class="date">{{date("F jS, Y, g:i a", strtotime($q->created_at))}}</span>
							@if (Auth::check())
								@if ($user->id == $q->user_id)
									<a class="showEditModal" data-toggle="modal" qTitle="{{$q->title}}" qBody="{{$q->body}}" qId="{{$q->id}}" data-target="#exampleModal3" data-whatever="@getbootstrap"><i title="Edit" qustionIdH="{{$q->id}}" class="fa fa-edit EHquestion{{$q->id}}"></i></a>
									<i  title="Delete" qustionId="{{$q->id}}" class="fa fa-trash question{{$q->id}}"></i>
								@endif
							<a class="showAnswerModal" data-toggle="modal" data-target="#exampleModal2" data-whatever="@getbootstrap"><i class="fa fa-reply" qustionIdA="{{$q->id}}" title="Reply"></i></a>
							<i title="Like" qustionIdH="{{$q->id}}" class="fa fa-heart Hquestion{{$q->id}}"> {{$q->num_of_likes}}</i>
							 @endif
						</div>
						<div class="comment-content">
							<b>{{$q->title}}</b><br>
							{{$q->body}}
						</div>
						<div class="comment-content">
							<input style="width:100%; background:#FFFFFF;" num_of_comments="{{count($q->answers)}}" qId="{{$q->id}}" value="{{count($q->answers)}} comments" type="button"  name="showC" class="showComments"/>
						</div>
					</div>
				</div>
				
				<ul class="comments-list reply-list" id="{{$q->id}}" style="display:none;">
					@foreach ($q->answers as $a)
					<li>
						<div class="comment-avatar"><img src="{{ url('/uploads/user-photos') }}/{{App\User::find($a->user_id)->profile_phote_path}}" alt="{{ url('/uploads/Icons/userprofile.png') }}"></div>
						<div class="comment-box">
							<div class="comment-head">
								@if ($q->user_id == $a->user_id)
								<h6 class="comment-name by-author"><a href="{{route('showuserprofile', $a->user_id)}}">{{App\User::find($a->user_id)->username}}</a></h6>
								@else
								<h6 class="comment-name"><a href="{{route('showuserprofile', $a->user_id)}}">{{App\User::find($a->user_id)->username}}</a></h6>
								@endif
								<span class="date">{{date("F jS, Y, g:i a", strtotime($a->created_at))}}</span>
							</div>
							<div class="comment-content">
								{{$a->body}}
							</div>
						</div>
					</li>
					@endforeach
				</ul>
			</li>
			@endforeach
		</ul>
	</div>
        	
        	
        </div>
    </div>    
</section>
<!-- End comment-sec Area -->










	</div>																		
</div>
						<div class="col-lg-4 sidebar">
							<div class="single-widget protfolio-widget">
								<iframe
								  width="100%" 
								  height="300" 
								  frameborder="0" style="border:0"
								  src="https://www.google.com/maps/embed/v1/place?key=AIzaSyAiTGDJkinOXMY9hc248cZ4hshRz6Mtq-c&q={{$attraction->lat}}+,+{{$attraction->lng}}&zoom=12.5&maptype=roadmap" allowfullscreen>
								</iframe>						
							</div>

							<div class="single-widget category-widget">
								<h4 class="title">General Details:</h4>
								<ul>
									<li><a href="javascript:void(0)" class="justify-content-between align-items-center d-flex"><span>{{ $attraction->address.", ".$attraction->zip_code }}</span></a></li>
									<li><a href="javascript:void(0)" class="justify-content-between align-items-center d-flex"><h6>Telephone: </h6> <span>{{ $attraction->telephone }}</span></a></li>
									<li><a href="javascript:void(0)" class="justify-content-between align-items-center d-flex"><h6>Opening Hours: </h6> <span>{{ $attraction->opening_hours ? $attraction->opening_hours :'empty' }}</span></a></li>
									<li><a href="javascript:void(0)" class="justify-content-between align-items-center d-flex"><h6>Price Per Person: </h6> <span style="font-weight:bold">{{ $attraction->pricePerPerson ? $attraction->pricePerPerson . '$' :'---' }}</span></a></li>
									<li><a style="width:250px;height:auto;" class="btn btn-primary" href="{{ $attraction->website }}" class="justify-content-between align-items-center d-flex">Website<span></span></a></li>
									
									@if (Auth::check())
										@if(in_array($attraction->id,$userFavorites))
											<li id="exist_fav"><a style="width:250px;height:auto;color: black;font-size: 16px; background-color: white;" class="btn btn-primary del_fav" attractionId="{{ $attraction->id }}" class="justify-content-between align-items-center d-flex"><i style="font-size: 16px; color: red;" class="fab fa-gratipay"></i> Remove from favorites<span></span></a></li>
										@else
											<li id="new_fav"><a style="width:250px;height:auto;color: black;font-size: 16px; background-color: white;" class="btn btn-primary add_fav" attractionId="{{ $attraction->id }}" class="justify-content-between align-items-center d-flex"><i style="font-size: 16px; color: red;" class="fab fa-gratipay"></i> Add to favorites<span></span></a></li>
										@endif
									@endif
								</ul>
							</div>
                            <div class="single-widget recent-posts-widget">
                                <h4 class="title">Rating</h4>
                                <div class="container_rate">
								  <div class="inner">
								    <div class="rating">
								      <span class="rating-num"><span style="color:orange">{{ intval($attraction->rate) }}<span style="font-size:50px">/5</span></span></span>
								      <div class="rating-stars">
								      	@for($i=0;$i < intval($attraction->rate);$i++)
								        	<span><i class="active fas fa-star"></i></span>
								        @endfor
								        @if(fmod($attraction->rate, 1) !== 0.00)
								        	<span><i class="half_active fas fa-star-half"></i></span>
								        	@for($i=0;$i < 4-intval($attraction->rate);$i++)
									        	<span><i class="fas fa-star"></i></span>
									        @endfor	
								        @else
											@for($i=0;$i < 5-intval($attraction->rate);$i++)
									        	<span><i class="fas fa-star"></i></span>
									        @endfor	
									    @endif
								        </div>
								    </div>
								    
								    </div>
								  </div>
								</div>
								<div class="single-widget recent-posts-widget">
                                <h4 class="title">Nearby Attractions</h4>
                                <div class="blog-list ">
                                	@foreach($attractions as $attraction)
                                    <div class="single-recent-post d-flex flex-row" style="margin-bottom: 19px;">
                                        <div class="recent-thumb"> 
                                        <a href="{{route('showattraction', $attraction->id)}}">
                                            <img class="img-fluid" style="height:90px;width:auto;max-width:150px;min-width:150px;margin-right: 15px;" src="{{ url('/uploads/attractions') }}/{{$attraction->mainpic}}" alt="">
                                        </a>
                                        </div>
                                        <div class="recent-details">
                                            <a href="{{route('showattraction', $attraction->id)}}">
                                                <h6 style="margin-left: none; margin-top:25%;">
                                                    {{ $attraction->name }}
                                                </h6>
                                            </a>
                                        </div>
                                    </div>
                                  @endforeach
                                </div>                              
                            </div>
                            </div>


						</div>
					</div>
				</div>	
			</section>
			<!-- End blog-posts Area -->



<script type="text/javascript">
$(document).ready(function(){
  
  /* 1. Visualizing things on Hover - See next part for action on click */
  $('#stars li').on('mouseover', function(){
    var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on
   
    // Now highlight all the stars that's not after the current hovered star
    $(this).parent().children('li.star').each(function(e){
      if (e < onStar) {
        $(this).addClass('hover');
      }
      else {
        $(this).removeClass('hover');
      }
    });
    
  }).on('mouseout', function(){
    $(this).parent().children('li.star').each(function(e){
      $(this).removeClass('hover');
    });
  });
  
  
  /* 2. Action to perform on click */
  $('#stars li').on('click', function(){
    var onStar = parseInt($(this).data('value'), 10); // The star currently selected
    var stars = $(this).parent().children('li.star');
    
    for (i = 0; i < stars.length; i++) {
      $(stars[i]).removeClass('selected');
    }
    
    for (i = 0; i < onStar; i++) {
      $(stars[i]).addClass('selected');
    }
    
    // JUST RESPONSE (Not needed)
    var ratingValue = parseInt($('#stars li.selected').last().data('value'), 10);
    var msg = "";
    msg = "Thanks! You rated this attraction with " + ratingValue + " stars.";


    // 
	var url = "{{route('addratetoattraction')}}";
	var attractionId = $(this).attr("attrId");
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

	$.ajax({
    	type: 'ajax',
    	method: 'post',
    	url: url,
    	data: {ratingValue:ratingValue,attrId:attractionId},
    	async: false,
    	dataType: 'json',
    	success: function(data){
    		console.log(data);
    		location.reload();
    	},
    	error: function(data){
    		console.log(data)
    		location.reload();
    	}
    });
    
    // 
    responseMessage(msg);
    
  });
  
  
});


function responseMessage(msg) {
  $('.success-box').fadeIn(200);  
  $('.success-box div.text-message').html("<span>" + msg + "</span>");
}
	/* global $ */
(function(window, $, undefined) {

	var conf = {
		center: true,
		backgroundControl: false
	};

	var cache = {
		$carouselContainer: $('.thumbnails-carousel').parent(),
		$thumbnailsLi: $('.thumbnails-carousel li'),
		$controls: $('.thumbnails-carousel').parent().find('.carousel-control')
	};

	function init() {
		cache.$carouselContainer.find('ol.carousel-indicators').addClass('indicators-fix');
		cache.$thumbnailsLi.first().addClass('active-thumbnail');

		if(!conf.backgroundControl) {
			cache.$carouselContainer.find('.carousel-control').addClass('controls-background-reset');
		}
		else {
			cache.$controls.height(cache.$carouselContainer.find('.carousel-inner').height());
		}

		if(conf.center) {
			cache.$thumbnailsLi.wrapAll("<div class='center clearfix'></div>");
		}
	}

	function refreshOpacities(domEl) {
		cache.$thumbnailsLi.removeClass('active-thumbnail');
		cache.$thumbnailsLi.eq($(domEl).index()).addClass('active-thumbnail');
	}	

	function bindUiActions() {
		cache.$carouselContainer.on('slide.bs.carousel', function(e) {
  			refreshOpacities(e.relatedTarget);
		});

		cache.$thumbnailsLi.click(function(){
			cache.$carouselContainer.carousel($(this).index());
		});
	}

	$.fn.thumbnailsCarousel = function(options) {
		conf = $.extend(conf, options);

		init();
		bindUiActions();

		return this;
	}

})(window, jQuery);

$('.thumbnails-carousel').thumbnailsCarousel();
//# sourceURL=pen.js



$( ".header-dropdown-trigger" ).click(function() {
  $( this ).toggleClass( "active" );
  $( ".header-dropdown" ).toggleClass( "expand" );
});

$( ".header-dropdown li" ).click(function() {
  $( ".header-dropdown-trigger" ).removeClass( "active" );
  $( ".header-dropdown" ).removeClass( "expand" );
});

$( ".button--approve" ).click(function() {
  $( this ).toggleClass( "active" );
  $( this ).siblings( '.button--deny' ).removeClass( "active" );
});

$( ".button--deny" ).click(function() {
  $( this ).toggleClass( "active" );
  $( this ).siblings( '.button--approve' ).removeClass( "active" );
});


$( ".button--flag" ).click(function() {
  $( this ).parent().parent().toggleClass( "post--commenting" );
});


$( ".button--confirm" ).click(function() {
  $( this ).parent().parent().parent().parent().parent().toggleClass( "post--commenting" );
});

$( ".button.cancel" ).click(function() {
  $( this ).parent().parent().parent().parent().parent().toggleClass( "post--commenting" );
});
</script>

<script type="text/javascript">
$(document).ready(function(){
	$(".add_fav").click(function(){
		var attractionId = $(this).attr("attractionId");
		var url = "{{route('addfavorite')}}";
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
	
		$.ajax({
	    	type: 'ajax',
	    	method: 'post',
	    	url: url,
	    	data: {id:attractionId},
	    	async: false,
	    	dataType: 'json',
	    	success: function(data){
	    		console.log(data);
	    		location.reload();
	    	},
	    	error: function(data){
	    		console.log(data)
	    		location.reload();
	    	}
	    });
	});
	
	$(".del_fav").click(function(){
		var attractionId = $(this).attr("attractionId");
		var url = "{{route('delfavorite')}}";
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
	
		$.ajax({
	    	type: 'ajax',
	    	method: 'post',
	    	url: url,
	    	data: {id:attractionId},
	    	async: false,
	    	dataType: 'json',
	    	success: function(data){
	    		console.log(data);
	    		location.reload();
	    	},
	    	error: function(data){
	    		console.log(data)
	    		location.reload();
	    	}
	    });
	});
		
		
		
		
		
	    $(".showComments").click(function(){
	    	if($(this).attr("num_of_comments") > 0){
	    		var qId = $(this).attr("qId");
		    	if($("#"+qId).css('display') == 'none')
				{
					$(this).val("close");
					$("#"+qId).toggle();
				}else
				{
					var numOfComments = $(this).attr("num_of_comments");
					$(this).val(numOfComments + ' comments');
					$("#"+qId).toggle();
				}
	    	}
	    });
	    
	    $('.showEditModal').click(function(e) {
	    	console.log($(this).attr('qTitle'));
	    	console.log($(this).attr('qBody'));
	    	$('#editTextTitle').val($(this).attr('qTitle'));
	    	$('#editCommentText').val($(this).attr('qBody'));
	    	$('#edit_qId_hidden').val($(this).attr('qId'));
	    });
	    
	    $('.editComment').click(function(e) {
			var title = $('#editTextTitle').val();
			var body = $('#editCommentText').val();
			var qId = $('#edit_qId_hidden').val();
			var url = "{{route('Attraction_editquestion')}}";
			
	    	e.preventDefault();
	    	
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});

			$.ajax({
				type:"POST",
				url: url,
				data : {qId: qId, body: body, title: title},
				success: function(data) {
					location.reload();
				},error:function(data){ 
	                console.log(data);
	            }
			});
	    	
	    });
	    
	    
	    $(".fa-heart").click(function(e)
	    {
	    	var url = "{{route('Attraction_addlike')}}";
	    	e.preventDefault();
	    	var questionId = $(this).attr("qustionIdH");
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});

			$.ajax({

				type:"POST",
				url: url,
				data : {qId: questionId},
				success: function(data) {
					var inc = parseInt($('.Hquestion'+questionId).text())+1;
					$('.Hquestion'+questionId).text(" " + inc);
					$('.Hquestion'+questionId).unbind( "click" );
					$('.Hquestion'+questionId).css( "cursor", "auto" );
				}
			});
			
	    })
	    
	    $(".fa-trash").click(function(e)
	    {
	    	var url = "{{route('Attraction_deletequestion')}}";
	    	e.preventDefault();
	    	var questionId = $(this).attr("qustionId");
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});

			$.ajax({
				type:"POST",
				url: url,
				data : {qId: questionId},
				success: function(data) {
					location.reload();
				}
			});
			
	    })
	    
	    
	    
	    
	    $('.saveComment').click(function(e){
	    	var commentText = $('#commentText').val();
	    	var textTitle = $('#textTitle').val();
	    	var attractionId = $(this).attr("attraId");
	    	var url = "{{route('Attraction_addquestion')}}";
	    	e.preventDefault();
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});
			$.ajax({
				type:"POST",
				url: url,
				data : {aId: attractionId, data: commentText, title: textTitle },
				success: function(data) {
					location.reload();
				},error:function(data){ 
	                location.reload();
	            }
			});
	    });
	    
	    
	    $('.showAnswerModal').click(function(){
	    	var qid = $(this).children().attr('qustionIdA');
	    	$('#qId_hidden').val(qid);
	    })
	    $('.saveAnswer').click(function(e){
	    	var commentText = $('#commentText1').val();
	    	var questionId = $('#qId_hidden').val();
	    	var url = "{{route('Attraction_addanswertoquestion')}}";
	    	e.preventDefault();
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});

			$.ajax({
				type:"POST",
				url: url,
				data : {qId: questionId, data: commentText},
				success: function() {
					location.reload();
				}
			});
	    });
	    
	});
</script>
<!---->
	<script src="/pages/attraction/js/vendor/jquery-2.2.4.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="/pages/attraction/js/vendor/bootstrap.min.js"></script>			
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
  	<script src="/pages/attraction/js/easing.min.js"></script>			
	<script src="/pages/attraction/js/hoverIntent.js"></script>
	<script src="/pages/attraction/js/superfish.min.js"></script>	
	<script src="/pages/attraction/js/jquery.ajaxchimp.min.js"></script>
	<script src="/pages/attraction/js/jquery.magnific-popup.min.js"></script>	
	<script src="/pages/attraction/js/owl.carousel.min.js"></script>	
	<script src="/pages/attraction/js/hexagons.min.js"></script>							
	<script src="/pages/attraction/js/jquery.nice-select.min.js"></script>	
	<script src="/pages/attraction/js/jquery.counterup.min.js"></script>
	<script src="/pages/attraction/js/waypoints.min.js"></script>							
	<script src="/pages/attraction/js/mail-script.js"></script>	
	<script src="/pages/attraction/js/main.js"></script>	
	
	<script type="text/javascript">
		$(document).ready(function() {
		  $('.bar span').hide();
		  $('#bar-five').animate({
		     width: '75%'}, 1000);
		  $('#bar-four').animate({
		     width: '35%'}, 1000);
		  $('#bar-three').animate({
		     width: '20%'}, 1000);
		  $('#bar-two').animate({
		     width: '15%'}, 1000);
		  $('#bar-one').animate({
		     width: '30%'}, 1000);
		  
		  setTimeout(function() {
		    $('.bar span').fadeIn('slow');
		  }, 1000);
		  
		});
	</script>
	
@endsection