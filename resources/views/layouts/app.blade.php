<!doctype html>
<html>
    @include('partials.header')
    <body id="top">
        
        
        
        
        <div id="msg" class="text-center">
        @if (Session::has('success'))
            <script type="text/javascript">
                swal({
                  position: 'center',
                  type: 'success',
                  title: "{{ Session::get('success')}}",
                  showConfirmButton: false,
                  timer: 1800
                });
            </script>
            
            
        @endif
        @if (Session::has('error'))
            <script type="text/javascript">
                swal({
                  position: 'center',
                  type: 'error',
                  title: "{{ Session::get('error')}}",
                  showConfirmButton: false,
                  timer: 1800
                });
            </script>
        @endif
        </div>
        
    
    
    
      @include('partials.navbar')
      @yield('content')
      @include('partials.footer')
    </body>
</html>