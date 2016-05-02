// Used help from the below site for the cycling through of divs
// Other ways to do this were known, but this method was more
// efficient and succinct:
// http://stackoverflow.com/questions/6003060/cycle-through-divs
function driverList()
{
    var visiblePassenger = $('#drivers .driverList:visible');
    visiblePassenger.hide();
    var nextToShow = $(visiblePassenger).next('.driverList:hidden');
    if (nextToShow.length > 0) {
        nextToShow.show();
    } else {
        $('#drivers .driverList:hidden:first').show();
    }
    return false;
};

$(document).ready(function(){
    // Temporary driver changing
    $(".driverList").hide();
    $("#OneDriver").show();
    // Destination Input Area (HIDE)
    $("#toggle").hide();
    $(".controls").hide();
    // Left Panel (HIDE)
    $(".passengerInfo").hide();
    $("#sliderTwo").hide();
    // Tutorial (HIDE)
    $("#tutorial").hide();
    $("#tutorialBlur").hide();
    // Logo (HIDE)
    $("header").hide();
    
    // Opening Overaly (SHOW)
    $("#openingOverlay").show();
    $("#openingBlur").show();
    slider();
});

// Initialises Tutorial
function passengerMode()
{
    // Destination Input Area (SHOW)
    $("#toggle").hide();
    $(".controls").show();
    // Tutorial (SHOW)
    $("#tutorial").show();
    $("#tutorialBlur").show();
    // Left Panel (HIDE)
    $(".passengerInfo").hide();
    $("#sliderTwo").hide();
    // Logo (SHOW)
    $("header").show();
    
    // Opening Overaly (HIDE)
    $("#openingOverlay").hide();
    $("#openingBlur").hide();
}

function hideTutorial()
{
    // Tutorial (HIDE)
    $("#tutorial").hide();
    $("#tutorialBlur").hide();
}

function hideSearch()
{
    // Tutorial (HIDE)
    $("#pac-input").toggle();
}

// Used help from the below site for the implementation of slide-in animations
// http://stackoverflow.com/questions/16989585/css-slide-in-from-left-transition
function slider()
{
var $drivers = document.getElementById('drivers');
var $toggle = document.getElementById('toggle');

$toggle.addEventListener('click', function() {
    var isOpen = drivers.classList.contains('slide-in');

    drivers.setAttribute('class', isOpen ? 'passengerInfo container whiteBG border slide-out' : 'passengerInfo container whiteBG border slide-in');
});
}