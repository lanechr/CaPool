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
    // Left Panel (HIDE)
    $(".passengerInfo").hide();
    // Tutorial (HIDE)
    $("#tutorial").hide();
    $("#tutorialBlur").hide();
    // Header (HIDE)
    $("#toggle").hide();
    $("#settingsToggle").hide();
    $("#homeLogo").hide();
    $("#pac-input").hide();
    // Options Menu (HIDE)
    $(".optionsMenu").hide();
    
    // Opening Overaly (SHOW)
//    $("#openingOverlay").hide();
//    $("#openingBlur").hide();
//    
//    $('#loginOverlay').hide();
//    $('#loginBlur').hide();
    slider();
});

$(document).ready(function(){
    $("#datepicker").hide();
    $('#cmn-toggle-4').change(function(){
        if(this.checked)
            $('#datepicker').fadeOut();
        else
            $('#datepicker').fadeIn();
    });
});

$(document).ready(function(){
    $('#cmn-toggle-1').change(function(){
        if(this.checked)
            $('#end').fadeOut();
        else
            $('#end').fadeIn();
    });
});

function optionsMenu(){
    var optionsMenu = $(".optionsMenu");
    if ($(".optionsMenu").is(":visible"))
        $(".optionsMenu").hide();
    else
        $(".optionsMenu").show();
}

// Initialises Tutorial
function passengerMode()
{
    // Tutorial (SHOW)
    $("#tutorial").show();
    $("#tutorialBlur").show();
    $("#pac-input").show();
    // Opening Overaly (HIDE)
    $("#openingOverlay").hide();
    $("#openingBlur").hide();
}

function hideTutorial()
{
    // Tutorial (HIDE)
    $("#tutorial").hide();
    $("#tutorialBlur").hide();
    // Header (SHOW)
    $("#settingsToggle").show();
    $("#homeLogo").show();
    datePicker();
}

// https://jqueryui.com/datepicker/
function datePicker() {
    $("#datepicker").datepicker();
}

// Used help from the below site for the implementation of slide-in animations
// http://stackoverflow.com/questions/16989585/css-slide-in-from-left-transition
function slider()
{
var $drivers = document.getElementById('drivers');
var $toggle = document.getElementById('toggle');

$toggle.addEventListener('click', function() {
    var isOpen = drivers.classList.contains('slide-in');

    drivers.setAttribute('class', isOpen ? 'passengerInfo container whiteBG slide-out' : 'passengerInfo container whiteBG slide-in');
});
}

function loggedIn() {

    $('#loginOverlay').hide();
    $('#loginBlur').hide();
    
    $("#openingOverlay").show();
    $("#openingBlur").show();
}

function notLoggedIn() {

    $('#loginOverlay').show();
    $('#loginBlur').show();
    
    $("#openingOverlay").hide();
    $("#openingBlur").hide();
}