<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Add to your trip interaction</title>
  
  
  
      <link rel="stylesheet" href="css/tripbuilder.css">

  
</head>

<body>

  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
<div id="wrapper">
<div class="cart-icon-top">
</div>

<div class="cart-icon-bottom">
</div>
<form id="attractionForm" action="{{route('tripbuilder')}}" method="get">
    <input type="text" hidden name="attractionList" id="attractionList"/>
    <input type="text" hidden name="pathName" id="pathName"/>
    <input type="text" hidden name="cityname" id="cityname"/>
    <input type="text" hidden name="startDate" id="startDate"/>
    <input type="text" hidden name="endDate" id="endDate"/>
    <div id="checkout">CHECKOUT</div>
</form>


<div id="header">	
	<ul>
        <li><a href="/">Back to home page</a></li>
    </ul>		
</div>

<div id="sidebar">
    <br><br>
    <h3>Path name</h3>
    <input type="text" class="form-control" id="pathNameText">
    
    <h3>Path details</h3>
    <p class="details">Country: {{$country->name}}</p>
    <p class="details">City: {{$city->name}}</p>
    <p class="details">Start date: {{$start}}</p>
    <p class="details">End date: {{$end}}</p>
    
	<h3>attractions</h3>
    <div id="cart">
    	<span class="empty">No attractions in list.</span>       
    </div>
    
    <h3>TYPES</h3>
    <div class="checklist categories">
    	<ul>
        	<li><a class="choise" href="" type="restauant"><span></span>Restauants</a></li>
            <li><a class="choise" href="" type="sights"><span></span>Sights</a></li>
            <li><a class="choise" href="" type="museum"><span></span>Museums</a></li>
            <li><a class="choise" href="" type="tour"><span></span>Tours</a></li>
            <li><a class="choise" href="" type="park"><span></span>Parks</a></li>
            <li><a class="choise" href="" type="shopping"><span></span>Shopping</a></li>
            <li><a class="choise" href="" type="nightlife"><span></span>Nightlife</a></li>
            <li><a class="choise" href="" type="concert"><span></span>Concerts</a></li>
            <li><a class="choise" href="" type="water sport"><span></span>Water sports</a></li>
            <li><a class="choise" href="" type="spa&wellness"><span></span>Spa & Wellness</a></li>
            <li><a class="choise" href="" type="zoo"><span></span>Zoos</a></li>
            <li><a class="choise" href="" type="airport"><span></span>Airports</a></li>
            <li><a class="choise" href="" type="casino"><span></span>Casinos</a></li>
            <li><a class="choise" href="" type="beaches"><span></span>Beaches</a></li>
            <li><a class="choise" href="" type="other"><span></span>Other</a></li>
        </ul>
    </div>
</div>

<div id="grid-selector">
       <div id="grid-menu">
       	   View:
           <ul>           	   
               <li class="largeGrid"><a href=""></a></li>
               <li class="smallGrid"><a class="active" href=""></a></li>
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
            	<span>$43</span> $39
            </div>
             
            <h3>COLORS</h3>
            <div class="colors-large">
                <ul>
                    <li><a href="" style="background:#222"><span></span></a></li>
                    <li><a href="" style="background:#6e8cd5"><span></span></a></li>
                    <li><a href="" style="background:#f56060"><span></span></a></li>
                    <li><a href="" style="background:#44c28d"><span></span></a></li>
                </ul> 
            </div>

            <h3>SIZE</h3>
            <div class="sizes-large">
 				<span>XS</span>
                <span>S</span>
                <span>M</span>
                <span>L</span>
                <span>XL</span>
                <span>XXL</span>
            </div>
            
            <button class="add-cart-large">Add To Your trip</button>                          
                         
        </div>
        <div class="make3D">
            <div class="product-front">
                <div class="shadow"></div>
                <img src="{{ url('/uploads/attractions') }}/{{$attraction->mainpic}}" alt="" />
                <div class="image_overlay"></div>
                <div class="add_to_cart">Add to your trip</div>
                <div class="view_gallery">More Details</div>  
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


<script type="text/javascript">
$(document).ready(function(){
    $('#checkout').click(function(){
        if ($('#pathNameText').val() != "")
        {
           $('#pathName').val($('#pathNameText').val()); 
           $('#cityname').val('{{$city->id}}');
           $('#startDate').val('{{$start}}');
           $('#endDate').val('{{$end}}');
           var attractionList = [];
           $('.cart-item').each(function( index ) {
                attractionList.push($(this).attr('attraction_id'));
           });
           attractionList = JSON.stringify(attractionList);
           $('#attractionList').val(attractionList);
           $('#attractionForm').submit();
        }
    });
    
    
});
</script>

</body>

</html>
