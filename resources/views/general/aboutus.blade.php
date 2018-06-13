@extends('layouts.app')

@section('content')
<script type="text/javascript" >
	document.title = 'Triplan - About Us';
</script>
<p id="pageName" hidden >General</p>
<style type="text/css">
	#aboutText{
				margin: 0 25% !important;
			}
	@media screen and (max-width: 980px) {

			#aboutText{
				margin: 0 15% !important;
			}

		}

		@media screen and (max-width: 480px) {

			#aboutText{
				margin: 0 5% !important;
			}

		}

.about-us {
  margin: 4em auto;
  width: 1100px;
  max-width: 90%;
}
.about-us::after {
  clear: both;
  content: "";
  display: table;
}
@media only screen and (min-width: 1000px) {
  .about-us article, .about-us aside {
    float: left;
    width: 47.5%;
  }
}
@media only screen and (min-width: 1000px) {
  .about-us article {
    margin-right: 5%;
  }
}
.about-us article h2 {
  margin: 0;
  font-size: 40px;
  font-weight: 300;
  color: #308fc3;
}
.about-us article #textP {
  margin-bottom: 2em;
  font-size: 16px;
  line-height: 28px;
  font-weight: 300;
  color: #676767;
}
.about-us aside ul {
  margin: 0;
  padding: 0;
  list-style: none;
}
.about-us aside ul::after {
  clear: both;
  content: "";
  display: table;
}
.about-us aside ul li {
  display: table;
  width: 100%;
  height: 170px;
}
@media only screen and (min-width: 1000px) {
  .about-us aside ul li {
    float: left;
    width: 33.3333333333%;
  }
}
.about-us aside ul li:first-child {
  background-color: #F79B5D;
}
.about-us aside ul li:nth-child(2) {
  background-color: #FF7500;
}
.about-us aside ul li:nth-child(3) {
  background-color: #F96230;
}
.about-us aside ul li h3 {
  display: table-cell;
  vertical-align: middle;
  text-align: center;
}
.about-us aside ul li h3 span {
  display: block;
  color: #fff;
}
.about-us aside ul li h3 span:first-child {
  font-family: 'Roboto', sans-serif;
  font-size: 60px;
  font-weight: 700;
}
.about-us aside ul li h3 span:nth-child(2) {
  font-size: 12px;
  font-weight: 600;
  text-transform: uppercase;
}

</style>
<link rel="stylesheet" href="/css/aboutus.css" />


		<!-- Banner -->
			<section id="banner">
				<div class="content">
					<h1 style="color:#f68546">So What Is Triplan?</h1>
					<br><br>
					<p id="aboutText">

<br>
We aim to offer our customers a variety of the latest reviews and news.
<br>We’ve come a long way, so we know exactly which direction to take when supplying you with high quality yet budget friendly attractions worldwide.
<br>We offer all of this while providing excellent social network and friendly support.

<br>
We always keep an eye on the latest trends\attractions and put our customers’ wishes first.
<br>That is why we have satisfied customers all over the world, and are thrilled to be a part of the travelling industry.
<br>The interests of our customers are always the top priority for us, so we hope you will enjoy our features as much as we enjoy making them available to you.
					</p>
					<br><br>
					<ul class="actions">
						<li><a href="/" class="button scrolly">Get Started</a></li>
					</ul>
				</div>
			</section>
<div class="about-us">

	<article>

		<h2>Strength in numbers</h2>
		<p id="textP">Thank you to all our visitors and friends<br>
We built the site in a way that will be convenient and helps everyone<br>
</p>

	</article>

	<aside>

		<ul>
			<li>
				<h3>
					<span>4+</span>
					<span>Years of Service</span>
				</h3>
			</li>
			<li>
				<h3>
					<span>500+</span>
					<span>Registered Friends</span>
				</h3>
			</li>
			<li>
				<h3>
					<span>1M+</span>
					<span>Links Per Month</span>
				</h3>
			</li>
		</ul>

	</aside>

</div>

		<!-- Two -->
			<section id="two" class="wrapper style1 special">
				<div class="inner">
					<h2>Our Moto</h2>
					<figure>
					    <blockquote>
					        "The worst thing about being a tourist is having other tourists recognize you as a tourist."
					    </blockquote>
					    <footer>
					        <cite class="author">Russell Baker, 2003</cite>
					    </footer>
					</figure>
				</div>
			</section>

		<!-- Three -->
		
			<section id="three" class="wrapper">
				<h1 style="color:#f68546;text-align:center;">Owners</h1>
				<div class="inner flex flex-3">
					
					<div class="flex-item box">
						<div class="image fit">
							<img style="height: 350px" src="https://scontent.fsdv3-1.fna.fbcdn.net/v/t1.0-9/12651107_1136530556359279_3325709799257876769_n.jpg?_nc_cat=0&oh=135f5b10f7b85da0d6a4a16709a90dcf&oe=5B2870DB" alt="" />
						</div>
						<div class="content text-center">
							<h3 class="text-center">Dor Dana<br> CEO & Co-Founder</h3>
							<p>Senior web applications</p>
						</div>
					</div>
					<div class="flex-item box">
						<div class="image fit">
							<img style="height: 350px" src="https://scontent.fsdv3-1.fna.fbcdn.net/v/t1.0-9/14907606_10211000927558111_6434569224934377640_n.jpg?_nc_cat=0&oh=1f5bf0fcd9bfb60ede47a6532b7e9990&oe=5B63F6E6" alt="" />
						</div>
						<div class="content text-center">
							<h3 class="text-center">Amit Yahav<br> CTO & Co-Founder</h3>
							<p>Experienced software engineer</p>
						</div>
					</div>
				</div>
			</section>




@endsection