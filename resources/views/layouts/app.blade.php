<!DOCTYPE html>
<html lang="en-US">
    @include('partials.header')
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
        <script type="text/javascript">
        function add_chatinline(){
            var hccid=53282943;
            var nt=document.createElement("script");
            nt.async=true;
            nt.src="https://mylivechat.com/chatinline.aspx?hccid="+hccid;
            var ct=document.getElementsByTagName("script")[0];
            ct.parentNode.insertBefore(nt,ct);}
            add_chatinline();
        </script>
    </body>
    <!-- END BODY -->
</html>