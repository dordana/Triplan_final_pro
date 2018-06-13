@extends('layouts.app')
@section('content')

<script type="text/javascript" >
	document.title = 'Triplan - My Favorites';
</script>
<style type="text/css">
@import url(https://fonts.googleapis.com/css?family=Raleway);
.snip1551 {
  font-family: 'Raleway', sans-serif;
  position: relative;
  display: inline-block;
  overflow: hidden;
  margin: 8px;
  width: 361px;
  color: #ffffff;
  font-size: 16px;
  background-color: #000000;
}

.snip1551 * {
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
  -webkit-transition: all 0.35s ease;
  transition: all 0.35s ease;
}

.snip1551 img {
  vertical-align: top;
  max-width: 100%;
  backface-visibility: hidden;
}

.snip1551 figcaption {
  position: absolute;
  top: 15px;
  bottom: 15px;
  left: 15px;
  right: 15px;
  z-index: 1;
  border: 1px solid #ffffff;
  overflow: hidden;
  padding: 0;
}

.snip1551 h3 {
  position: absolute;
  right: 0;
  bottom: 0;
  padding: 7px 15px;
  margin: 0;
  font-weight: normal;
  font-size: 1em;
  letter-spacing: 2px;
  display: inline-block;
  border-top: 1px solid #fff;
  border-left: 1px solid #fff;
  background-color: rgba(0, 0, 0, 0.8);
  -webkit-transform: translate(0%, 100%);
  transform: translate(0%, 100%);
  color: rgba(255, 255, 255, 0);
}

.snip1551 a {
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  z-index: 1;
}


.snip1551:hover h3,
.snip1551.hover h3 {
  -webkit-transform: translate(0%, 0%);
  transform: translate(0%, 0%);
  color: #ffffff;
}
#favoritesGrid{
	margin: 0 100px;
}
</style>

<p id="pageName" hidden >123</p>
<div id="fh5co-blog-section" class="fh5co-section-gray">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">
				<h3>My Favorites Attractions</h3>
			</div>
		</div>
	</div>
	<div id="favoritesGrid" class="container">
		@foreach( $userAttractions as $fav)
			<figure class="snip1551">
			  <img width="360px" height="270px" src="{{ url('/uploads/attractions') }}/{{$fav->mainpic}}" alt="sample69" />
			  <figcaption>
			    <h3>{{$fav->name}}</h3>
			  </figcaption>
			  <a href="{{route('showattraction', $fav->id)}}"></a>
			</figure>
    	@endforeach	
	</div>
	    	
</div>





@endsection