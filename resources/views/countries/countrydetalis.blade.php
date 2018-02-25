 @extends('layouts.app')

@section('content')

<link href="{!! asset('pages/showcountry/showcountry.css') !!}" rel="stylesheet" />
<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css'>
<!-- bootstrap carousel -->
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
	      <img src="{{ url('/uploads/countries') }}/{{$country->mainpic}}" style="width:1600px ;height: 800px;" alt="1.jpg" class="img-responsive">
	      <div class="carousel-caption">
	      </div>
	    </div>
      @foreach ($country->photos as $photo)
	    <div class="item">
	      <img src="{{ url('/uploads/countries') }}/{{$photo->path}}" style="width:1600px ;height: 800px;" alt="1.jpg" class="img-responsive">
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
	  	<li><img src="{{ url('/uploads/countries') }}/{{$country->mainpic}}" style="width:120px;height:100px;" alt="1_tn.jpg"></li>
	    @foreach ($country->photos as $photo)
	  	<li><img src="{{ url('/uploads/countries') }}/{{$photo->path}}" style="width:120px;height:100px;" alt="1_tn.jpg"></li>
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
									<h4><a href="#">Voluptat</a></h4>
									<!-- Paragraph -->
									<p>Sed ut perspic iatis unde omnis iste natus error unde omnis iste natus error sit volupt atem.</p>
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
									<h4><a href="#">Deserunt</a></h4>
									<!-- Paragraph -->
									<p>Sed ut perspic iatis unde omnis iste natus error unde omnis iste natus error sit volupt atem.</p>
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
									<h4><a href="#">Righteous</a></h4>
									<!-- Paragraph -->
									<p>Sed ut perspic iatis unde omnis iste natus error unde omnis iste natus error sit volupt atem.</p>
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
									<h4><a href="#">Pursue</a></h4>
									<!-- Paragraph -->
									<p>Sed ut perspic iatis unde omnis iste natus error unde omnis iste natus error sit volupt atem.</p>
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
									<h4><a href="#">Denounc</a></h4>
									<!-- Paragraph -->
									<p>Sed ut perspic iatis unde omnis iste natus error unde omnis iste natus error sit volupt atem.</p>
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
									<h4><a href="#">Corporis</a></h4>
									<!-- Paragraph -->
									<p>Sed ut perspic iatis unde omnis iste natus error unde omnis iste natus error sit volupt atem.</p>
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
									<h4><a href="#">Dolorem</a></h4>
									<!-- Paragraph -->
									<p>Sed ut perspic iatis unde omnis iste natus error unde omnis iste natus error sit volupt atem.</p>
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
								<h3><a href="#">neighbers</a></h3>
								<!-- Hover -->
								<div class="ui-hover">
									<!-- Heading -->
									<h4><a href="#">Finibus</a></h4>
									<!-- Paragraph -->
									<p>Sed ut perspic iatis unde omnis iste natus error unde omnis iste natus error sit volupt atem.</p>
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
      <img src="https://new.goisrael.com/sites/default/files/styles/1397x735_article_full/public/Tel%20Aviv%201397X735.jpg?itok=lbqTrLtj" alt="" />
    </div>
    <div class="item-text1">
      <div class="item-text-wrapper1">
        <p class="item-text-dek1">{{$city->name}}</p>
        <h2 class="item-text-title1">Facebook in material design</h2>
      </div>
    </div>
    <a class="item-link1" href="https://dribbble.com/shots/2958133-Facebook-in-material-design">Facebook in material design</a>
  </div>
  @endforeach
</div>





	<br><br><br>




<!--Q&A section-->
<div class="containerqa">
  <div class="response-group">
    <header>
      	<div class="col-md-8 col-md-offset-2 text-center heading-section animate-box fadeInUp animated">
						<h3>Q&A</h3>
					</div>
    </header>
    <br><br><br>
    <div class="response">
      <div class="post-group">
        @foreach ($country->questions as $q)
        <div class="post">
          <div class="post__avatar">
          	<img class="quephoto" src="{{ url('/uploads/user-photos') }}/{{App\User::find($q->user_id)->profile_phote_path}}"></img>
          </div>
          <h3 class="post__author">
            {{App\User::find($q->user_id)->firstname}}
          </h3>
          <h4 class="post__author">
            {{$q->title}} 
          </h4>
          <h5 class="post__timestamp">
            {{$q->created_at}} 
          </h5>
          <p class="post__body">
			{{$q->body}} 
          </p>
          <div class="post__actions">
            <div class="button button--approve">
              <i class="fa fa-thumbs-o-up"></i><i class="fa fa-thumbs-up solid"></i>
            </div>
            <div class="button button--deny">
              <i class="fa fa-thumbs-o-down"></i><i class="fa fa-thumbs-down solid"></i>
            </div>
            <div class="button button--fill comment-trigger">
              <input id="addcommenttext" type="text" name="" placeholder="Add a comment..."/>
            </div>
            <div class="button button--flag">
              <i class="fa fa-comment-o"></i><i class="fa fa-comment solid"></i>{{count($q->answers)}}
            </div>
            <div class="post__comments">
              <div class="comment-group">
              	 @foreach ($q->answers as $a)
                <div class="post">
                  <div class="post__avatar comment__avatar">
                  	<img class="ansphoto" src="{{ url('/uploads/user-photos') }}/{{App\User::find($a->user_id)->profile_phote_path}}"></img>
                  </div>
                  <h3 class="post__author">
                   {{App\User::find($a->user_id)->firstname}}
                  </h3>
                  <h4 class="post__timestamp">
                     {{$a->created_at}}
                  </h4>
                  <p class="post__body">
					{{$a->body}}
                  </p>
                </div>
                 @endforeach
              </div>
            </div>
          </div>
        </div>
        
        
        
        @endforeach
      </div>
    </div>
  </div>
</div>

<!--end Q&A section-->










<script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js'></script>
<script src="{!! asset('pages/showcountry/showcountry.js') !!}"></script>



@endsection
