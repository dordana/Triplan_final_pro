 @extends('layouts.app')

@section('content')

    <!--<div class="container">-->
    <!--    <div class="row">-->
    <!--        <div class="col-md-12">-->
                
    <!--            <div class="content1"></div>-->
    <!--            <div class="box"></div>-->
                
    <!--            <div class="video-container single-video">-->
    <!--                @if($country->name == 'Israel')-->
    <!--                    <iframe width="560" height="315" src="https://www.youtube.com/embed/AoizSL-TEJQ" frameborder="0" allowfullscreen></iframe>-->
    <!--                @elseif($country->name == 'Brazil')-->
    <!--                    <iframe width="560" height="315" src="https://www.youtube.com/embed/EDSkaJEBlDU" frameborder="0" allowfullscreen></iframe>-->
    <!--                @elseif($country->name == 'France')-->
    <!--                    <iframe width="560" height="315" src="https://www.youtube.com/embed/_FYKIhJZdaI" frameborder="0" allowfullscreen></iframe>-->
    <!--                @elseif($country->name == 'Italy')-->
    <!--                    <iframe width="560" height="315" src="https://www.youtube.com/embed/G5cDcmnt-Ew" frameborder="0" allowfullscreen></iframe>-->
    <!--                @elseif($country->name == 'Spain')-->
    <!--                    <iframe width="560" height="315" src="https://www.youtube.com/embed/8ub4TzkAni8" frameborder="0" allowfullscreen></iframe>-->
    <!--                @elseif($country->name == 'United States Of America')-->
    <!--                    <iframe width="560" height="315" src="https://www.youtube.com/embed/MtCMtC50gwY" frameborder="0" allowfullscreen></iframe>-->
    <!--                @else-->
    <!--                    <iframe width="560" height="315" src="https://www.youtube.com/embed/OHAWwaYu2H0" frameborder="0" allowfullscreen></iframe>-->
    <!--                @endif-->
    <!--            </div>-->
                
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->
<div class="row carousel-part">
  <div class="col-md-12">
    
<div class="row carousel-part">
  <div class="col-md-12">
    

<div class="carousel fade-carousel slide" data-ride="carousel" data-interval="4000" id="bs-carousel">
  <!-- Overlay -->
  <div class="overlay"></div>

  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#bs-carousel" data-slide-to="0" class="active"></li>
    <li data-target="#bs-carousel" data-slide-to="1"></li>
    <li data-target="#bs-carousel" data-slide-to="2"></li>
    <li data-target="#bs-carousel" data-slide-to="3"></li>
  </ol>
  
  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item slides active">
      <div class="slide-1" style="background-image: url(https://wallpapercave.com/wp/wp1833748.jpg);"></div>
      <div class="hero">
        <hgroup>
            <h1>{{$country->name}}</h1>        
            <h3>Get start your next tour</h3>
        </hgroup>
      </div>
    </div>
    <div class="item slides">
      <div class="slide-2" style="background-image: url(http://www.xsjjys.com/data/out/128/WHDQ-512690637.jpg);"></div>
      <div class="hero">        
        <hgroup>
            <h1>{{$country->name}}</h1>        
            <h3>Get start your next dream</h3>
        </hgroup>       
      </div>
    </div>
    <div class="item slides">
      <div class="slide-3" style="background-image: url(https://i.ytimg.com/vi/7wUejbC3OxI/maxresdefault.jpg);"></div>
      <div class="hero">        
        <hgroup>
            <h1>{{$country->name}}</h1>        
            <h3>Get excited</h3>
        </hgroup>
      </div>
    </div>
    <div class="item slides">
      <div class="slide-4" style="background-image: url(http://missathletique.com/wp-content/uploads/2016/03/view-to-tel-aviv-from-carlton-roof-tip.jpg);"></div>
      <div class="hero">        
        <hgroup>
            <h1>{{$country->name}}</h1>        
            <h3>Amazing place to travel</h3>
        </hgroup>       
      </div>
    </div>
  </div> 
</div>
  </div>
</div>
<!--<div class="container">-->
<!--        <div class="row">-->
<!--            <div class="col-md-12">-->
                
<!--                <div class="content1"></div>-->
<!--                <div class="box"></div>-->
                
<!--                <div class="video-container single-video">-->
<!--                    @if($country->name == 'Israel')-->
<!--                        <iframe width="560" height="315" src="https://www.youtube.com/embed/AoizSL-TEJQ" frameborder="0" allowfullscreen></iframe>-->
<!--                    @elseif($country->name == 'Brazil')-->
<!--                        <iframe width="560" height="315" src="https://www.youtube.com/embed/EDSkaJEBlDU" frameborder="0" allowfullscreen></iframe>-->
<!--                    @elseif($country->name == 'France')-->
<!--                        <iframe width="560" height="315" src="https://www.youtube.com/embed/_FYKIhJZdaI" frameborder="0" allowfullscreen></iframe>-->
<!--                    @elseif($country->name == 'Italy')-->
<!--                        <iframe width="560" height="315" src="https://www.youtube.com/embed/G5cDcmnt-Ew" frameborder="0" allowfullscreen></iframe>-->
<!--                    @elseif($country->name == 'Spain')-->
<!--                        <iframe width="560" height="315" src="https://www.youtube.com/embed/8ub4TzkAni8" frameborder="0" allowfullscreen></iframe>-->
<!--                    @elseif($country->name == 'United States Of America')-->
<!--                        <iframe width="560" height="315" src="https://www.youtube.com/embed/MtCMtC50gwY" frameborder="0" allowfullscreen></iframe>-->
<!--                    @else-->
<!--                        <iframe width="560" height="315" src="https://www.youtube.com/embed/OHAWwaYu2H0" frameborder="0" allowfullscreen></iframe>-->
<!--                    @endif-->
<!--                </div>-->
                
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->

    <div class="container">
        <div class="row">

            <div class="col-lg-9 ">
                <div class="title">
                    <h3><img src="{{$country->icon}}"></img> History of {{$country->name}}</h3>
                    <hr>
                </div>
                <div class="pf-detail">
                    <p> {{$country->history}}
                    </p>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="title">
                    <h3>Country details</h3>
                    <hr>
                </div>
                <ul class="list-unstyled pf-list">
                    <li><i class="fa fa-arrow-circle-right pr-10"></i><b>Client: </b> <span><a href="#">wrapbootstrap</a></span></li>
                    <li><i class="fa fa-arrow-circle-right pr-10"></i><b>Skills: </b><span><a href="#">WordPress</a>, <a href="#">HTML5</a></span></li>
                    <li><i class="fa fa-arrow-circle-right pr-10"></i><b>Colors: </b><span>blue, gray, purple</span></li>
                    <li><i class="fa fa-arrow-circle-right pr-10"></i><b>Release Date: </b><span>06 January, 2014</span></li>
                    <li><i class="fa fa-arrow-circle-right pr-10"></i><b>Launch Project: </b><span><a href="www.wrapbootstrap.com">wrapbootstrap</a></span></li>
                </ul>
            </div>

            <!--portfolio detail end-->
        </div>
        <hr>
    </div>
    <div class="container">
         <!--recent work start-->
        <div class="row">
            <div class="col-lg-12 recent">
                <h3>Related Work</h3>
                <p>Some of our work we have done earlier</p>
                <div id="owl-demo" class="owl-carousel owl-theme wow fadeIn animated" data-wow-animation-name="fadeIn" style="opacity: 1; display: block; visibility: visible; animation-name: fadeIn;">

                  <div class="owl-wrapper-outer"><div class="owl-wrapper" style="width: 2820px; left: 0px; display: block; transition: all 0ms ease; transform: translate3d(0px, 0px, 0px);"><div class="owl-item" style="width: 235px;"><div class="item view view-tenth">
                    <img src="img/works/img8.jpg" alt="work Image">
                    <div class="mask">
                        <a href="portfolio-single-image.html" class="info" data-toggle="tooltip" data-placement="top" title="Details">
                        <i class="fa fa-link"></i>
                        </a>
                    </div>
                  </div></div><div class="owl-item" style="width: 235px;"><div class="item view view-tenth">
                    <img src="img/works/img9.jpg" alt="work Image">
                    <div class="mask">
                        <a href="portfolio-single-image.html" class="info" data-toggle="tooltip" data-placement="top" title="Details">
                        <i class="fa fa-link"></i>
                        </a>
                    </div>
                  </div></div><div class="owl-item" style="width: 235px;"><div class="item view view-tenth">
                    <img src="img/works/img10.jpg" alt="work Image">
                    <div class="mask">
                        <a href="portfolio-single-image.html" class="info" data-toggle="tooltip" data-placement="top" title="Details">
                        <i class="fa fa-link"></i>
                        </a>
                    </div>
                  </div></div><div class="owl-item" style="width: 235px;"><div class="item view view-tenth">
                    <img src="img/works/img11.jpg" alt="work Image">
                    <div class="mask">
                        <a href="portfolio-single-image.html" class="info" data-toggle="tooltip" data-placement="top" title="Details">
                        <i class="fa fa-link"></i>
                        </a>
                    </div>
                  </div></div><div class="owl-item" style="width: 235px;"><div class="item view view-tenth">
                    <img src="img/works/img12.jpg" alt="work Image">
                    <div class="mask">
                        <a href="blog_detail.html" class="info" data-toggle="tooltip" data-placement="top" title="Details">
                        <i class="fa fa-link"></i>
                        </a>
                    </div>
                  </div></div><div class="owl-item" style="width: 235px;"><div class="item view view-tenth">
                    <img src="img/works/img13.jpg" alt="work Image">
                    <div class="mask">
                        <a href="blog_detail.html" class="info" data-toggle="tooltip" data-placement="top" title="Details">
                        <i class="fa fa-link"></i>
                        </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
                  
                  
                  
                  
                  
                <div class="owl-controls clickable"><div class="owl-pagination"><div class="owl-page active"><span class=""></span></div><div class="owl-page"><span class=""></span></div></div></div></div>
            </div>
        </div>
        <!--recent work end-->
     </div>
     
     
     <style type="text/css">
       .breadcrumbs {
          margin-bottom: 0px;
      }
     </style>
@endsection