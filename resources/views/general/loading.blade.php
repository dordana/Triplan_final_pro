@extends('layouts.empty')
@section('content')
<link href="https://fonts.googleapis.com/css?family=Gugi" rel="stylesheet">

<style type="text/css">
body {
  background: orange;
}
.dots-container{
  padding: 0;
  position: absolute;
  text-align: center;
  top: 40%;
  width: 100%;
}
.dots{
  animation: bounce 1.5s infinite linear;
  background: #FFF;
  border-radius: 50%;
  display: inline-block;
  height: 20px;
  text-align: center;
  width: 20px;
}

.dots:nth-child(1){
  animation-delay: .2s;
}
.dots:nth-child(2){
  animation-delay: .4s;
}
.dots:nth-child(3){
  animation-delay: .6s;
}
.dots:nth-child(4){
  animation-delay: .8s;
}
.dots:nth-child(5){
  animation-delay: 1s;
}
@keyframes bounce {
    0% {
			transform: translateY(0);
    }
  	15% {
        transform: translateY(-15px);
    }
    30% {
        transform: translateY(0);
    }
}

</style>

<div class="dots-container">
  <h1 style="color:white;font-family: 'Gugi', cursive;">Now, it's our turn to work</h1>
  <div class="dots"></div>
  <div class="dots"></div>
  <div class="dots"></div>
  <div class="dots"></div>
  <div class="dots"></div>
</div>

    
    
 
    
    
    
  <script>
  setTimeout(function(){
                var request = {!! json_encode($request)!!};
                console.log(request);
                document.location.href="{!! route('tripbuilder', $request); !!}";
            },6000); 
        
  </script>
</body>
</html>

@endsection