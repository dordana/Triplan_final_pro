
@extends('layouts.app')

@section('content')

<style type="text/css">

.file-upload {
  background-color: #ffffff;
  margin: 0 auto;
  padding: 20px;
}

.file-upload-btn {
  width: 100%;
  margin: 0;
  color: #fff;
  background: #E89664;
  border: none;
  padding: 10px;
  border-radius: 4px;
  border-bottom: 4px solid #E89664;
  transition: all .2s ease;
  outline: none;
  text-transform: uppercase;
  font-weight: 700;
}

.file-upload-btn:hover {
  background: #E89664;
  color:white !important;
  transition: all .2s ease;
  cursor: pointer;
}

.file-upload-btn:active {
  border: 0;
  transition: all .2s ease;
}

.file-upload-content {
  display: none;
  text-align: center;
}

.file-upload-input {
  position: absolute;
  margin: 0;
  padding: 0;
  width: 100%;
  height: 100%;
  outline: none;
  opacity: 0;
  cursor: pointer;
}

.image-upload-wrap {
  margin-top: 20px;
  border: 4px dashed #E89664;
  position: relative;
}

.image-dropping,
.image-upload-wrap:hover {
  background-color: #E89664;
  border: 4px dashed #ffffff;
  color:white !important;
}

.image-title-wrap {
  padding: 0 15px 15px 15px;
  color: #222;
}

.drag-text {
  text-align: center;
}

.drag-text h3 {
  font-weight: 100;
  text-transform: uppercase;
  color: black;
  padding: 60px 0;
}

.file-upload-image {
  max-height: 200px;
  max-width: 200px;
  margin: auto;
  padding: 20px;
}

.remove-image {
  width: auto;
  margin: 0;
  color: #fff;
  background: #E89664;
  border: none;
  padding: 10px;
  border-radius: 4px;
  border-bottom: 4px solid #E89664;
  transition: all .2s ease;
  outline: none;
  text-transform: uppercase;
  font-weight: 700;
}

.remove-image:hover {
  background: #c13b2a;
  color:white !important;
  transition: all .2s ease;
  cursor: pointer;
}

.remove-image:active {
  border: 0;
  transition: all .2s ease;
}
</style>




<link href="{!! asset('pages/showcountry/showcountry.css') !!}" rel="stylesheet" />
<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css'>
<!-- bootstrap carousel -->
<p id="pageName" hidden >Other</p>
	<div id="carousel-example-generic" class="carousel slide" data-ride="carousel" data-interval="false">
		
	  <!-- Indicators -->
	  <ol class="carousel-indicators">
	    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
	    @for ($i = 1; $i < count($country->photos)+1; $i++)
          <li data-target="#carousel-example-generic" data-slide-to="{{$i}}"></li>
      	@endfor
	    
	  </ol>

	  <!-- Wrapper for slides -->
	  <div class="carousel-inner">
      <div class="item active srle">
	      <img src="{{ url('/uploads/countries') }}/{{preg_replace('/\s+/', '', $country->name)}}/{{$country->mainpic}}" style="width:100% ;height: 100%;" alt="1.jpg" class="img-responsive">
	      <div class="carousel-caption">
	      </div>
	    </div>
      @foreach ($country->photos as $photo)
	    <div class="item">
	      <img src="{{ url('/uploads/countries') }}/{{preg_replace('/\s+/', '', $country->name)}}/{{$photo->path}}" style="width:100% ;height: 100%;" alt="1.jpg" class="img-responsive">
	      <div class="carousel-caption">
	      </div>
	    </div>
      @endforeach
	  </div>

	  <!-- Controls -->
	  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
	    <span class="glyphicon glyphicon-chevron-left"></span>
	  </a>
	  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
	    <span class="glyphicon glyphicon-chevron-right"></span>
	  </a>

	  <!-- Thumbnails --> 
	  <ul class="thumbnails-carousel clearfix">
	  	<li><img src="{{ url('/uploads/countries') }}/{{ preg_replace('/\s+/', '', $country->name) }}/{{$country->mainpic}}" style="width:120px;height:100px;" alt="1_tn.jpg"></li>
	    @foreach ($country->photos as $photo)
	  	<li><img src="{{ url('/uploads/countries') }}/{{preg_replace('/\s+/', '', $country->name)}}/{{$photo->path}}" style="width:120px;height:100px;" alt="1_tn.jpg"></li>
	    @endforeach
	  </ul>
	</div>
<br><br><br>
<iframe id="forecast_embed" type="text/html" frameborder="0" height="245" width="100%" 
src="http://forecast.io/embed/#lat={{$country->lat}}&lon={{$country->lng}}&name={{$country->name}}&color=#f49a66&font=Helvetica&units=si">
</iframe>  
<div class="ui-235">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-3 col-sm-4 col-xs-6 col-mob">
						<!-- Item -->
						<div class="ui-item">
							<!-- flip -->
							<div class="ui-flip front bg-orange">
								<!-- Heading -->
								<h3><a href="#">Currency</a></h3>
								<!-- Hover -->	
								<div class="ui-hover">
									<!-- Heading -->
									<h2>Currency</h2>
									<!-- Paragraph -->
									<h5>{{$country->name}} uses <em><span class="boldValue">{{$country->currency}}</span></em> currency</h5>
									</div>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-4 col-xs-6 col-mob">
						<!-- Item -->
						<div class="ui-item">
							<!-- Flip -->
							<div class="ui-flip">
								<!-- Heading -->
								<h3><a href="#">continent</a></h3>
								<!-- Hover -->
								<div class="ui-hover bg-orange">
									<!-- Heading -->
									<h4><a href="#">continent</a></h4>
									<!-- Paragraph -->
									<h5 class="evenFlip">{{ $country->name }} is located in <em><span class="boldValue">{{ $country->continent }}.</span></em></h5>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-4 col-xs-6 col-mob">
						<!-- Item -->
						<div class="ui-item">
							<!-- Flip -->
							<div class="ui-flip front bg-orange">
								<!-- Heading -->
								<h3><a href="#">language</a></h3>
								<!-- Hover -->
								<div class="ui-hover">
									<!-- Heading -->
									<h4><a href="#">language</a></h4>
									<!-- Paragraph -->
									<h5>The official languages in {{ $country->name }} are: <em><span class="boldValue">{{ $country->language }}</span></em>.</h5>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-4 col-xs-6 col-mob">
						<!-- Item -->
						<div class="ui-item">
							<!-- Flip -->
							<div class="ui-flip">
								<!-- Heading -->
								<h3><a href="#">population</a></h3>
								<!-- Hover -->
								<div class="ui-hover bg-orange">
									<!-- Heading -->
									<h4><a href="#">population</a></h4>
									<!-- Paragraph -->
									<h5 class="evenFlip">in {{ $country->name }} live around <em><span class="boldValue">{{ $country->population }}</span></em> peoples.</h5>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-4 col-xs-6 col-mob">
						<!-- Item -->
						<div class="ui-item">
							<!-- Flip -->
							<div class="ui-flip">
								<!-- Heading -->
								<h3><a href="#">surface area</a></h3>
								<!-- Hover -->
								<div class="ui-hover bg-orange">
									<!-- Heading -->
									<h4><a href="#">surface area</a></h4>
									<!-- Paragraph -->
									<h5 class="evenFlip">the surface area of {{ $country->name }} is about <em><span class="boldValue">{{ $country->surface }}</span></em> km2.</h5>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-4 col-xs-6 col-mob">
						<!-- Item -->
						<div class="ui-item">
							<!-- Flip -->
							<div class="ui-flip front bg-orange">
								<!-- Heading -->
								<h3><a href="#">religion</a></h3>
								<!-- Hover -->
								<div class="ui-hover">
									<!-- Heading -->
									<h4><a href="#">religion</a></h4>
									<!-- Paragraph -->
									<h5>the religions in {{ $country->name }} are: <em><span class="boldValue">{{ $country->religion }}.</span></em></h5>
								</div> 
							</div>
						</div>
					</div> 
					<div class="col-md-3 col-sm-4 col-xs-6 col-mob">
						<!-- Item -->
						<div class="ui-item">
							<!-- Flip -->
							<div class="ui-flip">
								<!-- Heading -->
								<h3><a href="#">calling code</a></h3>
								<!-- Hover -->
								<div class="ui-hover bg-orange">
									<!-- Heading -->
									<h4><a href="#">calling code</a></h4>
									<!-- Paragraph -->
									<h5 class="evenFlip">the calling code of {{ $country->name }} is <em><span class="boldValue">{{ $country->calling_code }}.</span></em></h5>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-4 col-xs-6 col-mob">
						<!-- Item -->
						<div class="ui-item">
							<!-- Flip -->
							<div class="ui-flip front bg-orange">
								<!-- Heading -->
								<h3><a href="#">neighbors</a></h3>
								<!-- Hover -->
								<div class="ui-hover">
									<!-- Heading -->
									<h4><a href="#">neighbors</a></h4>
									<!-- Paragraph -->
									<h5>the countries that border {{ $country->name }} are: <em><span class="boldValue">{{ $country->neighbers }}.</span></em></h5>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<br><br><br>
<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 text-center heading-section animate-box fadeInUp animated">
						<h3>History of {{$country->name}}</h3>
					</div>
					<br><br><br><br><br>
					<div id="Inner">
					
					
					
					<hr>
					
					<div id="Content">
					<div class="boxed"><div id="lipsum">
					<p>
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sed pulvinar nulla. Integer mollis eros ac sapien pretium, ac aliquam ante vulputate. Phasellus euismod, massa posuere posuere lobortis, erat ante cursus purus, id pretium justo risus non orci. Cras tempor metus sed sollicitudin hendrerit. Aenean erat ligula, tincidunt interdum porta vitae, gravida ut ipsum. Morbi accumsan nibh ac nisi lacinia, eu mollis sem facilisis. Sed congue ipsum odio, eget tristique nisl consectetur sit amet.
					</p>
					<p>
					Suspendisse finibus urna rhoncus pretium consequat. Nullam tincidunt vel lacus quis eleifend. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. In iaculis sem nunc, semper auctor purus vehicula fringilla. Nam dictum ex sit amet justo hendrerit accumsan. Praesent gravida quam et ultrices interdum. Duis maximus lorem felis, in sollicitudin tellus imperdiet vulputate. Phasellus sed lacinia orci, ac gravida quam. Pellentesque placerat tristique urna, eget efficitur ipsum lobortis nec.
					</p>
					<p>
					Proin sit amet tellus nec urna finibus fermentum. Aenean eget sapien vel dolor tincidunt pharetra quis nec eros. Integer vehicula id orci vitae tristique. Ut ipsum risus, tristique sed pulvinar sit amet, consectetur eleifend tellus. Cras luctus aliquam est. In sed ipsum purus. Duis tempus dictum massa, sed pretium massa egestas vestibulum. Nullam semper turpis eu ipsum cursus, sed viverra enim molestie. Phasellus nec magna massa. Vivamus ornare ullamcorper mauris in dictum. Praesent vulputate sem a malesuada tincidunt. Curabitur elementum sit amet sapien eu lacinia. Sed viverra, nisi a iaculis lobortis, orci mi luctus turpis, in facilisis felis risus nec felis. Aliquam dictum mauris massa, sit amet mattis nunc consectetur id. Duis sagittis tortor non urna mollis mattis. Pellentesque sollicitudin justo non ligula viverra malesuada.
					</p>
					<p>
					Nam convallis vitae neque non luctus. Duis ut imperdiet sem, sit amet euismod nibh. Phasellus in ex eget eros posuere egestas. Quisque imperdiet, purus fermentum mollis luctus, ipsum dolor porttitor lorem, tristique efficitur lectus est ac mi. Nulla ut vehicula elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed dapibus tellus quis pulvinar pretium. Nunc pellentesque bibendum libero, eu consectetur risus condimentum et. Donec fermentum ligula ac nisl porttitor fermentum. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Fusce augue est, porta ac eros varius, luctus viverra turpis. Fusce vitae consequat dui.
					</p>
					<p>
					Sed volutpat, lorem eu maximus rhoncus, massa massa cursus risus, in mollis dolor nisl at velit. Quisque in odio ac felis tincidunt dignissim nec sit amet nibh. Sed iaculis nisl sit amet tempus iaculis. Vivamus neque enim, consequat ut felis eu, porttitor congue magna. Maecenas lorem arcu, suscipit vel laoreet sit amet, fringilla ut enim. Donec nulla tortor, finibus non scelerisque id, varius sed lectus. Donec sed lacus at tellus euismod luctus. Morbi sagittis quis nunc vitae ornare. Morbi vel libero semper, porttitor elit non, finibus libero. In efficitur sapien erat, eu tincidunt tellus semper nec. Quisque scelerisque efficitur ipsum, nec scelerisque nulla sodales at. Sed eu tincidunt tellus, quis convallis tortor. Nam vestibulum mauris sagittis interdum porttitor. Pellentesque eget nibh nec sem pretium tempor id.
					</p></div>
					</div>
					</div>
					<hr>
					<a href="{{$country->wiki_link}}">{{$country->name}} history in Wikipedia</a>
					<hr>
					<iframe
					  width="100%" 
					  height="600" 
					  frameborder="0" style="border:0"
					  src="https://www.google.com/maps/embed/v1/place?key=AIzaSyAiTGDJkinOXMY9hc248cZ4hshRz6Mtq-c&q={{$country->lat}}+,+{{$country->lng}}&zoom=7.5&maptype=roadmap" allowfullscreen>
					</iframe>
					</div>

				</div>
			</div>	
			<br><br><br>
			
			<div class="container">
				<div class="col-md-8 col-md-offset-2 text-center heading-section animate-box fadeInUp animated">
						<h3>Best cities in {{$country->name}}</h3>
					</div>
			</div>
<div class="item-grid1">
	@foreach ($country->cities as $city)
  <div class="item1">
    <div class="item-image1">
      <img src="{{ url('/uploads/cities') }}/{{str_replace(' ', '', $city->name)}}/{{$city->mainpic}}" alt="" />
    </div>
    <div class="item-text1">
      <div class="item-text-wrapper1">
        <p class="item-text-dek1">{{$city->name}}</p>
        <br>
        <h2 class="item-text-title1">{{$country->name}}</h2>
      </div>
    </div>
    <a class="item-link1" href="{{route('show-citydetalis', $city->name)}}">Facebook in material design</a>
  </div>
  @endforeach
</div>


<!--add a new comment modal-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
  	<form enctype="multipart/form-data" method="POST" action="{{ route('addquestion') }}" autocomplete="off">
  		{{ csrf_field() }}
    <div class="modal-content">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
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
				<textarea class="form-control" name="data" id="commentText"></textarea>
			</div>
			<input type="text" hidden name="cId" value="{{$country->id}}"/>
			<div class="form-group">
				<div class="file-upload">
				  <div class="image-upload-wrap">
				    <input class="file-upload-input" type='file' name="image_path" onchange="readURL(this);" accept="image/*" />
				    <div class="drag-text">
				      <h3>Click or Drag & Drop an image</h3>
				    </div>
				  </div>
				  <div class="file-upload-content">
				    <img class="file-upload-image" src="#" alt="your image" />
				    <div class="image-title-wrap">
				      <button type="button" onclick="removeUpload()" class="remove-image">Remove</button>
				    </div>
				  </div>
				</div>
			</div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="submit"  class="btn btn-primary saveComment">Save </button>
	      </div>
      
    </div>
    </form>
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
  	<form enctype="multipart/form-data" method="POST" action="{{ route('addanswertoquestion') }}" autocomplete="off">
  		{{ csrf_field() }}
    <div class="modal-content">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="modal-content">
      <div class="modal-header">
      	<input type="text" hidden name="qId" id="qId_hidden"/>
        <h5 class="modal-title" id="exampleModalLabel1">New answer to question</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		<div class="form-group">
			<label for="message-text" class="form-control-label">Answer:</label>
			<textarea class="form-control" name="data" id="commentText1"></textarea>
		</div>
		<div class="form-group">
			<div class="file-upload">
			  <div class="image-upload-wrap">
			    <input class="file-upload-input" type='file' name="image_path" onchange="readURL(this);" accept="image/*" />
			    <div class="drag-text">
			      <h3>Click or Drag & Drop an image</h3>
			    </div>
			  </div>
			  <div class="file-upload-content">
			    <img class="file-upload-image" src="#" alt="your image" />
			    <div class="image-title-wrap">
			      <button type="button" onclick="removeUpload()" class="remove-image">Remove</button>
			    </div>
			  </div>
			</div>
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary saveAnswer">Save </button>
      </div>
    </div>
    </form>
  </div>
</div>
</div>
<!---->


<div id="fh5co-tours" class="fh5co-section-gray">
	<div class="container">
				<div class="col-md-8 col-md-offset-2 text-center heading-section animate-box fadeInUp animated">
						<h3>Q&A</h3>
					</div>
			</div>
			<div class="container">
				<div class="row">
					<!--comments section-->
	<div class="comments-container">
			@if (Auth::check())
			<div class="newComment">
				<div>
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Add a new question</button>
				</div>
			</div>
			@endif
		<ul id="comments-list" class="comments-list">
			@foreach ($country->questions as $q)
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
							@if($q->img_path != null)
								<img class="question-image" style="width: 150px;height:120px;"  src="{{ url('/uploads/questions')}}/{{$q->img_path}}" alt=""></img><br>
							@endif
							<p style="text-align: left">{{$q->body}}</p>
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
								@if($a->img_path != null)
									<img class="question-image" style="width: 150px;height:120px;"  src="{{ url('/uploads/answers')}}/{{$a->img_path}}" alt=""></img><br><hr>
								@endif
								<p style="text-align: left">{{$a->body}}</p>
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
			</div>
</div>


<script type="text/javascript">
	$(document).ready(function(){
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
			var url = "{{route('editquestion')}}";
			
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
				}
			});
	    	
	    });
	    
	    
	    $(".fa-heart").click(function(e)
	    {
	    	var url = "{{route('addlike')}}";
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
	    	var url = "{{route('deletequestion')}}";
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
	    
	    
	    $('.showAnswerModal').click(function(){
	    	var qid = $(this).children().attr('qustionIdA');
	    	$('#qId_hidden').val(qid);
	    })

	    
	});
	function readURL(input) {
  if (input.files && input.files[0]) {

    var reader = new FileReader();

    reader.onload = function(e) {
      $('.image-upload-wrap').hide();

      $('.file-upload-image').attr('src', e.target.result);
      $('.file-upload-content').show();

      $('.image-title').html(input.files[0].name);
    };

    reader.readAsDataURL(input.files[0]);

  } else {
    removeUpload();
  }
}

function removeUpload() {
  $('.file-upload-input').replaceWith($('.file-upload-input').clone());
  $('.file-upload-content').hide();
  $('.image-upload-wrap').show();
}
$('.image-upload-wrap').bind('dragover', function () {
		$('.image-upload-wrap').addClass('image-dropping');
	});
	$('.image-upload-wrap').bind('dragleave', function () {
		$('.image-upload-wrap').removeClass('image-dropping');
});

</script>

<script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js'></script>
<script src="{!! asset('pages/showcountry/showcountry.js') !!}"></script>



@endsection
