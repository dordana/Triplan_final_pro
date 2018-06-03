<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Trip Builder</title>
      <link rel="stylesheet" href="css/tripbuilder.css">
</head>

<body>

<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBYUrj824we7Ae73T3khwyy_epnUlgudSM&libraries=places"></script>
<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
<div id="wrapper">
<div class="cart-icon-top">
</div>

<div class="cart-icon-bottom">
</div>
<form id="attractionForm" action="{{route('loading')}}" method="get">
    <input type="text" hidden name="attractionList" id="attractionList"/>
    <input type="text" hidden name="pathName" id="pathName"/>
    <input type="text" hidden name="cityname" id="cityname"/>
    <input type="text" hidden name="startDate" id="startDate"/>
    <input type="text" hidden name="endDate" id="endDate"/>
    <input type="text" hidden name="startLocation" id="startLocation"/>
    <input type="text" hidden name="startLocationString" id="startLocationString"/>
    <input type="text" hidden name="countryName" value="{{$country->name}}"/>
    <div id="checkout">BUILD</div>
</form>


<div id="header">	
	<ul>
        <li><a href="/">Back to home page</a></li>
    </ul>		
</div>

<div id="sidebar">
    <br><br>
    
    <h3>Start Point</h3>
    <input id="txtLocation" type="text" value=""/>
    
    <h3>Path name</h3>
    <input type="text" class="form-control" id="pathNameText">
    
    
    
    
    
    <h3>Path details</h3>
    <p class="details">Country: {{$country->name}}</p>
    <p class="details">City: {{$city->name}}</p>
    <p class="details">Start date: {{ Carbon\Carbon::parse( $start)->format('d/m/Y') }}</p>
    <p class="details">End date: {{ Carbon\Carbon::parse( $end)->format('d/m/Y') }}</p>
    <h4>Max attractions to pick: <span id="num_of_attractions" style="color:red;font-size:24px;">{{$num_of_attractions}}</span></h4>
	<h3>attractions</h3>
    <div id="cart">
    	<span class="empty">No attractions in list</span>       
    </div>
    
    <h3>TYPES</h3>
    <div class="checklist categories">
    	<ul>
    	    @foreach($types as $key => $val)
    		<li><a class="choise" href="javascript:void(0)" type="{{$key}}"><span></span>{{$key}} ({{$val}})</a></li>
    		@endforeach
        </ul>
    </div>
</div>

<div id="grid-selector">
       <div id="grid-menu">
       	   View:
           <ul>           	   
               <li class="largeGrid"><a href="javascript:void(0)"></a></li>
               <li class="smallGrid"><a class="active" href="javascript:void(0)"></a></li>
           </ul>
       </div>
       
       Showing <span id="counterOfResults">{{count($attractions)}}</span> results 
</div>

<div id="grid">
    @foreach($attractions as $attraction)
    <div class="product" type="{{$attraction->type}}" attraction_id="{{$attraction->id}}">
    	<div class="info-large">
        	<h4>{{$attraction->name}}</h4>
            <div class="sku">
            	<strong></strong>
            </div>
             
            <div class="price-big">
            	<span>${{intval($attraction->pricePerPerson*1.2)}} </span> ${{$attraction->pricePerPerson}} 
            </div>

            
            <button class="add-cart-large">Add To Your trip</button>                          
        </div>
        <div class="make3D">
            <div class="product-front">
                <div class="shadow"></div>
                <img src="{{ url('/uploads/attractions') }}/{{$attraction->mainpic}}" alt=""/>
                <div class="image_overlay"></div>
                <div style="top:70px" class="add_to_cart">Add to your trip</div>
                <div style="top:130px" class="view_gallery">More Details</div>  
                <div class="stats">        	
                    <div class="stats-container">
                        <span class="product_price"><span class="rate">{{$attraction->rate}}</span>/5☆</span>
                        <span class="product_name">{{$attraction->name}}</span> 
                        <span class="product_id" hidden>{{$attraction->id}}</span> 
                        <p>Summer dress</p>                                            
                        <div class="product-options">
                            <strong>Address</strong>
                            <span>{{$attraction->address}}, {{$attraction->zip_code}}</span>
                        </div>                       
                    </div>                         
                </div>
            </div>
            
            <div class="product-back">
                <div class="shadow"></div>
                <div class="carousel">
                    <ul class="carousel-container">
                        <li><img src="{{ url('/uploads/attractions') }}/{{$attraction->mainpic}}" alt="" /></li>
                        <li><img src="{{ url('/uploads/attractions') }}/{{$attraction->mainpic}}" alt="" /></li>
                        <li><img src="{{ url('/uploads/attractions') }}/{{$attraction->mainpic}}" alt="" /></li>
                    </ul>
                    <div class="arrows-perspective">
                        <div class="carouselPrev">
                            <div class="y"></div>
                            <div class="x"></div>
                        </div>
                        <div class="carouselNext">
                            <div class="y"></div>
                            <div class="x"></div>
                        </div>
                    </div>
                </div>
                <div class="flip-back">
                    <div class="cy"></div>
                    <div class="cx"></div>
                </div>
                <div class="container desc">
                    <span class="desc_name"><b>{{$attraction->name}}</b></span>   
                    <p class="desc_main" >{{$attraction->description}}</p>
                </div>
            </div>	  
        </div>	
    </div>
    @endforeach
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  
  

    <script  src="js/tripbuilder.js"></script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
    $(".showpage1").click(function() {
        alert("sdsd")
        var attrId = $(this).attr("attrId");
        window.open("/attractions/"+attrId).focus();
    })
</script>
<script type="text/javascript">
$.getJSON("http://freegeoip.net/json/", function(data) {
    var city = data.city;
    var country = data.country_name;
    $('#txtLocation').val(city +", "+ country); 
});




$(document).ready(function(){
    $(".choise").css("text-transform", "capitalize ");
    $('#checkout').click(function(){
        if ($('#pathNameText').val() != "" && $('#txtLocation').val() != "")
        {
           $('#pathName').val($('#pathNameText').val()); 
           $('#cityname').val('{{$city->id}}');
           $('#startDate').val('{{$start}}');
           $('#endDate').val('{{$end}}');
           $("#startLocationString").val($("#txtLocation").val());
           
           geocoder = new google.maps.Geocoder();
            geocoder.geocode( { 'address' : $("#txtLocation").val() }, function( results, status ) {
                if( status == google.maps.GeocoderStatus.OK ) {
                    $("#startLocation").val(results[0].geometry.location);
                    var attractionList = [];
                   $('.cart-item').each(function( index ) {
                        attractionList.push($(this).attr('attraction_id'));
                   });
                   attractionList = JSON.stringify(attractionList);
                   $('#attractionList').val(attractionList);
                   $('#attractionForm').submit();
                }
            } );
    }else{
        swal({
              title: "Alert",
              text: "You must to fill in the start location and the path name",
              icon: "warning",
              dangerMode: true,
            })
    }
    });
autoComplete = new google.maps.places.Autocomplete(document.getElementById("txtLocation"));    
});
</script>

</body>

</html>
