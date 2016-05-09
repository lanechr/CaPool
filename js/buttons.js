$(document).ready(function(){ 
    // Destination Input Area (SHOW)
    $("#toggle").show();
    $(".controls").show();
    // Left Panel (SHOW)
    $("#sliderOne").show();
    $("#sliderTwo").show();
    
    // Opening Overaly (HIDE)
    $("#openingOverlay").hide();
    $("#openingBlur").hide();
    
    // Passenger List
    $(".passengerList").hide();
    $("#passengerOne").show();
    // Sliders
    $("#sliderOne").hide();
    $("#sliderTwo").hide();
    $("#toggle").hide();
    slider();
});

function hideTutorial()
{
    // Tutorial
    $("#tutorial").hide();
    $("#tutorialBlur").hide();
}

// Used help from the below site for the implementation of slide-in animations
// http://stackoverflow.com/questions/16989585/css-slide-in-from-left-transition
function slider()
{
var $sliderOne = document.getElementById('sliderOne');
var $sliderTwo = document.getElementById('sliderTwo');
var $toggle = document.getElementById('toggle');

$toggle.addEventListener('click', function() {
    var isOpen = $sliderOne.classList.contains('slide-in');

    $sliderOne.setAttribute('class', isOpen ? 'passengerInfo halfWH blueBG border slide-out' : 'passengerInfo halfWH blueBG border slide-in');
    $sliderTwo.setAttribute('class', isOpen ? 'passengerInfo2 halfWHlower blueBG border slide-out' : 'passengerInfo2 halfWHlower blueBG border slide-in');
});


// initialise and setup facebook js sdk
window.fbAsyncInit = function() { 
        FB.init({
          appId      : '1091776767535329',
          xfbml      : true,
          version    : 'v2.6'
        });
        FB.getLoginStatus(function(response) {
            if (response.status === 'connected') {
                document.getElementById('status').innerHTML = 'You are connected.';
            } else if (response.status === 'not_authorized') {
                document.getElementById('status').innerHTML = 'We are not logged in.'
            } else {
                document.getElementById('status').innerHTML = 'You are not logged into Facebook.';
            }
        });
};

(function(d, s, id){
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) {return;}
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));

    function login () { 
        FB.login(function(response) {
            if (response.status === 'connected') {
                document.getElementById('status').innerHTML = response.first_name + ' are connected.';
                document.getElementById('login').style.visibility = 'hidden';
            } else if (response.status === 'not_authorized') {
                document.getElementById('status').innerHTML = 'You are not logged in.'
            } else {
                document.getElementById('status').innerHTML = 'You are not logged into Facebook.';
            }
        }, {scope: 'email' });
    }

    function getInfo() {
        FB.api('/me', 'GET', {fields: 'first_name, last_name, name, id'}, function(response) {
            document.getElementById('status').innerHTML = response.first_name + " you are logged in";
        });

    }

            