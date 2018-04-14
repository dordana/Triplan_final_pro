 @extends('layouts.app')

@section('content')
<style type="text/css">
    /*

All grid code is placed in a 'supports' rule (feature query) at the bottom of the CSS (Line 306). 
        
The 'supports' rule will only run if your browser supports CSS grid.

Flexbox and floats are used as a fallback so that browsers which don't support grid will still recieve an identical layout.

*/

/* Fonts */

@import url(https://fonts.googleapis.com/css?family=Open+Sans:300,400,600);

@import url(https://use.fontawesome.com/releases/v5.0.8/css/all.css);

.profile {
	padding: 5rem 0;
	text-align: center;
}

.profile::after {
	content: "";
	display: block;
	clear: both;
}

.profile-image {
	float: left;
	width: 500px;
	display: flex;
	justify-content: center;
	align-items: center;
	margin-right: 3rem;
}


.profile-user-settings,
.profile-stats,
.profile-bio {
	float: left;
	width: calc(66.666% - 2rem);
}

.profile-user-settings {
	margin-top: 1.1rem;
}

.profile-user-name {
	display: inline-block;
	font-size: 3.2rem;
	font-weight: 300;
}


.profile-stats {
	margin-top: 2.3rem;
}

.profile-stats li {
	display: inline-block;
	font-size: 1.6rem;
	line-height: 1.5;
	margin-right: 4rem;
	cursor: pointer;
}

.profile-stats li:last-of-type {
	margin-right: 0;
}

.profile-bio {
	font-size: 1.6rem;
	font-weight: 400;
	line-height: 1.5;
	margin-top: 2.3rem;
}

.profile-real-name,
.profile-stat-count,
.profile-edit-btn {
	font-weight: 600;
}

/* Gallery Section */

.gallery {
	display: flex;
	flex-wrap: wrap;
	margin: -1rem -1rem;
	padding-bottom: 3rem;
}

.gallery-item {
	position: relative;
	flex: 1 0 22rem;
	margin: 1rem;
	color: #fff;
	cursor: pointer;
}

.gallery-item:hover .gallery-item-info {
	display: flex;
	justify-content: center;
	align-items: center;
	position: absolute;
	top: 0;
	width: 100%;
	height: 100%;
	background-color: rgba(0, 0, 0, 0.3);
}

.gallery-item-info {
	display: none;
}

.gallery-item-info li {
	display: inline-block;
	font-size: 1.7rem;
	font-weight: 600;
}

.gallery-item-likes {
	margin-right: 2.2rem;
}

.gallery-item-type {
	position: absolute;
	top: 1rem;
	right: 1rem;
	font-size: 2.5rem;
	text-shadow: 0.2rem 0.2rem 0.2rem rgba(0, 0, 0, 0.1);
}

.fa-clone,
.fa-comment {
	transform: rotateY(180deg);
}

.gallery-image {
	width: 100%;
	height: 100%;
	object-fit: cover;
}

/* Spinner */

.spinner {
	width: 5rem;
	height: 5rem;
	border: 0.6rem solid #999;
	border-bottom-color: transparent;
	border-radius: 50%;
	margin: 0 auto;
	animation: spinner 1s linear infinite;
}

/* Media Query */

@media screen and (max-width: 40rem) {
	.profile {
		display: flex;
		flex-wrap: wrap;
		padding: 4rem 0;
	}

	.profile::after {
		display: none;
	}

	.profile-image,
	.profile-user-settings,
	.profile-bio,
	.profile-stats {
		float: none;
		width: auto;
	}

	.profile-image img {
		width: 7.7rem;
	}

	.profile-user-settings {
		flex-basis: calc(100% - 10.7rem);
		display: flex;
		flex-wrap: wrap;
		margin-top: 1rem;
	}

	.profile-user-name {
		font-size: 2.2rem;
	}

	.profile-edit-btn {
		order: 1;
		padding: 0;
		text-align: center;
		margin-top: 1rem;
	}

	.profile-edit-btn {
		margin-left: 0;
	}

	.profile-bio {
		font-size: 1.4rem;
		margin-top: 1.5rem;
	}

	.profile-edit-btn,
	.profile-bio,
	.profile-stats {
		flex-basis: 100%;
	}

	.profile-stats {
		order: 1;
		margin-top: 1.5rem;
	}

	.profile-stats ul {
		display: flex;
		text-align: center;
		padding: 1.2rem 0;
		border-top: 0.1rem solid #dadada;
		border-bottom: 0.1rem solid #dadada;
	}

	.profile-stats li {
		font-size: 1.4rem;
		flex: 1;
		margin: 0;
	}

	.profile-stat-count {
		display: block;
	}
}

/* Spinner Animation */

@keyframes spinner {
	to {
		transform: rotate(360deg);
	}
}

/*

The following code will only run if your browser supports CSS grid.

Remove or comment-out the code block below to see how the browser will fall-back to flexbox & floated styling. 

*/

@supports (display: grid) {
	.profile {
		display: grid;
		grid-template-columns: 1fr 2fr;
		grid-template-rows: repeat(3, auto);
		grid-column-gap: 3rem;
		align-items: center;
	}

	.profile-image {
		grid-row: 1 / -1;
	}

	.gallery {
		display: grid;
		grid-template-columns: repeat(auto-fit, minmax(22rem, 1fr));
		grid-gap: 2rem;
	}

	.profile-image,
	.profile-user-settings,
	.profile-stats,
	.profile-bio,
	.gallery-item,
	.gallery {
		width: auto;
		margin: 0;
	}

	@media (max-width: 40rem) {
		.profile {
			grid-template-columns: auto 1fr;
			grid-row-gap: 1.5rem;
		}

		.profile-image {
			grid-row: 1 / 2;
		}

		.profile-user-settings {
			display: grid;
			grid-template-columns: auto 1fr;
			grid-gap: 1rem;
		}

		.profile-edit-btn,
		.profile-stats,
		.profile-bio {
			grid-column: 1 / -1;
		}

		.profile-user-settings,
		.profile-edit-btn,
		.profile-settings-btn,
		.profile-bio,
		.profile-stats {
			margin: 0;
		}
	}
}
/**/
/**/
button:focus,
input:focus,
textarea:focus,
select:focus {
  outline: none; }

.tabs {
  display: block;
  display: -webkit-flex;
  display: -moz-flex;
  display: flex;
  -webkit-flex-wrap: wrap;
  -moz-flex-wrap: wrap;
  flex-wrap: wrap;
  margin: 0;
  overflow: hidden; }
  .tabs [class^="tab"] label,
  .tabs [class*=" tab"] label {
    cursor: pointer;
    display: block;
    font-size: 1.1em;
    font-weight: 300;
    line-height: 1em;
    padding: 2rem 0;
    text-align: center; }
  .tabs [class^="tab"] [type="radio"],
  .tabs [class*=" tab"] [type="radio"] {
    border-bottom: 1px solid rgba(239, 237, 239, 0.5);
    cursor: pointer;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    display: block;
    width: 100%;
    -webkit-transition: all 0.3s ease-in-out;
    -moz-transition: all 0.3s ease-in-out;
    -o-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out; }
    .tabs [class^="tab"] [type="radio"]:hover, .tabs [class^="tab"] [type="radio"]:focus,
    .tabs [class*=" tab"] [type="radio"]:hover,
    .tabs [class*=" tab"] [type="radio"]:focus {
      border-bottom: 1px solid #f68546; }
    .tabs [class^="tab"] [type="radio"]:checked,
    .tabs [class*=" tab"] [type="radio"]:checked {
      border-bottom: 2px solid #f68546; }
    .tabs [class^="tab"] [type="radio"]:checked + div,
    .tabs [class*=" tab"] [type="radio"]:checked + div {
      opacity: 1; }
    .tabs [class^="tab"] [type="radio"] + div,
    .tabs [class*=" tab"] [type="radio"] + div {
      display: block;
      opacity: 0;
      padding: 2rem 0;
      width: 90%;
      -webkit-transition: all 0.3s ease-in-out;
      -moz-transition: all 0.3s ease-in-out;
      -o-transition: all 0.3s ease-in-out;
      transition: all 0.3s ease-in-out; }
  .tabs .tab-2 {
    width: 50%; }
    .tabs .tab-2 [type="radio"] + div {
      width: 200%;
      margin-left: 200%; }
    .tabs .tab-2 [type="radio"]:checked + div {
      margin-left: 0; }
    .tabs .tab-2:last-child [type="radio"] + div {
      margin-left: 100%; }
    .tabs .tab-2:last-child [type="radio"]:checked + div {
      margin-left: -100%; }
</style>
<header>
<h1>{{$user->id}}</h1>
	<div class="container">

		<div class="profile">

			<div class="profile-image">

				<img style="width:300px;height:230px;border:solid 2px orange" src="{{ url('/uploads/user-photos') }}/{{$user->profile_phote_path}}" alt="{{ url('/uploads/Icons/userprofile.png') }}">

			</div>

			<div class="profile-user-settings">

				<h1 class="profile-user-name" >{{$user->username}}</h1>


			</div>

			<div class="profile-stats">

				<ul>
					<li><span class="profile-stat-count"></span> likes</li>
					<li><span class="profile-stat-count"></span> shares</li>
					<li><span class="profile-stat-count"></span> paths</li>
				</ul>

			</div>

			<div class="profile-bio">

				<p><span class="profile-real-name">{{$user->firstname . " " . $user->lastname}}</span> is a {{$user->gender}} {{$user->age}} and lives in {{$user->city}}, {{$user->country}}  </p>
			</div>

		</div>
		<!-- End of profile section -->

	</div>
	<!-- End of container -->

</header>


<div class="tabs">
  <div class="tab-2">
    <label class="tabName" for="tab2-1">Photos</label>
    <input id="tab2-1" name="tabs-two" type="radio" checked="checked">
    <div>
      <h4>Tab One</h4>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas consequat id velit quis vestibulum. Nam id orci eu urna mollis porttitor. Nunc nisi ante, gravida at velit eu, aliquet sodales dui. Sed laoreet condimentum nisi a egestas.</p><p>Donec interdum ante ut enim consequat, quis varius nulla dapibus. Vivamus mollis fermentum augue a varius. Vestibulum in sapien at lectus gravida lobortis vulputate sed metus. Duis scelerisque justo et maximus efficitur. Donec eu eleifend quam. Curabitur aliquet commodo sapien eget vestibulum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Vestibulum vel aliquet nunc, finibus posuere lorem. Suspendisse consectetur volutpat est ut ornare.</p>
    </div>
  </div>
  <div class="tab-2">
    <label class="tabName" for="tab2-2">Reviews</label>
    <input id="tab2-2" name="tabs-two" type="radio">
    <div>
      <h4>Tab Two</h4>
      <p>Quisque sit amet turpis leo. Maecenas sed dolor mi. Pellentesque varius elit in neque ornare commodo ac non tellus. Mauris id iaculis quam. Donec eu felis quam. Morbi tristique lorem eget iaculis consectetur. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Aenean at tellus eget risus tempus ultrices. Nam condimentum nisi enim, scelerisque faucibus lectus sodales at.</p>
    </div>
  </div>
</div>


@endsection