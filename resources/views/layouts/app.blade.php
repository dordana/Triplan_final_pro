<!DOCTYPE html>
<html lang="en-US">
    @include('partials.header')
    <title>Triplan - @yield('content')</title>
	</head>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <style type="text/css">
    
    body{
        font-family: 'Montserrat', sans-serif !important;
    }
    .fot{
    	display: block;
        margin: 0 auto;
        text-align: center;
    }
</style>

    </style>
    <!-- START BODY -->
    <body>
        @if (Auth::guest() && Request::url() != "http://triplan1-dordana1191.c9users.io/login" && Request::url() != "http://triplan1-dordana1191.c9users.io/register")
            <script type="text/javascript">
                swal({
                  title: "You are in guest zone!",
                  text: "Please register or login to be able to enjoy our best features!",
                  icon: "info",
                  buttons: false,
                  dangerMode: true,
                });
            </script>
        @endif
        <div id="fh5co-wrapper">
	    	<div id="fh5co-page">   
                @include('partials.navbar')
                @yield('content')
                @include('partials.footer')
        	</div>
    	<!-- END fh5co-page -->
    	</div>
    	<!-- END fh5co-wrapper -->
        @include('partials.scripts')
    </body>
    <!-- END BODY -->
</html>