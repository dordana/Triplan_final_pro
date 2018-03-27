<link href="{!! asset('pages/navbar/navbar.css') !!}" rel="stylesheet" />
<header id="fh5co-header-section" class="sticky-banner">
	<div class="container">
		<div class="nav-header">
			<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle dark"><i></i></a>
			<h1 id="fh5co-logo"><a href="/"><i class="icon-airplane"></i>Triplan</a></h1>
			<!-- START #fh5co-menu-wrap -->
			<nav id="fh5co-menu-wrap" role="navigation">
				<ul class="sf-menu" id="fh5co-primary-menu">
					<li class="active"><a href="/">Home</a></li>
					<li><a href="{{route('showcountries')}}">Countries</a></li>
					<li><a href="{{route('showcities')}}">Cities</a></li>
					<li><a href="#">Attractions</a></li>
					<li><a href="{{route('showreviews')}}">Reviews</a></li>
					@if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li>
						<a href="#" class="fh5co-sub-ddown">{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</a>
						<ul class="fh5co-sub-menu">
							@if (Auth::user()->admin)
							<li><a href="{{ url('/admin/dashboard') }}">Admin panel</a></li>
							@endif
							<li><a href="{{ url('/profile') }}">Profile</a></li>
							<li><a href="{{ url('/logout') }}">Logout</a></li>
						</ul>
					</li>
                    @endif
				</ul>
			</nav>
		</div>
	</div>
</header>
<script src="{!! asset('pages/navbar/navbar.js') !!}"></script>
<script type="text/javascript">
</script>