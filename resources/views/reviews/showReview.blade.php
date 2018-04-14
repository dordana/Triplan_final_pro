@extends('layouts.app')

@section('content')


<style type="text/css">
* {
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}

body {
  color: #323232;
}

article .article-header {
  width: 100%;
  height: 66vh;
  background-image: url(http://aweinclusive.com/wp-content/uploads/2017/02/travel-background-1469438756vUG.jpg);
  background-size: cover;
  background-position: center;
}
article .article-header.second-hero {
  margin-top: 100px;
  background-image: url(https://cdn-images-1.medium.com/max/1200/1*lObaO71yu1ff75NFismu7Q.jpeg);
}
article .article-content {
  width: 950px;
  background: white;
  margin: -100px auto;
  padding: 50px 150px;
}
article .article-content h2 {
  padding-top: 30px;
  border-top: 1px dotted #a0a0a0;
  margin-top: 15px;
}
article .article-content .article-meta {
  margin-bottom: 30px;
  padding-bottom: 30px;
  border-bottom: 1px dotted #a0a0a0;
}
article .article-content .article-meta time:after {
  content: " • ";
}
article .article-content figure figcaption {
  float: left;
  width: 100px;
  font-family: "Source Code Pro", monospace;
  font-size: 14px;
  color: #a0a0a0;
  text-align: right;
  margin: 20px 0 0 -170px;
  border-top: 1px dotted #a0a0a0;
  padding-top: 10px;
}
article .article-content figure img {
  float: left;
}
article .article-content figure.fig-half img {
  width: 50%;
  float: left;
  margin: 30px 30px 30px -50px;
}
article .article-content .quote-bubble {
  display: block;
  float: left;
}
article .article-content .quote-bubble svg {
  margin: 53px 0 0 -60px;
}
article .article-content blockquote {
  padding: 30px 0;
  margin: 30px auto;
  border-top: 1px dotted #a0a0a0;
  border-bottom: 1px dotted #a0a0a0;
}
article .article-footer {
  width: 100%;
  height: 33vh;
  padding: 30px;
  text-align: center;
}
article .article-footer p {
  font-family: "Source Sans Pro", sans-serif;
  font-weight: 700;
  font-size: 30px;
  width: 50%;
  margin: 0 auto 30px;
  padding-bottom: 30px;
  border-bottom: 1px dotted #a0a0a0;
}
article .article-footer a {
  padding-top: 60px;
  font-family: "Source Code Pro", monospace;
  font-style: normal;
}

.headline {
  font-family: "Source Sans Pro", sans-serif;
  font-size: 60px;
  font-weight: 700;
  line-height: 1em;
  margin-bottom: 30px;
  text-align: center;
}




.headline1 {
  font-family: "Source Sans Pro", sans-serif;
  font-size: 30px;
  line-height: 1em;
  margin-bottom: 30px;
  text-align: center;
}

.subheadline {
  font-family: "Source Sans Pro", sans-serif;
  font-weight: 700;
  font-size: 30px;
  text-transform: uppercase;
  margin-top: 60px;
}

.article-meta {
  text-align: center;
  text-transform: uppercase;
  color: #a0a0a0;
}
.article-meta time:after {
  content: "  ";
}

p {
  font-size: 18px;
  line-height: 1.6em;
}

a {
  border-bottom: 1px dotted #a0a0a0;
  text-decoration: none;
  color: #323232;
  /*font-style: italic;*/
}

blockquote {
  text-align: left;
  text-transform: uppercase;
  color: #a0a0a0;
  font-family: "Source Sans Pro", sans-serif;
  font-weight: 400;
  font-size: 31px;
  margin: 0;
}
blockquote:before {
  content: "«";
}
blockquote:after {
  content: "»";
}

img{
    width: 100% !important;
}


/*Rate*/
/*******************************************
  = LESS
*******************************************/
/* LESS - Mixins */
/*******************************************
  = TYPOGRAPHY
*******************************************/

/*******************************************
  = LAYOUT
*******************************************/
* {
  -webit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  margin: 0;
  padding: 0;
  border: 0;
}
/*******************************************
  = RATING
*******************************************/
/* RATING - Form */
.rating-form {
  margin-top: 40px;
}
/* RATING - Form - Group */
.rating-form .form-group {
  position: relative;
  border: 0;
}
/* RATING - Form - Legend */
.rating-form .form-legend {
  display: none;
  margin: 0;
  padding: 0;
  font-size: 20px;
  font-size: 2rem;
  /*background: green;*/
}
/* RATING - Form - Item */
.rating-form .form-item {
  position: relative;
  margin: auto;
  width: 300px;
  text-align: center;
  direction: rtl;
  /*background: green;*/
}
.rating-form .form-legend + .form-item {
  padding-top: 10px;
}
.rating-form input[type='radio'] {
  position: absolute;
  left: -9999px;
}
/* RATING - Form - Label */
.rating-form label {
  display: inline-block;
  cursor: pointer;
}
.rating-form .rating-star {
  display: inline-block;
  position: relative;
}
.rating-form input[type='radio'] + label:before {
  content: attr(data-value);
  position: absolute;
  right: 30px;
  top: 83px;
  font-size: 30px;
  font-size: 3rem;
  opacity: 0;
  direction: ltr;
  -webkit-transition: all 0s ease 0s;
  -moz-transition: all 0s ease 0s;
  -o-transition: all 0s ease 0s;
  transition: all 0s ease 0s;
  -webkit-transition: all 0.2s ease-in-out;
  -moz-transition: all 0.2s ease-in-out;
  -o-transition: all 0.2s ease-in-out;
  transition: all 0.2s ease-in-out;
}
.rating-form input[type='radio']:checked + label:before {
  right: 25px;
  opacity: 1;
}
.rating-form input[type='radio'] + label:after {
  content: "/ 5";
  position: absolute;
  right: 5px;
  top: 96px;
  font-size: 16px;
  font-size: 1.6rem;
  opacity: 0;
  direction: ltr;
  -webkit-transition: all 0s ease 0s;
  -moz-transition: all 0s ease 0s;
  -o-transition: all 0s ease 0s;
  transition: all 0s ease 0s;
  -webkit-transition: all 0.2s ease-in-out;
  -moz-transition: all 0.2s ease-in-out;
  -o-transition: all 0.2s ease-in-out;
  transition: all 0.2s ease-in-out;
}
.rating-form input[type='radio']:checked + label:after {
  /*right: 5px;*/
  opacity: 1;
}
.rating-form label .fa {
  font-size: 60px;
  font-size: 6rem;
  line-height: 60px;
  -webkit-transition: all 0s ease 0s;
  -moz-transition: all 0s ease 0s;
  -o-transition: all 0s ease 0s;
  transition: all 0s ease 0s;
  -webkit-transition: all 0.2s ease-in-out;
  -moz-transition: all 0.2s ease-in-out;
  -o-transition: all 0.2s ease-in-out;
  transition: all 0.2s ease-in-out;
}
.rating-form label:hover .fa-star-o,
.rating-form label:focus .fa-star-o,
.rating-form label:hover ~ label .fa-star-o,
.rating-form label:focus ~ label .fa-star-o,
.rating-form input[type='radio']:checked ~ label .fa-star-o {
  opacity: 0;
}
.rating-form label .fa-star {
  position: absolute;
  left: 0;
  top: 0;
  opacity: 0;
}
.rating-form label:hover .fa-star,
.rating-form label:focus .fa-star,
.rating-form label:hover ~ label .fa-star,
.rating-form label:focus ~ label .fa-star,
.rating-form input[type='radio']:checked ~ label .fa-star {
  opacity: 1;
}
.rating-form input[type='radio']:checked ~ label .fa-star {
  color: gold;
}
.rating-form .ir {
  position: absolute;
  left: -9999px;
}
/* RATING - Form - Action */
.rating-form .form-action {
  opacity: 0;
  position: absolute;
  left: 5px;
  bottom: -40px;
  -webkit-transition: all 0s ease 0s;
  -moz-transition: all 0s ease 0s;
  -o-transition: all 0s ease 0s;
  transition: all 0s ease 0s;
  -webkit-transition: all 0.2s ease-in-out;
  -moz-transition: all 0.2s ease-in-out;
  -o-transition: all 0.2s ease-in-out;
  transition: all 0.2s ease-in-out;
}
.rating-form input[type='radio']:checked ~ .form-action {
  cursor: pointer;
  opacity: 1;
}
.rating-form .btn-reset {
  display: inline-block;
  margin: 0;
  padding: 4px 10px;
  border: 0;
  font-size: 10px;
  font-size: 1rem;
  background: #fff;
  color: #333;
  cursor: auto;
  border-radius: 5px;
  outline: 0;
  -webkit-transition: all 0s ease 0s;
  -moz-transition: all 0s ease 0s;
  -o-transition: all 0s ease 0s;
  transition: all 0s ease 0s;
  -webkit-transition: all 0.2s ease-in-out;
  -moz-transition: all 0.2s ease-in-out;
  -o-transition: all 0.2s ease-in-out;
  transition: all 0.2s ease-in-out;
}
.rating-form .btn-reset:hover,
.rating-form .btn-reset:focus {
  background: gold;
}
.rating-form input[type='radio']:checked ~ .form-action .btn-reset {
  cursor: pointer;
}
/* RATING - Form - Output */
.rating-form .form-output {
  display: none;
  position: absolute;
  right: 15px;
  bottom: -45px;
  font-size: 30px;
  font-size: 3rem;
  opacity: 0;
  -webkit-transition: all 0s ease 0s;
  -moz-transition: all 0s ease 0s;
  -o-transition: all 0s ease 0s;
  transition: all 0s ease 0s;
  -webkit-transition: all 0.2s ease-in-out;
  -moz-transition: all 0.2s ease-in-out;
  -o-transition: all 0.2s ease-in-out;
  transition: all 0.2s ease-in-out;
}
.no-js .rating-form .form-output {
  right: 5px;
  opacity: 1;
}
.rating-form input[type='radio']:checked ~ .form-output {
  right: 5px;
  opacity: 1;
}

/**/

</style>

<p id="pageName" hidden >Reviews</p>
<article id="top">
	<header class="article-header">
		<div class="hero"></div>
	</header>
	<section id="headline" class="article-content">
		<h2  class="headline">{{$review->title}}{{$review->id}}</h2>
		<h4 class="headline1">{{$review->type}}</h4>
		<div class="article-meta">
			<time datetime="2015-09-30 09:00">{{ Carbon\Carbon::parse( $review->created_at->diffForHumans())->format('d-m-Y') }}</time>
			<span class="author">{{App\User::find($review->user_id)->username}}</span>
		</div>
		
		
		<!---->
<div id="carousel-example" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
      <li data-target="#carousel-example" data-slide-to="0" class="active"></li>
    @for ($i = 1; $i < count($review->photos)+1; $i++)
        <li data-target="#carousel-example" data-slide-to="{{$i}}"></li>
    @endfor
  </ol>

  <div class="carousel-inner">
    <div class="item active">
      <a href="#"><img src="{{ url('/uploads/reviews')}}/{{$review->mainpic}}" /></a>
    </div>
    
    @foreach($review->photos as $photo)
    <div class="item">
      <a href="#"><img src="{{ url('/uploads/reviews') }}/{{$photo->path}}"/></a>
    </div>
    @endforeach
    
  </div>

  <a class="left carousel-control" href="#carousel-example" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
  </a>
  <a class="right carousel-control" href="#carousel-example" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
  </a>
</div>

	            <p>{{$review->body}}</p>
	<br>
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
<h2  class="headline1">Did you like it?</h2>

<!-- RATING - Form -->
<form class="rating-form">
  <fieldset class="form-group">
    <div class="form-item">
        
      <input id="rating-5" name="rating" type="radio" value="5" />
      <label for="rating-5" data-value="5">
        <span class="rating-star">
          <i class="fa fa-star-o"></i>
          <i class="fa fa-star"></i>
        </span>
        <span class="ir">5</span>
      </label>
      
      <input id="rating-4" name="rating" type="radio" value="4" />
      <label for="rating-4" data-value="4">
        <span class="rating-star">
          <i class="fa fa-star-o"></i>
          <i class="fa fa-star"></i>
        </span>
        <span class="ir">4</span>
      </label>
      
      <input id="rating-3" name="rating" type="radio" value="3" />
      <label for="rating-3" data-value="3">
        <span class="rating-star">
          <i class="fa fa-star-o"></i>
          <i class="fa fa-star"></i>
        </span>
        <span class="ir">3</span>
      </label>
      
      <input id="rating-2" name="rating" type="radio" value="2" />
      <label for="rating-2" data-value="2">
        <span class="rating-star">
          <i class="fa fa-star-o"></i>
          <i class="fa fa-star"></i>
        </span>
        <span class="ir">2</span>
      </label>
      
      <input id="rating-1" name="rating" type="radio" value="1" />
      <label for="rating-1" data-value="1">
        <span class="rating-star">
          <i class="fa fa-star-o"></i>
          <i class="fa fa-star"></i>
        </span>
        <span class="ir">1</span>
      </label>
      
    </div>
    
  </fieldset>
</form>


	</section>

</article>

	<br><br><br>	<br><br><br>
<script type="text/javascript">
    $('input:radio').click(function(){
        var id = '{{$review->id}}';
        var rate = $(this).val();
        var url = 'rating';
        $.ajaxSetup({
    		headers: {
    			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    		}
    	});
        $.ajax({
        	type: 'ajax',
        	method: 'post',
        	url: url,
        	data: {id:id,rate:rate},
        	async: false,
        	dataType: 'json',
        	success: function(data){
        	    console.log(data);
        	},
        	error: function(data){
        	    console.log(data);
        	}
        });
    });

</script>
@endsection