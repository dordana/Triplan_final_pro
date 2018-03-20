<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Info windows</title>
    <style>
    /* Always set the map height explicitly to define the size of the div
    * element that contains the map. */
    #map {
        height: 100%;
    }
    /* Optional: Makes the sample page fill the window. */
    html, body {
        height: 100%;
        margin: 0;
        padding: 0;
    }
    </style>
</head>
<body>
    <div id="map"></div>
    <script>
    var aa = '{!! json_encode($attractions) !!}';
    aa = JSON.parse(aa);
    var locations = [];
    for (var i = 0; i < aa.length; i++) { 
        locations.push(new Array(aa[i].name,parseFloat(aa[i].lat),parseFloat(aa[i].lng),i));
    }
    


    // When the user clicks the marker, an info window opens.

    function initMap() {

        var myLatLng = {lat: locations[0][1], lng: locations[0][2]};

        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 9,
            center: myLatLng
            });

        var count=0;

        console.log(locations);
        for (count = 0; count < locations.length; count++) {  

            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(locations[count][1], locations[count][2]),
                map: map
                });
            

            marker.info = new google.maps.InfoWindow({
                content: locations [count][0]
                });


            google.maps.event.addListener(marker, 'click', function() {  
                // this = marker
                var marker_map = this.getMap();
                this.info.open(marker_map, this);
                // Note: If you call open() without passing a marker, the InfoWindow will use the position specified upon construction through the InfoWindowOptions object literal.
                });
        }
    }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBbOaXC-J0SmUy4Rbc4c4G9zNd3dZjG9KQ&callback=initMap">
    </script>
</body>
</html>