<style type="text/css">

body{
  margin:0;
}
.map {
  position:absolute;
    width:100%;
    min-height:100%;
    top:0px;
    left:0px;
    z-index:0;
}
h1{
  position: relative; 
  z-index: 1; /* The z-index should be higher than Google Maps */
  width: 300px;
}
</style>



<script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
<script src="https://www.amcharts.com/lib/3/serial.js"></script>
<script src="https://www.amcharts.com/lib/3/themes/light.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA2PgFEgcdz9Njc2c4LQxwA0dP4-S03IDA"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<div id="map" class="map"></div>
<h1>dsfdsfs</h1>
<script type="text/javascript">
  function initialize() {
  var map = new google.maps.Map(
    document.getElementById('map'), {
      zoom: 10,
      center: new google.maps.LatLng(41.893837885225054, 12.477581026389316)
    }
  );
}


window.onload = initialize;
</script>