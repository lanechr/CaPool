<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<title>CaPool: Driver Mode</title>
	<!-- Mobile Optimisation -->
	<meta name=viewport content="width=device-width, initial-scale=1">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
	<!-- StyleSheets -->
	<link href="css/reset.css" rel="stylesheet" type="text/css">
	<link href="css/style.css" rel="stylesheet" type="text/css">
	<!-- Google Materialize StyleSheet-->
	<link rel="stylesheet" href="css/materialize.css">
	<!-- Google Web Fonts & Icons -->
	<link href='https://fonts.googleapis.com/css?family=Raleway:400,300,300italic' rel='stylesheet' type='text/css'>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<!-- JavaScript -->
	<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="js/map.js"></script>
	<script type="text/javascript" src="js/buttons.js"></script>
	<!--Google Maps-->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCqSfE33soawqnehyoiU2Egmld9q3d_PbM&&libraries=places">
	</script>
	<!-- Favicons -->
	<link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192" href="/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
	<link rel="manifest" href="/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">
</head>

<body>
	<!-- Section 1: Header -->
	<header>
		<!-- Section 1A: Home Navigation -->
		<nav id="homeLogo" class="whiteBG">
			<div id="logo">
				<a href="index.php"><h1>CaPool</h1></a>
				<a href="index.php"><h2>Shared Travel, Simplified</h2></a>
				<div id="loggedInUserFBImg"></div>
			</div>
		</nav>

		<!-- Section 1B: MenuButtons -->
		<i id="toggle" class="material-icons md-48 menuIcon icons">menu</i>
		<!--            <i id="settingsToggle" class="material-icons md-48 settingsIcon icons" onclick="optionsMenu()">settings</i>-->

		<!-- Section 1C: Adress Input -->
		<input id="pac-input" class="pac-input controls" type="text" placeholder="Destination" onclick="hideTutorial()">
	</header>

	<!-- Section 2: Tutorial Overlay -->
	<div id="tutorial" class="overlay">
		<div>
			<h1>Destination</h1>
			<h2>Please enter your driving destination</h2>

			<div class="line"></div>

			<h1>Passenger Selection</h1>
			<h2>Then choose your passenger with the following icons</h2>
			<img src="images/tick.png" alt="Tick" class="tuteIcons">
			<img src="images/cross.png" alt="Cross" class="tuteIcons">
		</div>
	</div>
	<div id="tutorialBlur" class="blur fullWH"></div>

	<!-- Section 3: Google Maps -->
	<div id="map" class="map driver-map"></div>

	<!-- Section 4 (Aside) - Driver Mode: Passenger Information -->
	<aside id="sliderOne" class="passengerInfo container blueBG slide-in">
		<!--<nav id="modeSelection">
			<a href="index.php"><img src="images/driver.png" alt="Driver" class="mode">
				<h2 class="modeCaption">Driver Mode</h2></a>
		</nav>-->

		<!-- List of Passenger to alternate through -->
		<!--    - Will be retrieved from server in actual website -->
		<!--    - Just using this method to demonstrate protoype -->
		<section id="passengerOne" class="passengerList">
			<img src="images/headshotOne.png" alt="Driver" class="driverImage">
			<h1 class="marginPix">Tiger Woods</h1>

			<div id="ratingOne" class="marginTop rating">
				<div class="ratings">
					<img src="images/smile.png" alt="Smile" class="ratingIcon">
					<h2 class="ratingText lightBlueBG">52</h2>
				</div>

				<div class="ratings ratingsSecond">
					<img src="images/frown.png" alt="Frown" class="ratingIcon">
					<h2 class="ratingText orangeBG">1</h2>
				</div>

				<div class="ratings ratingsSecond">
					<img src="images/car.png" alt="Car" class="ratingIcon">
					<h2 class="ratingText blackBG">2</h2>
				</div>

				<div class="ratings ratingsSecond">
					<img src="images/money.png" alt="Payment" class="ratingIcon">
					<h2 class="ratingText greenBG">Parking</h2>
				</div>
			</div>
		</section>
		<section id="passsengerTwo" class="passengerList">
			<img src="images/headshotThree.png" alt="Driver" class="driverImage">
			<h1 class="marginPix">Dave Bryant</h1>

			<div id="ratingTwo" class="marginTop rating">
				<img src="images/smile.png" alt="Smile" class="ratingIcon">
				<h2 class="ratingText lightBlueBG">60</h2>

				<img src="images/frown.png" alt="Frown" class="ratingIcon">
				<h2 class="ratingText orangeBG">7</h2>

				<img src="images/car.png" alt="Car" class="ratingIcon">
				<h2 class="ratingText blackBG">1</h2>

				<img src="images/money.png" alt="Payment" class="ratingIcon">
				<h2 class="ratingText">$5</h2>
			</div>
		</section>
		<section id="passsengerThree" class="passengerList">
			<img src="images/headshotFour.png" alt="Driver" class="driverImage">
			<h1 class="marginPix">Susie Odonald</h1>

			<div id="ratingThree" class="marginTop rating">
				<img src="images/smile.png" alt="Smile" class="ratingIcon">
				<h2>20</h2>

				<img src="images/frown.png" alt="Frown" class="ratingIcon">
				<h2>15</h2>

				<img src="images/car.png" alt="Car" class="ratingIcon">
				<h2>2</h2>

				<img src="images/money.png" alt="Payment" class="ratingIcon">
				<h2>$6</h2>
			</div>
		</section>
		<section id="passsengerFour" class="passengerList">
			<img src="images/headshotFive.png" alt="Driver" class="driverImage">
			<h1 class="marginPix">Laura Martin</h1>

			<div id="ratingFour" class="marginTop rating">
				<img src="images/smile.png" alt="Smile" class="ratingIcon">
				<h2>10</h2>

				<img src="images/frown.png" alt="Frown" class="ratingIcon">
				<h2>12</h2>

				<img src="images/car.png" alt="Car" class="ratingIcon">
				<h2>2</h2>

				<img src="images/money.png" alt="Payment" class="ratingIcon">
				<h2>Parking</h2>
			</div>
		</section>
		<section id="passsengerFive" class="passengerList">
			<img src="images/headshotSix.png" alt="Driver" class="driverImage">
			<h1 class="marginPix">Sarah Fryer</h1>

			<div id="ratingFive" class="marginTop rating">
				<img src="images/smile.png" alt="Smile" class="ratingIcon">
				<h2>90</h2>

				<img src="images/frown.png" alt="Frown" class="ratingIcon">
				<h2>1</h2>

				<img src="images/car.png" alt="Car" class="ratingIcon">
				<h2>1</h2>

				<img src="images/money.png" alt="Payment" class="ratingIcon">
				<h2>$8</h2>
			</div>
		</section>

		<div class="selectionMargin">
			<img src="images/tick.png" alt="Tick" class="yesNo" id="yes">
			<img src="images/cross.png" alt="Cross" class="yesNo" id="no" onclick="passengerList()">
		</div>
	</aside>

	<!-- Section 5 (Aside) - Driver Mode: Pickup Options -->
	<!-- Switches: http://callmenick.com/post/css-toggle-switch-examples 
	<aside id="sliderTwo" class="passengerInfo2 halfWHlower blueBG slide-in">
		<div class="topHalf">
			<div class="switch">
				<input id="cmn-toggle-1" class="cmn-toggle cmn-toggle-round-flat" type="checkbox" checked>
				<label for="cmn-toggle-1"></label>
			</div>
			<h3 class="pickupSelect">Start Here</h3>
		</div>

		<div class="bottomHalf">
			<div class="switch">
				<input id="cmn-toggle-4" class="cmn-toggle cmn-toggle-round-flat" type="checkbox" checked>
				<label for="cmn-toggle-4"></label>
			</div>
			<h3 class="pickupSelect">Start Now</h3>
		</div>
	</aside> -->
	<?php
            session_start();
            if (isset($_SESSION['FBID'])) {
                    $pictureID = $_SESSION['FBID'];
                echo "<div id='hiddenfbidholder'>" . $pictureID . "</div>";
            }
        ?>
</body>

</html>

<!-- Section 6 - References (Images) -->
<!-- References for images are given below -->

<!-- arrow: http://uxrepo.com/icon/up-right-by-weathercons  -->
<!-- car: http://www.freepik.com/free-photos-vectors/car-icon -->
<!-- cross: http://www.freepik.com/free-photos-vectors/car-icon -->
<!-- driver: http://pixhder.com/gallery/car+drivers+icon/30  -->
<!-- frown: http://www.freepik.com/free-vector/flat-and-round-vector-emotion-icons_777836.htm#term=sad%20face&page=1&position=1 -->
<!-- menuIcon: https://www.iconfinder.com/icons/134216/hamburger_lines_menu_icon -->
<!-- money: http://www.clipartpanda.com/categories/save-money-icon -->
<!-- passenger: http://pixhder.com/gallery/car+drivers+icon/32 -->
<!-- smile: http://www.freepik.com/free-vector/flat-and-round-vector-emotion-icons_777836.htm#term=sad%20face&page=1&position=1 -->
<!-- tick: http://www.pixempire.com/icon/tick-in-rounded-square-icon.html -->
<!-- headShotOne: http://www.speedeondata.com/aboutus/brian-rainey -->
<!-- headShotTwo: http://madphotoanddesign.com/2013/08/13/head-shots-mad-photo-design-le-mars-ia-portrait-photographer/  -->
<!-- headShotThree: http://www.studiodental.com/team/  -->
<!-- headShotFour: https://plus.google.com/100033222634608065791/posts -->
<!-- headShotFive: http://laurenbfalk.com/about/ -->
<!-- headShotSix: http://www.studiodental.com/team/ -->