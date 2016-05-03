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
    // Header Bar (HIDE)
    $(".headerBar").hide();
    // Options Menu (HIDE)
    $(".optionsMenu").hide();
    
    // Opening Overaly (SHOW)
    $("#openingOverlay").show();
    $("#openingBlur").show();
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
    // Destination Input Area (SHOW)
    $(".icons").hide();
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
    // Header Bar (SHOW)
    $(".headerBar").show();
    $("#settingsToggle").show();
    datePicker();
}

// https://jqueryui.com/datepicker/
function datePicker() {
    $("#datepicker").datepicker();
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

    drivers.setAttribute('class', isOpen ? 'passengerInfo container whiteBG slide-out' : 'passengerInfo container whiteBG slide-in');
});
}