// A majority of the implementation of Google Maps, relied upon
// Google's API information, as pressented on their website:
// https://developers.google.com/maps/documentation/javascript/tutorialS

var i = 0;
// Used help from the below site for the cycling through of divs
// Other ways to do this were known, but this method was more
// efficient and succinct:
// http://stackoverflow.com/questions/6003060/cycle-through-divs
function passengerList()
{
    var visiblePassenger = $('#sliderOne .passengerList:visible');
    visiblePassenger.hide();
    var nextToShow = $(visiblePassenger).next('.passengerList:hidden');
    if (nextToShow.length > 0) {
        nextToShow.show();
    } else {
        $('#sliderOne .passengerList:hidden:first').show();
    }
    return false;
};

$(document).ready(function initMap(){
    var directionsService = new google.maps.DirectionsService;
    var directionsDisplay = new google.maps.DirectionsRenderer;
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 13,
        center: {lat: -27.495421, lng: 153.012470}
    });
    
    function createMarker() 
        {
            if (navigator.geolocation) { // Only runs if browser suppors location services
                navigator.geolocation.getCurrentPosition(function (position) {
                    var latitude = position.coords.latitude;
                    var longitude = position.coords.longitude;
                    var coords = new google.maps.LatLng(latitude, longitude);
                    
                    var marker = new google.maps.Marker({
                        position: coords,
                        map: map,
                        title: 'Pickup Location'
                    });

                    var infowindow = new google.maps.InfoWindow({
                    content: contentString
                    });
                    marker.addListener('click', function() {
                    infowindow.open(map, marker);
                    });
            })}
        }
    
    // https://developers.google.com/maps/documentation/javascript/examples/infowindow-simple
    var contentString = '<div id="content">'+
        '<h1 id="firstHeading" class="firstHeading">Passenger</h1>'+
        '</div>';
    
    // Directions display
    directionsDisplay.setMap(map);

    var onChangeHandler = function() {
        calculateAndDisplayRoute(directionsService, directionsDisplay);
        createMarker();
    };
    
    // Changing drivers
    var test = document.getElementById('no').addEventListener('click', onChangeHandler);
          
    var input = document.getElementById('pac-input');
    var test = document.getElementById('pac-input').addEventListener('change', onChangeHandler);
    // If more than two locations are used in a row, directions don't respond, using 'test' always works.
    // Most likely due to the number of Google autocomplete's allowed without paying extra.
    var autocomplete = new google.maps.places.Autocomplete(input);
});
    
function calculateAndDisplayRoute(directionsService, directionsDisplay) {
// Implementation of GeoLocation used help from below 
// http://stackoverflow.com/questions/14586916/google-maps-directions-from-users-geo-location
    calculate();
    var origins = ['Carmody Road, St Lucia, QLD', 'Hawken Drive, St Lucia, QLD', 'York Street, Indooroopilly, QLD'];
    
    function calculate(){
        if (navigator.geolocation) { // Only runs if browser suppors location services
            navigator.geolocation.getCurrentPosition(function (position) {
                var latitude = position.coords.latitude;
                var longitude = position.coords.longitude;
                var coords = new google.maps.LatLng(latitude, longitude);

                // Direction Routing
                directionsService.route({
                    origin: origins[i],
                    destination: document.getElementById('pac-input').value,
                    travelMode: google.maps.TravelMode.DRIVING
                }, function(response, status) {
                    if (status === google.maps.DirectionsStatus.OK) {
                    directionsDisplay.setDirections(response);

                    // Showing of sliders once destination inputted
                    $("#drivers").show();
                    $("#sliderTwo").show();
                    $("#toggle").show();

                    i++;
                    if (i == 3)
                    {
                        i = 0;
                    };
                } else {
                    window.alert('Directions request failed due to ' + status);
                    }
                });
            });
        }
    }
}