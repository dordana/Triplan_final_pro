@extends('layouts.empty')
@section('content')
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns:v="urn:schemas-microsoft-com:vml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;" />
    <meta name="viewport" content="width=600,initial-scale = 2.3,user-scalable=no">
<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css'>
<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
<style type="text/css">
    
body{
    font-family: 'Montserrat', sans-serif !important;
}
.container1 {
  padding: 15px;
  width:70%;
  margin:0 auto;
  display:block;
}
.clearfloat {
  content: '';
  display: block;
  clear: both;
}
.cards {
  list-style: none;
  margin: 0;
  padding: 0;
  text-align: center;
}
.cards li {
  padding: 20px;
  border: 1px solid rgba(0, 0, 0, 0.2);
  border-radius: 25px;
  box-shadow: 0 0 15px rgba(0, 0, 0, 0.5);
  transition: all 0.2s ease-in-out;
  text-align: center;
  width: 100%;
}
.cards li:after,
.cards li:before {
  content: '';
  display: block;
  clear: both;
}
.cards li img {
  display: inline-block;
  width: 100%;
  height: auto;
  max-width: 330px;
  float: left;
  box-shadow: 0 0 2px rgba(0, 0, 0, 0.5);
  transition: all 0.5s ease-in-out;
}
.cards li .details {
  float: left;
    text-align: left;
    transition: all 0.5s ease-in-out;
    text-shadow: 1px 1px rgba(0, 0, 0, 0);
    min-width: 250px;
    line-height: 40px;
}
.cards li .details > span,
.cards li .details > a {
  display: block;
  padding: 0 15px 0 35px;
  margin-bottom: 15px;
  text-decoration: none;
  position: relative;
}
.cards li .details > span:before,
.cards li .details > a:before {
  display: inline-block;
  font: normal normal normal 13px/1 FontAwesome;
  text-rendering: auto;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  margin-right: 15px;
  width: 15px;
  text-align: center;
  color: #444;
}
.cards li .details a {
  color: #57893c;
  transition: color 0.5s ease-in-out;
}
.cards li .details a:hover,
.cards li .details a:focus {
  color: #97c77e;
  transition: color 0.5s ease-in-out;
}
.cards li .details .name {
  font-weight: 600;
}
.cards li .details .name:before {
  content: "\f2c0";
}
.cards li .details .title:before {
  content: "\f2c1";
}
.cards li .details .phone:before {
  content: "\f095";
}
.cards li .details .email:before {
  content: "\f003";
}
.cards li:hover {
  background: rgba(235, 237, 189, 0.5);
  transition: all 0.2s ease-in-out;
  -webkit-transform: scale(1.03);
          transform: scale(1.03);
}
.cards li:hover img {
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.6);
  transition: all 0.4s ease-in-out;
}
.cards li:hover .details {
  transition: all 0.5s ease-in-out;
  text-shadow: 1px 1px #dfe295;
}
@media (max-width: 550px) {
  .cards li {
    display: block;
    width: auto;
    max-width: 200px;
    margin: 30px auto;
  }
  .cards li img,
  .cards li .details {
    float: none;
  }
  .cards li img {
    margin: 0 auto;
  }
  .cards li .details {
    margin-top: 20px;
    text-align: center;
    min-width: 0;
  }
  .cards li .details span,
  .cards li .details a {
    padding: 0;
    white-space: break-all;
    word-wrap: break-word;
  }
  .cards li .details span:before,
  .cards li .details a:before {
    display: none;
  }
  
}
h1{
    text-align:center;
    margin-bottom: 50px;
    margin-top: 30px;
    font-size: 35px;
}
.head_li{
      width: 50% !important;
    margin: 0 auto!important;
    font-size: 24px;
}
.det{
  float:none !important;
}
.pathname{
  text-align:center;
  font-size:50px;
  color: orange ;
}
.button{
  top: 3% !important;
    position: absolute !important;
    left: 2% !important;
}
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.9/semantic.min.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.9/semantic.min.js"></script>
</head>
<body>
  <a class="btn btn-primary back" href="#"></a>
<h1 class="pathname">{{$array[0]->pathname}}</h1>
<button class="ui orange basic button" onClick="history.go(-1);">Back</button>
@foreach($array as $day)
<div class="container1">
  <ul class="cards day">
     <li class="head_li">
      <div class="details det">
        <h2 class="daytitle" style="text-align:center">{{$day->day}}</h2>
        <h2 class="daytitle" style="text-align:center">{{$day->time}}</h2>
        <h2 class="daytitle" style="text-align:center">{{intval($day->distance)/1000}} km</h2>
        <h2 class="daytitle" style="text-align:center">Number of attractions: {{count($day->attractions)-1}}</h2>
      </div>
    </li>
     <li>
      <iframe
		  width="100%" 
		  height="300" 
		  frameborder="0" style="border:0"
		  src="https://www.google.com/maps/embed/v1/place?key=AIzaSyAiTGDJkinOXMY9hc248cZ4hshRz6Mtq-c&q={{$day->attractions[0]->lat}}+,+{{$day->attractions[0]->lng}}&zoom=12.5&maptype=roadmap" allowfullscreen>
		</iframe>
    </li>
    @for($i = 1; $i < count($day->attractions); $i++)
    <li>
      <img src="{{ url('/uploads/attractions') }}/{{App\Attraction::find($day->attractions[$i]->id)['mainpic']}}"/>
      <div class="details">
        <span class="name">{{App\Attraction::find($day->attractions[$i]->id)['name']}}</span>
        <span class="title">{{App\Attraction::find($day->attractions[$i]->id)['address']}}</span>
        <a class="phone" >{{App\Attraction::find($day->attractions[$i]->id)['telephone']}}</a>
        <a class="email" >{{App\Attraction::find($day->attractions[$i]->id)['type']}}</a>
      </div>
    </li>
    @endfor
  </ul>
</div>
<head>
@endforeach
@endsection