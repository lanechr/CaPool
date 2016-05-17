// Used help from the below site for the cycling through of divs
// Other ways to do this were known, but this method was more
// efficient and succinct:
// http://stackoverflow.com/questions/6003060/cycle-through-divs
var token;
var fbLoggedIn;

function driverList() {
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

$(document).ready(function () {
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

    $("#hiddenfacebookloginform").hide();
    $("#status").hide();

    //Hide signup
    //    $("#signupOverlay").hide();
    //    $("#signupBlur").hide();

    // Opening Overaly (SHOW)
    //    $("#openingOverlay").hide();
    //    $("#openingBlur").hide();
    //    
    //    $('#loginOverlay').hide();
    //    $('#loginBlur').hide();
    slider();
});

$(document).ready(function () {
    $("#datepicker").hide();
    $('#cmn-toggle-4').change(function () {
        if (this.checked)
            $('#datepicker').fadeOut();
        else
            $('#datepicker').fadeIn();
    });
});

$(document).ready(function () {
    $('#cmn-toggle-1').change(function () {
        if (this.checked)
            $('#end').fadeOut();
        else
            $('#end').fadeIn();
    });
});

function optionsMenu() {
    var optionsMenu = $(".optionsMenu");
    if ($(".optionsMenu").is(":visible"))
        $(".optionsMenu").hide();
    else
        $(".optionsMenu").show();
}

// Initialises Tutorial
function passengerMode() {
    // Tutorial (SHOW)
    $("#tutorial").show();
    $("#tutorialBlur").show();
    $("#pac-input").show();
    // Opening Overaly (HIDE)
    $("#openingOverlay").hide();
    $("#openingBlur").hide();
}

function hideTutorial() {
    // Tutorial (HIDE)
    $("#tutorial").hide();
    $("#tutorialBlur").hide();
    // Header (SHOW)
    $("#settingsToggle").show();
    $("#homeLogo").show();
    // Logout (HIDE)
    $("#logoutform").hide();
    datePicker();
}

// https://jqueryui.com/datepicker/
function datePicker() {
    $("#datepicker").datepicker();
}

// Used help from the below site for the implementation of slide-in animations
// http://stackoverflow.com/questions/16989585/css-slide-in-from-left-transition
function slider() {
    var $drivers = document.getElementById('drivers');
    var $toggle = document.getElementById('toggle');

    $toggle.addEventListener('click', function () {
        var isOpen = drivers.classList.contains('slide-in');

        drivers.setAttribute('class', isOpen ? 'passengerInfo container whiteBG slide-out' : 'passengerInfo container whiteBG slide-in');
    });
}

function loggedIn() {

    $('#loginOverlay').hide();
    $('#loginBlur').hide();

    $("#openingOverlay").show();
    $("#openingBlur").show();

    $("#logoutform").show();

    $("#signupOverlay").hide();
    $("#signupBlur").hide();
}

function notLoggedIn() {

    $('#loginOverlay').show();
    $('#loginBlur').show();

    $("#openingOverlay").hide();
    $("#openingBlur").hide();

    $("#logoutform").hide();

    $("#signupOverlay").hide();
    $("#signupBlur").hide();
}

function showSignup() {

    $('#loginOverlay').hide();
    $('#loginBlur').hide();

    $("#openingOverlay").hide();
    $("#openingBlur").hide();

    $("#logoutform").hide();

    $("#signupOverlay").show();
    $("#signupBlur").show();
}

function showLogin() {

    $('#loginOverlay').show();
    $('#loginBlur').show();

    $("#openingOverlay").hide();
    $("#openingBlur").hide();

    $("#logoutform").hide();

    $("#signupOverlay").hide();
    $("#signupBlur").hide();
}



// initialise and setup facebook js sdk
window.fbAsyncInit = function () {
    FB.init({
        appId: '1091776767535329'
        , xfbml: true
        , version: 'v2.6'
    });
    FB.getLoginStatus(function (response) {
        if (response.status === 'connected') {
            document.getElementById('status').innerHTML = 'You are connected.';
            insertUserProfilePic();
        } else if (response.status === 'not_authorized') {
            document.getElementById('status').innerHTML = 'We are not logged in.'
        } else {
            document.getElementById('status').innerHTML = 'You are not logged into Facebook.';
        }
    });
};

(function (d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) {
        return;
    }
    js = d.createElement(s);
    js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

function login() {
    FB.login(function (response) {
        token = response.authResponse.accessToken;
        if (response.status === 'connected') {
            document.getElementById('status').innerHTML = 'You are connected.';
            document.getElementById('login').style.visibility = 'hidden';

            FB.api('/me', 'GET', {
                access_token: token
                , fields: 'first_name, last_name, id, email'
            }, function (response) {
                //login though facebook
                $("#facebookidinput").val(response.id);
                $("#facebookfnameinput").val(response.first_name);
                $("#facebooklnameinput").val(response.last_name);
                $("#facebookemailinput").val(response.email);
                $("#hiddenfacebookloginform").submit();
            });
        } else if (response.status === 'not_authorized') {
            document.getElementById('status').innerHTML = 'You are not logged in.'
        } else {
            document.getElementById('status').innerHTML = 'You are not logged into Facebook.';
        }
    }, {
        scope: 'public_profile,email'
    });

}

function getInfo() {
    FB.api('/me', 'GET', {
        fields: 'first_name, last_name, name, id'
    }, function (response) {
        document.getElementById('status').innerHTML = response.id + " you are logged in";
    });

}

function insertUserProfilePic() {
    FB.api('/me', 'GET', {
        fields: 'id'
    }, function (response) {
        if ($('#loggedInUserFBImg').length != 0){
            $('#loggedInUserFBImg').css("background-image", "url(https://graph.facebook.com/" + response.id + "/picture?type=large)");
        }
    });
}

function insertProfilePicByID(FBID) {
    $('#loggedInUserFBImg').css("background-image", "url(https://graph.facebook.com/" + FBID + "/picture?type=large)");
}