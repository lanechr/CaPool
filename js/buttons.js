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
    
    $("#homeLogo").hide();
    
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
    $("#homeLogo").show();
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
}

    

            