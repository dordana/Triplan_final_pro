@extends('layouts.app')

@section('content')

<link href="{!! asset('pages/countries/countries.css') !!}" rel="stylesheet" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" type="text/css" />
<p id="pageName" hidden >Countries</p>
<div class="fh5co-hero">
	<div class="fh5co-overlay"></div>
	<div class="fh5co-cover" style="background-image: url('https://2xd7m81yfswf20bam1231iux-wpengine.netdna-ssl.com/wp-content/uploads/2014/08/CoreValues-2500x1250.jpg');">
		<div class="desc desc1">
			<div class="col-sm-7 col-sm-push-1 col-md-7 col-md-push-1">
				<p>HandCrafted by <a href="http://frehtml5.co/" target="_blank" class="fh5co-site-name">FreeHTML5.co</a></p>
				<h2>Exclusive Limited Time Offer</h2>
				<h3>Fly to Hong Kong via Los Angeles, USA</h3>
				<span class="price">$599</span>
				 <p><a class="btn btn-primary btn-lg" href="#fh5co-tours">Get Started</a></p> 
			</div>
		</div>
	</div>
</div>



<div id="fh5co-tours" class="fh5co-section-gray">
	<div class="container">
		<div class="row">


@foreach ($countries as $country)
<div class="col-lg-4 wrapper">
	<div class="card radius shadowDepth1">
		<div class="card__image border-tlr-radius">
			<img src="{{ url('/uploads/countries') }}/{{$country->mainpic}}" alt="image" class="border-tlr-radius">
        </div>

		<div class="card__content card__padding">
            <div class="card__share">
                <div class="card__social">  
                    <a class="share-icon facebook" href="#"><span class="fa fa-facebook"></span></a>
                    <a class="share-icon twitter" href="#"><span class="fa fa-twitter"></span></a>
                    <a class="share-icon googleplus" href="#"><span class="fa fa-google-plus"></span></a>
                </div>

                <a id="share" class="share-toggle share-icon" href="#"></a>
            </div>
			<div class="card__meta">
				<a href="#">{{$country->continent}}</a>
			</div>

			<article class="card__article">
				<h2><a href="{{route('show-countrydetalis',['name' => $country->name])}}">{{$country->name}}</a></h2>

				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus harum...</p>
			</article>
		</div>
        
		<div class="card__action">
			
			<div class="card__author">
				<img src="" alt="">
				<div class="card__author-content">
					By <a href="#">John Doe</a>
				</div>
			</div>
		</div>
	</div>

</div>				    
@endforeach
		</div>
	</div>
</div>
<script src="{!! asset('pages/countries/countries.js') !!}"></script>	
@endsection