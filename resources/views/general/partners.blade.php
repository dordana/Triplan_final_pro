@extends('layouts.app')

@section('content')
<p id="pageName" hidden >Contact Us</p>

<br><br><br><br>
<div class="container">
    <div class="row">
    	<div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">
    		<h3>Our partners</h3>
    	</div>
    </div>
</div>

<style>
div.gallery {
    border: 1px solid #ccc;
}

div.gallery:hover {
    border: 1px solid #777;
}

div.gallery img {
    width: 100%;
    height: auto;
}

div.desc {
    padding: 15px;
    text-align: center;
}

* {
    box-sizing: border-box;
}

.responsive {
    padding: 0 6px;
    float: left;
    width: 24.99999%;
}

@media only screen and (max-width: 700px) {
    .responsive {
        width: 49.99999%;
        margin: 6px 0;
    }
}

@media only screen and (max-width: 500px) {
    .responsive {
        width: 100%;
    }
}

img{
    width: 350px;
    height: 200px !important;
}

.clearfix:after {
    content: "";
    display: table;
    clear: both;
}

.partners{
    margin-right:50px;
    margin-left:50px;

}
</style>

<div class="partners">
    <div class="responsive">
  <div class="gallery">
    <a target="_blank" href="https://www.sce.ac.il/">
      <img src="https://upload.wikimedia.org/wikipedia/he/4/44/SCE_logo.png" alt="Trolltunga Norway" width="300" height="200">
    </a>
  </div>
</div>


<div class="responsive">
  <div class="gallery">
    <a target="_blank" href="https://www.google.co.il/">
      <img src="https://cdn.vox-cdn.com/thumbor/Pkmq1nm3skO0-j693JTMd7RL0Zk=/0x0:2012x1341/1200x800/filters:focal(0x0:2012x1341)/cdn.vox-cdn.com/uploads/chorus_image/image/47070706/google2.0.0.jpg" alt="Forest" width="600" height="400">
    </a>
  </div>
</div>

<div class="responsive">
  <div class="gallery">
    <a target="_blank" href="https://ide.c9.io/">
      <img src="https://upload.wikimedia.org/wikipedia/en/thumb/f/f7/Cloud9_logo.svg/1200px-Cloud9_logo.svg.png" alt="Northern Lights" width="600" height="400">
    </a>
  </div>
</div>

<div class="responsive">
  <div class="gallery">
    <a target="_blank" href="https://aws.amazon.com/">
      <img src="https://d1.awsstatic.com/logos/aws-logo-lockups/Partner%20Network%20Variants/APN-Logo_Color_380x186-SiteMerch_Editorial.59ccfe938aa1ad4817ab53ffbe6a799c5523d52e.png" alt="Mountains" width="600" height="400">
    </a>
  </div>
</div>

<div class="clearfix"></div>
</div>

<br><br><br><br>

@endsection