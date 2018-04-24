@extends('layouts.empty')
@section('content')
<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css'>
<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
<link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
<style class="cp-pen-styles">
body {
  color: #444;
  font-size: 1em;
 font-family: 'Poppins', sans-serif;

}
.container {
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
  font-size: 0.9em;
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
  max-width: 200px;
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
header{
    margin: 0 auto;
    display:block;
    width: 500px;
    height: 250px;
    color:orange;
    font-size: 70px !important; 
}
</style>
<header>
    Triplan
</header>

<div class="container">
    <h1>Day1</h1>
  <ul class="cards day">
    <li><img src="https://images.unsplash.com/photo-1493666438817-866a91353ca9?ixlib=rb-0.3.5&amp;q=85&amp;fm=jpg&amp;crop=faces&amp;fit=crop&amp;cs=srgb&amp;s=1cd7edb2ed25c1de4908db807e545988&amp;w=150&amp;h=150"/>
      <div class="details"><span class="name">Emilia Jacobs</span><span class="title">UI/UX Designer</span><a class="phone" href="tel:123-456-789">123-456-789</a><a class="email" href="mailto:emilia.jacobs@email.com">emilia.jacobs@email.com</a></div>
    </li>
    <li><img src="https://images.unsplash.com/photo-1499057625772-bafa601ee80c?ixlib=rb-0.3.5&amp;q=85&amp;fm=jpg&amp;crop=faces&amp;fit=crop&amp;cs=srgb&amp;s=136e035a7d5740f54f2acaa940c07f0b&amp;w=150&amp;h=150"/>
      <div class="details"><span class="name">Tim Pawson</span><span class="title">Project Manager</span><a class="phone" href="tel:123-456-789">123-456-789</a><a class="email" href="mailto:tim.pawson@email.com">tim.pawson@email.com</a></div>
    </li>
    <li><img src="https://images.unsplash.com/photo-1477118476589-bff2c5c4cfbb?ixlib=rb-0.3.5&amp;q=85&amp;fm=jpg&amp;crop=faces&amp;fit=crop&amp;cs=srgb&amp;s=5ba0eb3fce2a3b77dd7d18bf1615ddee&amp;w=150&amp;h=150"/>
      <div class="details"><span class="name">Amanda Tyler</span><span class="title">Frontend Developer</span><a class="phone" href="tel:123-456-789">123-456-789</a><a class="email" href="mailto:amanda.tyler@email.com">amanda.tyler@email.com				</a></div>
    </li>
    <li><img src="https://images.unsplash.com/photo-1492562080023-ab3db95bfbce?ixlib=rb-0.3.5&amp;q=85&amp;fm=jpg&amp;crop=faces&amp;fit=crop&amp;cs=srgb&amp;s=952f907e565bc7c4c7eb53497510863f&amp;w=150&amp;h=150"/>
      <div class="details"><span class="name">Thomas Jones </span><span class="title">Fullstack Developer</span><a class="phone" href="tel:123-456-789">123-456-789</a><a class="email" href="mailto:tom.jones@email.com">tom.jones@email.com		</a></div>
    </li>
  </ul>
</div>
    

<div class="container day">
    <h1 style="text-align:center">Day2</h1>
  <ul class="cards">
    <li><img src="https://images.unsplash.com/photo-1493666438817-866a91353ca9?ixlib=rb-0.3.5&amp;q=85&amp;fm=jpg&amp;crop=faces&amp;fit=crop&amp;cs=srgb&amp;s=1cd7edb2ed25c1de4908db807e545988&amp;w=150&amp;h=150"/>
      <div class="details"><span class="name">Emilia Jacobs</span><span class="title">UI/UX Designer</span><a class="phone" href="tel:123-456-789">123-456-789</a><a class="email" href="mailto:emilia.jacobs@email.com">emilia.jacobs@email.com</a></div>
    </li>
    <li><img src="https://images.unsplash.com/photo-1499057625772-bafa601ee80c?ixlib=rb-0.3.5&amp;q=85&amp;fm=jpg&amp;crop=faces&amp;fit=crop&amp;cs=srgb&amp;s=136e035a7d5740f54f2acaa940c07f0b&amp;w=150&amp;h=150"/>
      <div class="details"><span class="name">Tim Pawson</span><span class="title">Project Manager</span><a class="phone" href="tel:123-456-789">123-456-789</a><a class="email" href="mailto:tim.pawson@email.com">tim.pawson@email.com</a></div>
    </li>
    <li><img src="https://images.unsplash.com/photo-1477118476589-bff2c5c4cfbb?ixlib=rb-0.3.5&amp;q=85&amp;fm=jpg&amp;crop=faces&amp;fit=crop&amp;cs=srgb&amp;s=5ba0eb3fce2a3b77dd7d18bf1615ddee&amp;w=150&amp;h=150"/>
      <div class="details"><span class="name">Amanda Tyler</span><span class="title">Frontend Developer</span><a class="phone" href="tel:123-456-789">123-456-789</a><a class="email" href="mailto:amanda.tyler@email.com">amanda.tyler@email.com				</a></div>
    </li>
    <li><img src="https://images.unsplash.com/photo-1492562080023-ab3db95bfbce?ixlib=rb-0.3.5&amp;q=85&amp;fm=jpg&amp;crop=faces&amp;fit=crop&amp;cs=srgb&amp;s=952f907e565bc7c4c7eb53497510863f&amp;w=150&amp;h=150"/>
      <div class="details"><span class="name">Thomas Jones </span><span class="title">Fullstack Developer</span><a class="phone" href="tel:123-456-789">123-456-789</a><a class="email" href="mailto:tom.jones@email.com">tom.jones@email.com		</a></div>
    </li>
  </ul>
</div>


<div class="container day">
    <h1 style="text-align:center">Day3</h1>
  <ul class="cards">
    <li><img src="https://images.unsplash.com/photo-1493666438817-866a91353ca9?ixlib=rb-0.3.5&amp;q=85&amp;fm=jpg&amp;crop=faces&amp;fit=crop&amp;cs=srgb&amp;s=1cd7edb2ed25c1de4908db807e545988&amp;w=150&amp;h=150"/>
      <div class="details"><span class="name">Emilia Jacobs</span><span class="title">UI/UX Designer</span><a class="phone" href="tel:123-456-789">123-456-789</a><a class="email" href="mailto:emilia.jacobs@email.com">emilia.jacobs@email.com</a></div>
    </li>
    <li><img src="https://images.unsplash.com/photo-1499057625772-bafa601ee80c?ixlib=rb-0.3.5&amp;q=85&amp;fm=jpg&amp;crop=faces&amp;fit=crop&amp;cs=srgb&amp;s=136e035a7d5740f54f2acaa940c07f0b&amp;w=150&amp;h=150"/>
      <div class="details"><span class="name">Tim Pawson</span><span class="title">Project Manager</span><a class="phone" href="tel:123-456-789">123-456-789</a><a class="email" href="mailto:tim.pawson@email.com">tim.pawson@email.com</a></div>
    </li>
    <li><img src="https://images.unsplash.com/photo-1477118476589-bff2c5c4cfbb?ixlib=rb-0.3.5&amp;q=85&amp;fm=jpg&amp;crop=faces&amp;fit=crop&amp;cs=srgb&amp;s=5ba0eb3fce2a3b77dd7d18bf1615ddee&amp;w=150&amp;h=150"/>
      <div class="details"><span class="name">Amanda Tyler</span><span class="title">Frontend Developer</span><a class="phone" href="tel:123-456-789">123-456-789</a><a class="email" href="mailto:amanda.tyler@email.com">amanda.tyler@email.com				</a></div>
    </li>
    <li><img src="https://images.unsplash.com/photo-1492562080023-ab3db95bfbce?ixlib=rb-0.3.5&amp;q=85&amp;fm=jpg&amp;crop=faces&amp;fit=crop&amp;cs=srgb&amp;s=952f907e565bc7c4c7eb53497510863f&amp;w=150&amp;h=150"/>
      <div class="details"><span class="name">Thomas Jones </span><span class="title">Fullstack Developer</span><a class="phone" href="tel:123-456-789">123-456-789</a><a class="email" href="mailto:tom.jones@email.com">tom.jones@email.com		</a></div>
    </li>
  </ul>
</div>
@endsection