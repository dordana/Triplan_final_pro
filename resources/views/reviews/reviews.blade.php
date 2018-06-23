@extends('layouts.app')

@section('content')
<script type="text/javascript" >
	document.title = 'Triplan - Reviews';
</script>
<link href="{!! asset('pages/reviews/reviews.css') !!}" rel="stylesheet" />
<p id="pageName" hidden >Reviews</p>
<style type="text/css">
	.moreInfo{
		display:block;
		margin: 0 auto;
		width:auto;
	}
</style>
<div id="fh5co-blog-section" class="fh5co-section-gray">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">
						<h3>Users Reviews</h3>
						<p>Here you can read other users reviews and recommendations <br>or even write few of your own!</br></p>
					</div>
				</div>
			</div>
			
			<div class="container">
			    @if (Auth::check())
    					<button type="button" class="btn btn-primary newReviewBtn">Add a new review</button>
    			@endif
				<div class="row row-bottom-padded-md">
					@foreach($reviews as $review)
					<div class="col-lg-4 col-md-4 col-sm-6 reviewItem">
						<div class="fh5co-blog animate-box">
							<a href="{{route('show-review', $review->id)}}"><img class="img-responsive" src="{{ url('/uploads/reviews')}}/{{$review->mainpic}}" alt=""></a>
							<div class="blog-text">
								<div class="prod-title" style="height:300px;">
									<h2 style="margin: 0"><a style="text-align: center;display: block;" href="{{route('show-review', $review->id)}}">{{$review->title}}</a>
										<br><span style="margin-top: 0;margin-bottom: 0 ;font-size:30px;text-align:center;display: block;">{{intval($review->rate)}}/5<span style="color:#efe63b;">&#9733;
											</span>
										</span>
									</h2>
									<span class="posted_by">{{ Carbon\Carbon::parse( $review->created_at->diffForHumans())->format('d-m-Y') }} &middot; Posted by {{App\User::find($review->user_id)->username}}</span>
									<p>{{substr($review->body, 0,60)}}...</p>
									<p><a class="moreInfo btn btn-primary" href="{{route('show-review', $review->id)}}">Learn More</a></p>
								</div>
							</div> 
						</div>
					</div>
					@endforeach
				</div>

			</div>
		</div>

<script type="text/javascript">
    $('.newReviewBtn').click(function(){
        window.location = "/addreview"
    })
</script>



<script src="{!! asset('pages/reviews/reviews.js') !!}"></script>	
@endsection