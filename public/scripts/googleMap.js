/* global $ */
var directionsRenderer;
var autoComplete;
var googleMap;
var marker;

$(document).ready(function () {
    

    $('#btnDisplayDirections').click(function () {

        // Clear previous directions, if any.
        if (directionsRenderer) {
            directionsRenderer.setMap(null);
        }
        $('#panel').html('');

        var directionsService = new google.maps.DirectionsService;

        directionsRenderer = new google.maps.DirectionsRenderer({
            map: googleMap,
            panel: document.getElementById("panel"),
            draggable: true
        });




        // Add way points to array.
        var wayPoints = [];
        $('#ddlSource > option').each(function () {
            if ($(this).val() != '' && $(this).val() != $('#ddlSource').val() && $(this).val() != $('#ddlDestination').val()) {
                var wayPoint = {
                    location: $(this).val(),
                    stopover: true
                };
                wayPoints.push(wayPoint);
            }
        });






        // Create directions request.
        if($('#ddlTravelMode').val() == "BUS"){
            var directionsRequest = {
                origin: $('#ddlSource').val(),
                destination: $('#ddlDestination').val(),
                travelMode: google.maps.TravelMode["TRANSIT"],
                waypoints: wayPoints,
                transitOptions: {
                    modes: ['BUS'],
                    routingPreference: 'FEWER_TRANSFERS'
                  },
                optimizeWaypoints: $('#chkOptimizePath').is(':checked')
            }
        }else if($('#ddlTravelMode').val() == "RAIL"){
            var directionsRequest = {
                origin: $('#ddlSource').val(),
                destination: $('#ddlDestination').val(),
                travelMode: google.maps.TravelMode["TRANSIT"],
                waypoints: wayPoints,
                transitOptions: {
                    modes: ['RAIL'],
                    routingPreference: 'FEWER_TRANSFERS'
                  },
                optimizeWaypoints: $('#chkOptimizePath').is(':checked')
            }
        }else if($('#ddlTravelMode').val() == "TRAIN"){
            var directionsRequest = {
                origin: $('#ddlSource').val(),
                destination: $('#ddlDestination').val(),
                travelMode: google.maps.TravelMode["TRANSIT"],
                waypoints: wayPoints,
                transitOptions: {
                    modes: ['RAIL'],
                    routingPreference: 'FEWER_TRANSFERS'
                  },
                optimizeWaypoints: $('#chkOptimizePath').is(':checked')
            }
        }else{
            var directionsRequest = {
                    origin: $('#ddlSource').val(),
                    destination: $('#ddlDestination').val(),
                    travelMode: google.maps.TravelMode[$('#ddlTravelMode').val()],
                    waypoints: wayPoints,
                    optimizeWaypoints: $('#chkOptimizePath').is(':checked')
                }
        }
        

        // Send request to the directions service.
        directionsService.route(directionsRequest, function (response, status) {
            if (status == google.maps.DirectionsStatus.OK) {
                directionsRenderer.setDirections(response);
            } else {
                alert('We could not find any result for your search.');
            }
        });
    });
});

function initializeMap() {


    var latLng = new google.maps.LatLng(33.7294, 73.0931);

    var mapOptions = {
        center: latLng,
        zoom: 8
    };

    googleMap = new google.maps.Map(document.getElementById("googleMap"), mapOptions);

    google.maps.event.addListener(googleMap, 'click', function (e) {
        // Remove previous marker, if any.
        if (marker) {
            marker.setMap(null);
        }

        // Get address by lat/lng.
        var geocoder = new google.maps.Geocoder();
        
        geocoder.geocode({ 'latLng': e.latLng }, function (results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                if (results[0]) {
                    var address = results[0].formatted_address;

                    marker = new google.maps.Marker({
                        position: e.latLng,
                        map: googleMap,
                        title: address
                    });
                }
            }
        });
    });
}

// Add window load event.
google.maps.event.addDomListener(window, "load", initializeMap);
