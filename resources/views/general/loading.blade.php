@extends('layouts.empty')
@section('content')

<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Loading...</title>
  <meta name="description" content="Loading...">
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

  <style type="text/css">
      @import url(https://fonts.googleapis.com/css?family=Roboto:400,900italic,900,700italic,700,500italic,500,400italic,300italic,300,100italic,100);
* {
  box-sizing: border-box;
  margin: 0;
}

h1, p, h2, h3, h4, ul, li, div {
  margin: 0;
  padding: 0;
}

body {
  padding: 0;
  width: 100vw;
  height: 100vh;
  overflow: hidden;
  display: flex;
  font-family: Futura;
}
.container{
      position: relative;
    top: 350px;
}
.loading-page {
  background: white;
  width: 100vw;
  height: 100vh;
  justify-content: center;
  align-items: center;
}
.loading-page .counter {
  text-align: center;
      position: absolute;
    top: 100px;
}
.loading-page .counter p {
  font-size: 40px;
  font-weight: 100;
  color: #DF8542;
}
.loading-page .counter h1 {
  color: #DF8542;
  font-size: 60px;
  margin-top: 0;
}
.loading-page .counter hr {
  background: #DF8542;
  border: none;
  height: 2px;
      width: 20%;
    margin: 0 auto;
    display: block;
}
.loading-page .counter {
  position: center;
  width: 100%;
}
.loading-page .counter h1.abs {
  position: center;
  top: 0;
  width: 100%;
}
.loading-page .counter .color {
  width: 0px;
  overflow: hidden;
  color: #f60d54;
}
 #title{
   font-size:70px;
 }
 @import url(https://fonts.googleapis.com/css?family=Poppins:300,700);
.snip1581 {
  font-family: 'Poppins:400,700', Arial, sans-serif;
  position: relative;
  display: inline-block;
  overflow: hidden;
  margin: 8px;
  min-width: 250px;
  max-width: 310px;
  width: 100%;
  background-color: #000000;
  color: #ffffff;
  text-align: left;
  font-size: 16px;
  box-shadow: 0 0 5px rgba(0, 0, 0, 0.15);
}
.snip1581 * {
  -webkit-transition: all 0.35s;
  transition: all 0.35s;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
}
.snip1581 img {
  max-width: 100%;
  vertical-align: top;
}
.snip1581 figcaption {
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  padding: 20px;
  background-image: -webkit-linear-gradient(bottom, rgba(0, 0, 0, 0.8) 0%, transparent 100%);
  background-image: linear-gradient(to top, rgba(0, 0, 0, 0.8) 0%, transparent 100%);
  display: flex;
  flex-direction: column;
  justify-content: flex-end;
}
.snip1581 h3 {
  font-size: 44px;
  font-weight: 400;
  line-height: 1;
  letter-spacing: 1px;
  text-transform: uppercase;
  margin: 3px 0;
}
.snip1581 .title1 {
  font-weight: 700;
}
.snip1581 .title2 {
  color: #a58e7c;
  font-weight: 300;
}
.snip1581 .title3 {
  font-weight: 700;
  font-size: 25px;
}
.snip1581 a {
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
}
.snip1581:hover img,
.snip1581.hover img {
  -webkit-transform: scale(1.3) rotate(5deg);
  transform: scale(1.3) rotate(5deg);
}
/* Demo purposes only */
body {
  background-color: #212121;
  text-align: center;
}
  </style>
</head>

<body>
    <div class="loading-page">
      <div class="counter">
        <p id="title">Now it is our turn to work</p>
        <p>As we prepare the optimal trip for you, please share us with your friends</p>
        <h1>0%</h1>
        <hr/>
      </div>
      
    <div class="container">
      <div class="row">
<figure class="snip1581"><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/pr-sample4.jpg" alt="profile-sample2"/>
  <figcaption>
    <h3 class="title1">The</h3>
    <h3 class="title2">Winter</h3>
    <h3 class="title3">Collection</h3>
  </figcaption><a href="#"></a>
</figure>
      </div>
    </div>
    </div>
    
    
 
    
    
    
  <script>
$(document).ready(function() {
  
  var counter = 0;
  var c = 0;
  var i = setInterval(function(){
      $(".loading-page .counter h1").html(c + "%");
      $(".loading-page .counter hr").css("width", c + "%");
    counter++;
    c++;
    if(counter == 101) {
        clearInterval(i);
        var request = {!! json_encode($request)!!};
        console.log(request);
        document.location.href="{!! route('tripbuilder', $request); !!}";
    }
  }, 80);
});
  </script>
</body>
</html>

@endsection