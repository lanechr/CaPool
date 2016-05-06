<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
        <meta name=viewport content="width=device-width, initial-scale=1">
		<title>CaPool</title>
        <!-- StyleSheets -->
		<link href="css/reset.css" rel="stylesheet" type="text/css">
		<link href="css/style.css" rel="stylesheet" type="text/css">
		<!-- Google Web Fonts & Icons -->
        <link href='https://fonts.googleapis.com/css?family=Raleway:400,300,300italic' rel='stylesheet' type='text/css'>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!-- jQuery -->
        <link rel="stylesheet" href= "http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
        <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <!-- JavaScript -->
        <script type="text/javascript" src="js/mapTwo.js"></script>
        <script type="text/javascript" src="js/buttonsTwo.js"></script>
        <!--Google Maps-->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCqSfE33soawqnehyoiU2Egmld9q3d_PbM&&libraries=places">
    </script>
	</head>
	<body>
        <!-- Section 1: Header -->
        <header>        
             <!-- Section 1A: Home Navigation -->
            <nav id="homeLogo" class="whiteBG">
                <a href="index.php"><h1>CaPool</h1></a>
                <a href="index.php"><h2>Shared Travel, Simplified</h2></a>
            </nav>

            <!-- Section 1B: MenuButtons -->
            <i id="toggle" class="material-icons md-48 menuIcon icons">menu</i>
            <i id="settingsToggle" class="material-icons md-48 settingsIcon icons" onclick="optionsMenu()">settings</i>
            
            <!-- Section 1C: Adress Input -->
            <input id="pac-input" class="pac-input controls" type="text" placeholder="Destination" onclick="hideTutorial()">
        </header>
        
        <!-- Section 2: Tutorial Overlay -->
        <div id="tutorial" class="overlay">
            <div>
                <h1>Destination</h1>
                <h2>Please enter your desired drop off destination above</h2>

                <div class="line"></div>

                <h1>Driver Selection</h1>
                <h2>Then choose your driver with the following icons</h2>
                <img src="images/tick.png" alt="Tick" class="tuteIcons">
                <img src="images/cross.png" alt="Cross" class="tuteIcons">
            </div>
        </div>
        <div id="tutorialBlur" class="blur fullWH"></div>
        
        <!-- Section 3: Opening Overlay -->
        <div id="openingOverlay" class="overlay">
            <a href="index.php"><h1>CaPool</h1></a>
            <a href="index.php"><h2>Shared Travel, Simplified</h2></a>
            
            <nav class="marginTop">
                <div id="driver" class="selection">
                    <a href="driver.php"><img src="images/driver.png" alt="Driver" class="imageSelect">
                    <h2>Driver</h2></a>
                </div>
            
                <div id="passenger" class="selection">
                    <img src="images/passenger.png" alt="Passenger" class="imageSelect" onclick="passengerMode()">
                    <h2>Passenger</h2>
                </div>
            </nav>
        </div>
        <div id="openingBlur" class="blur fullWH"></div>
        
        <!-- Section 4: Google Maps -->
        <div id="map" class="map passenger-map"></div>
		
        <!-- Section 5 (Aside) - Passenger Mode: Driver Information -->    
        <aside id="drivers" class="passengerInfo container whiteBG slide-in">
            
            <section id="OneDriver" class="driverList">
                <img src="images/headshotTwo.png" alt="Driver" class="driverImage">
                <h1 class="marginPix">Jessica Jones</h1>
                <h2 class="subtitle">503 SWD</h2>
                
                <div id="ratingOne" class="marginTop rating">
                    <div class="ratings">
                        <img src="images/smile.png" alt="Smile" class="ratingIcon">
                        <h2 class="ratingText lightBlueBG">98</h2>
                    </div>

                    <div class="ratings ratingsMiddle">
                        <img src="images/frown.png" alt="Frown" class="ratingIcon">
                        <h2 class="ratingText orangeBG">5</h2>
                    </div>

                    <div class="ratings">
                        <img src="images/car.png" alt="Frown" class="ratingIcon">
                        <h2 class="ratingText blackBG">4</h2>
                    </div>
                </div>
            </section>
            <section id="TwoDriver" class="driverList">
                <img src="images/headshotThree.png" alt="Driver" class="driverImage">
                <h1 class="marginPix">Marcus Jordan</h1>
                <h2>225 DDJ</h2>
                
                <div id="ratingTwo" class="marginTop rating">
                    <div class="ratings">
                        <img src="images/smile.png" alt="Smile" class="ratingIcon">
                        <h2 class="ratingText lightBlueBG">10</h2>
                    </div>

                    <div class="ratings ratingsMiddle">
                        <img src="images/frown.png" alt="Frown" class="ratingIcon">
                        <h2 class="ratingText orangeBG">1</h2>
                    </div>

                    <div class="ratings">
                        <img src="images/car.png" alt="Frown" class="ratingIcon">
                        <h2 class="ratingText blackBG">4</h2>
                    </div>
                </div>
            </section>
            <section id="ThreeDriver" class="driverList">
                <img src="images/headshotFive.png" alt="Driver" class="driverImage">
                <h1 class="marginPix">Maria Black</h1>
                <h2>166 CMJ</h2>
                
                <div id="ratingThree" class="marginTop rating">
                    <div class="ratings">
                        <img src="images/smile.png" alt="Smile" class="ratingIcon">
                        <h2 class="ratingText lightBlueBG">55</h2>
                    </div>

                    <div class="ratings ratingsMiddle">
                        <img src="images/frown.png" alt="Frown" class="ratingIcon">
                        <h2 class="ratingText orangeBG">17</h2>
                    </div>

                    <div class="ratings">
                        <img src="images/car.png" alt="Frown" class="ratingIcon">
                        <h2 class="ratingText blackBG">1</h2>
                    </div>
                </div>
            </section>
            
            <div class="selectionMargin">
                <img src="images/tick.png" alt="Tick" class="yesNo" id="yes">
                <img src="images/cross.png" alt="Cross" class="yesNo" id="no" onclick="driverList()">
            </div>
        </aside>
        
        <!-- Section 6 - Options Menu -->
        <div class="optionsMenu container">
            <div class="clock whiteBG">
                <input type="text" id="datepicker" placeholder="Pickup Date">
                <i id="clock" class="material-icons md-36 schedule">schedule</i>
                <div class="switch schedule">
                    <input id="cmn-toggle-4" class="cmn-toggle cmn-toggle-round-flat" checked type="checkbox">
                    <label for="cmn-toggle-4"></label>
                </div>
            </div>
            
            <div class="clock whiteBG marginTop">
                <input id="end" class="pac-input controls" type="text" placeholder="Pickup Location">
                <i id="pin" class="material-icons md-36 schedule">room</i>
                <div class="switch schedule">
                    <input id="cmn-toggle-1" class="cmn-toggle cmn-toggle-round-flat" type="checkbox">
                    <label for="cmn-toggle-1"></label>
                </div>
            </div>
        </div>   
    </body>
</html>

<!-- Section 7 - References (Images) -->
    <!-- References for images are given below -->

    <!-- arrow: http://uxrepo.com/icon/up-right-by-weathercons  -->
    <!-- car: http://www.freepik.com/free-photos-vectors/car-icon -->
    <!-- cross: http://www.freepik.com/free-photos-vectors/car-icon -->
    <!-- driver: http://pixhder.com/gallery/car+drivers+icon/30  -->
    <!-- frown: http://www.freepik.com/free-vector/flat-and-round-vector-emotion-icons_777836.htm#term=sad%20face&page=1&position=1 -->
    <!-- menuIcon: https://www.iconfinder.com/icons/134216/hamburger_lines_menu_icon -->
    <!-- money: http://simpleicon.com/coin-money-6.html -->
    <!-- passenger: http://pixhder.com/gallery/car+drivers+icon/32 -->
    <!-- smile: http://www.freepik.com/free-vector/flat-and-round-vector-emotion-icons_777836.htm#term=sad%20face&page=1&position=1 -->
    <!-- tick: http://www.pixempire.com/icon/tick-in-rounded-square-icon.html -->
    <!-- headShotOne: http://www.speedeondata.com/aboutus/brian-rainey -->
    <!-- headShotTwo: http://madphotoanddesign.com/2013/08/13/head-shots-mad-photo-design-le-mars-ia-portrait-photographer/  -->
    <!-- headShotThree: http://www.studiodental.com/team/  -->
    <!-- headShotFour: https://plus.google.com/100033222634608065791/posts -->
    <!-- headShotFive: http://laurenbfalk.com/about/ -->
    <!-- headShotSix: http://www.studiodental.com/team/ -->