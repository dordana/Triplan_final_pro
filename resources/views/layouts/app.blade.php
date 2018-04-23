<!DOCTYPE html>
<html lang="en-US">
    @include('partials.header')
    <style type="text/css">
        body{
            font-family: 'Mina', sans-serif;
        }
    </style>
    <!-- START BODY -->
    <body>
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