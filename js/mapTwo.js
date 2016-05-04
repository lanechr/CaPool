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

$(document).ready(initMap);
    
    function initMap(){
    var directionsService = new google.maps.DirectionsService;
    var directionsDisplay = new google.maps.DirectionsRenderer;
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 13,
        center: {lat: -27.495421, lng: 153.012470}
    });
    
    // Create the DIV to hold the control and call the CenterControl()
    // constructor passing in this DIV.
    var centerControlDiv = document.createElement('div');
    var centerControl = new CenterControl(centerControlDiv, map);

    centerControlDiv.index = 1;
    map.controls[google.maps.ControlPosition.TOP_CENTER].push(centerControlDiv);

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
        
        
    function getPositionForCentre(position) {
    var latitude = position.coords.latitude;
    var longitude = position.coords.longitude;
    var coords = new google.maps.LatLng(latitude, longitude);
    centreMapOnUser(latitude, longitude);
}

function centreMapOnUser(userLat, userLong) {
    var userLat = userLat;
    var userLong = userLong;
    var coords = new google.maps.LatLng(userLat, userLong);
//    map = new google.maps.Map(document.getElementById('map'), {
//        zoom: 13, 
//        center: {lat: userLat, lng: userLong
//                }});
    map.setCenter(coords);
    
    var marker = new google.maps.Marker({
                        position: coords,
                        map: map,
                        title: 'Pickup Location'
                    });
    //map.setCenter(userLoc, {zoom: 13, center: {lat: userLat, lng: userLong}});
}

function errorFunc(error) {
    switch(error.code) 
    {
    case error.PERMISSION_DENIED:
      alert("User denied the request for Geolocation.");
      break;
    case error.POSITION_UNAVAILABLE:
      alert("Location information is unavailable.")
      break;
    case error.TIMEOUT:
      alert("The request to get user location timed out.")
      break;
      case error.POSITION_ERROR:
      alert("The request to get user location timed out.")
      break;
    case error.UNKNOWN_ERROR:
      alert("An unknown error occurred.")
      break;
    }
}

//Support with custom controls found at https://developers.google.com/maps/documentation/javascript/examples/control-custom

//Google Maps Centre Control
function CenterControl(controlDiv, map) {

  // Set CSS for the control border.
  var controlUI = document.createElement('div');
  controlUI.style.backgroundColor = '#fff';
  controlUI.style.border = '2px solid #fff';
  controlUI.style.borderRadius = '3px';
  controlUI.style.boxShadow = '0 2px 6px rgba(0,0,0,.3)';
  controlUI.style.cursor = 'pointer';
  controlUI.style.marginBottom = '22px';
  controlUI.style.textAlign = 'center';
  controlUI.title = 'Click to recenter the map';
  controlDiv.appendChild(controlUI);

  // Set CSS for the control interior.
  var controlText = document.createElement('div');
  controlText.style.color = 'rgb(25,25,25)';
  controlText.style.fontFamily = 'Material Icons';
  controlText.style.fontSize = '30px';
  controlText.style.lineHeight = '38px';
  controlText.style.paddingLeft = '5px';
  controlText.style.paddingRight = '5px';
  controlText.innerHTML = 'my_location';
  controlUI.appendChild(controlText);

  // Setup the click event listeners: simply set the map to User.
  controlUI.addEventListener('click', function() {
        if (navigator.geolocation){
            navigator.geolocation.getCurrentPosition(getPositionForCentre, errorFunc);
        }
        else{
            alert("Your browser does not support Location Services!")
        }
  });

}
}
    
function calculateAndDisplayRoute(directionsService, directionsDisplay) {
// Implementation of GeoLocation used help from below 
// http://stackoverflow.com/questions/14586916/google-maps-directions-from-users-geo-location

    if (navigator.geolocation) { // Only runs if browser suppors location services
        navigator.geolocation.getCurrentPosition(function (position) {
            var latitude = position.coords.latitude;
            var longitude = position.coords.longitude;
            var coords = new google.maps.LatLng(latitude, longitude);

            // Direction Routing
            directionsService.route({
                //This Origin assumes they will be travelling from their current location. It will need to be changed when other locations become available.
                origin: coords,
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



