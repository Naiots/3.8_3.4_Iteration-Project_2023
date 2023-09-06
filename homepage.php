<?php
// Session start
session_start();
// If the user isnt't logged in, redirect them to the landing page
if(!isset($_SESSION['login_user'])){
	header("location: index.php");
}
// Otherwise, store their first name into dedicated a variable for later use
else{
	$User = $_SESSION['login_user'];
}

// Array of messages
$messages = [
	"Welcome back ",
	"Lets find what you're looking for ",
	"Scroll down to find your song ",
	"Here's a riddle: who's the best user?<br>Answer: ",
	"Hello ",
	"Hi ",
	"Get ready for some bangers ",
];

// Generate a random index within the array range
$randomIndex = mt_rand(0, count($messages) - 1);

// Display the randomly selected message
$randomMessage = $messages[$randomIndex];
$quip = "<span>$randomMessage</span>";

?>

<!DOCTYPE html>
<!-- Define document language -->
<html lang="en">
	<head>

		<!-- Add a title so the user knows what page they're on even if they're in another page -->
		<title>Graeme's Music | Home</title>
		
		<!-- Favicon to make the website's tab unique and personalized to other website tabs -->
		<link rel="icon" type="image/x-icon" href="images/logos/favicon.ico">

		<!-- Setup Meta Data and let the browser know what charset is being used -->
		<meta charset="UTF-8">
		<meta name="description" content="Welcome to Graeme's Music! Relax, and let us take care of your musical needs.">
		<meta name="keywords" content="Music, Database, Graeme">
		<meta name="author" content="SJeames">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- Setup and link all external css stylesheets -->
		<link rel="stylesheet" type="text/css" href="nav_1.css">
		<link rel="stylesheet" type="text/css" href="fonts.css">
		<link rel="stylesheet" type="text/css" href="divs.css">
		<link rel="stylesheet" href="splide/splide-default.min.css">
	</head>

	<body>

		<?php
		//Pulls the links from the nav.php page and places them in the navigation div
		require 'loader.php'; //'require' is 100% needed for the site to run 
		?>

		<main>
			<div class = "wrapper">
				<div class = "nav">
					<?php
					//Pulls the links from the nav.php page and places them in the navigation div
					require 'nav_1.php'; //'require' is 100% needed for the site to run 
					?>

				</div>

				<div class="content">

					<!-- Empty div to space out the next divisions from the top -->
					<div id = "empty2"></div>

					<!-- A division that holds a greeting and an image to greet the user to the homepage -->
					<div id = "greeting">

						<div id = "greeting-text"style = 'padding-top: 18vw;'>

							<!-- Prints the randomly generated message from line 27 and the user's first name to make the experience different and personal everytime the user logs in -->
							<?php echo "<span>" . $quip . "</span> <span>" . ($_SESSION['login_user']) . "!</span>" ?>
							<p style = "font-size: 1.1vw;">Let's listen to some music</p>

						</div>

					</div>

					<!-- "playlists" holds the page's main content -->
					<div id = "playlists">

						<!-- Javascript from an imported library to easily edit all the carousels  -->
						<script>
							document.addEventListener( 'DOMContentLoaded', function() {
								var elms = document.getElementsByClassName( 'splide' );

								// Custom settings
								Splide.defaults = {
									type   : 'loop',
									drag   : 'free',
									perPage: 5,
									perMove: 1,
									snap   : true,
									wheel  : true,
									focus  : 0,
								}

								// Allows as many carousel as possible
								for ( var i = 0; i < elms.length; i++ ) {
									new Splide( elms[ i ] ).mount();
								}
							} );
						</script>

						<!-- Start of carousel -->
						<section class="splide" aria-labelledby="carousel-heading" style = "padding-bottom: 5vw; padding-top: 5vw; text-align: center;">

							<!-- Heading for the carousel -->
							<h1 id="carousel-heading" style = "text-align: left; width: 49%; display: inline-block; margin-bottom: 1vw; font-size: 2vw;" >Graeme's First Query</h1>

							<!-- Adds a "See All" button which is a link to the query's page -->
							<div class = "nav" style = "width: 49%; display: inline-block;">
								<div class = "buttons" style = "padding-left: 15vw; margin-bottom: 2.5vw;">
									<ul style = "margin-top: 0;">
										<li class = "login"><a href="query1.php" style = "font-size: 1.225vw;">See All</a></li>
									</ul>
								</div>
							</div>

							<!-- All desired images in order for the carousel -->
							<div class="splide__track">
								<ul class="splide__list">
									<li class="splide__slide" data-splide-interval="10000"><img src = "images/firstQuery/Zombie.jpg" style = "width: 17.7vw;" alt = "Zombie"></li>
									<li class="splide__slide" data-splide-interval="10000"><img src = "images/firstQuery/A_Hundred_Miles_Or_More.jpg" style = "width: 17.7vw;" alt = "A Hundred Miles Or More"></li>
									<li class="splide__slide" data-splide-interval="10000"><img src = "images/firstQuery/Dixie_Chicks.jpg" style = "width: 17.7vw;" alt = "Dixie Chicks"></li>
									<li class="splide__slide" data-splide-interval="10000"><img src = "images/firstQuery/Live_In_Texas.jpg" style = "width: 17.7vw;" alt = "Live In Texas"></li>
									<li class="splide__slide" data-splide-interval="10000"><img src = "images/firstQuery/Songs_From_The_Front_Lawn.jpg" style = "width: 17.7vw;" alt = "Songs From The Front Lawn"></li>
									<li class="splide__slide" data-splide-interval="10000"><img src = "images/firstQuery/Smilewound.jpg" style = "width: 17.7vw;" alt = "Smilewound"></li>
									<li class="splide__slide" data-splide-interval="10000"><img src = "images/firstQuery/Music_For_Lovers.jpg" style = "width: 17.7vw;" alt = "Music For Lovers"></li>
									<li class="splide__slide" data-splide-interval="10000"><img src = "images/firstQuery/Early_Alchemy.jpg" style = "width: 17.7vw;" alt = "Early Alchemy"></li>
									<li class="splide__slide" data-splide-interval="10000"><img src = "images/firstQuery/The_Best_Of_Joe_Cocker.jpg" style = "width: 17.7vw;" alt = "The Best Of Joe Cocker"></li>
									<li class="splide__slide" data-splide-interval="10000"><img src = "images/firstQuery/California.jpg" style = "width: 17.7vw;" alt = "California"></li>
									<li class="splide__slide" data-splide-interval="10000"><img src = "images/firstQuery/TLS_HCtS.jpg" style = "width: 17.7vw;" alt = "To Love Somebody, Here Comes the Sun"></li>
									<li class="splide__slide" data-splide-interval="10000"><img src = "images/firstQuery/Til_We_Outnumber_Em.jpg" style = "width: 17.7vw;" alt = "Til We Outnumber 'Em"></li>
									<li class="splide__slide" data-splide-interval="10000"><img src = "images/firstQuery/His_Young_Heart.jpg" style = "width: 17.7vw;" alt = "His Young Heart"></li>
									<li class="splide__slide" data-splide-interval="10000"><img src = "images/firstQuery/Listen.jpg" style = "width: 17.7vw;" alt = "Listen"></li>
									<li class="splide__slide" data-splide-interval="10000"><img src = "images/firstQuery/At_Budokan.jpg" style = "width: 17.7vw;" alt = "At Budokan"></li>
									<li class="splide__slide" data-splide-interval="10000"><img src = "images/firstQuery/Fundamental.jpg" style = "width: 17.7vw;" alt = "Fundamental"></li>
									<li class="splide__slide" data-splide-interval="10000"><img src = "images/firstQuery/Food_In_The_Belly.jpg" style = "width: 17.7vw;" alt = "Food In The Belly"></li>
									<li class="splide__slide" data-splide-interval="10000"><img src = "images/firstQuery/Flying_Cowboys.jpg" style = "width: 17.7vw;" alt = "Flying Cowboys"></li>
									<li class="splide__slide" data-splide-interval="10000"><img src = "images/firstQuery/Love_This_Giant.jpg" style = "width: 17.7vw;" alt = "Love This Giant"></li>
									<li class="splide__slide" data-splide-interval="10000"><img src = "images/firstQuery/Walk_Like_An_Egyptian.jpg" style = "width: 17.7vw;" alt = "Walk Like An Egyptian"></li>
									<li class="splide__slide" data-splide-interval="10000"><img src = "images/firstQuery/Greatest_Hits.jpg" style = "width: 17.7vw;" alt = "Greatest Hits"></li>
									<li class="splide__slide" data-splide-interval="10000"><img src = "images/firstQuery/CMT_Crossroads.jpg" style = "width: 17.7vw;" alt = "CMT Crossroads"></li>
								</ul>
							</div>
						</section>
						<!-- End of carousel -->

						<!-- Start of carousel -->
						<section class="splide" aria-labelledby="carousel-heading" style = "padding-bottom: 5vw; padding-top: 5vw; text-align: center;">

							<!-- Heading for the carousel -->
							<h1 id="carousel-heading" style = "text-align: left; width: 49%; display: inline-block; margin-bottom: 1vw; font-size: 2vw;" >Graeme's Second Query</h1>

							<!-- Adds a "See All" button which is a link to the query's page -->
							<div class = "nav" style = "width: 49%; display: inline-block;">
								<div class = "buttons" style = "padding-left: 15vw; margin-bottom: 2.5vw;">
									<ul style = "margin-top: 0;">
										<li class = "login"><a href="query2.php" style = "font-size: 1.225vw;">See All</a></li>
									</ul>
								</div>
							</div>

							<!-- All desired images in order for the carousel -->
							<div class="splide__track">
								<ul class="splide__list">
									<li class="splide__slide" data-splide-interval="10000"><img src = "images/secondQuery/Early_Alchemy.jpg" style = "width: 17.7vw;" alt = "Early Alchemy"></li>
									<li class="splide__slide" data-splide-interval="10000"><img src = "images/secondQuery/Early_Alchemy.jpg" style = "width: 17.7vw;" alt = "Early Alchemy"></li>
									<li class="splide__slide" data-splide-interval="10000"><img src = "images/secondQuery/Fields_Of_Fire.jpg" style = "width: 17.7vw;" alt = "Fields Of Fire"></li>
									<li class="splide__slide" data-splide-interval="10000"><img src = "images/secondQuery/Love_This_Giant.jpg" style = "width: 17.7vw;" alt = "Love This Giant"></li>
									<li class="splide__slide" data-splide-interval="10000"><img src = "images/secondQuery/Watermark.jpg" style = "width: 17.7vw;" alt = "Watermark"></li>
									<li class="splide__slide" data-splide-interval="10000"><img src = "images/secondQuery/Sarah_Slean.jpg" style = "width: 17.7vw;" alt = "Early Alchemy"></li>
									<li class="splide__slide" data-splide-interval="10000"><img src = "images/secondQuery/Sarah_Slean.jpg" style = "width: 17.7vw;" alt = "Early Alchemy"></li>
									<li class="splide__slide" data-splide-interval="10000"><img src = "images/secondQuery/Fallen.jpg" style = "width: 17.7vw;" alt = "Fields Of Fire"></li>
									<li class="splide__slide" data-splide-interval="10000"><img src = "images/secondQuery/Zombie.jpg" style = "width: 17.7vw;" alt = "Love This Giant"></li>
									<li class="splide__slide" data-splide-interval="10000"><img src = "images/secondQuery/Songs_From_The_Front_Lawn.jpg" style = "width: 17.7vw;" alt = "Watermark"></li>
									<li class="splide__slide" data-splide-interval="10000"><img src = "images/secondQuery/A_Hundred_Miles_Or_More.jpg" style = "width: 17.7vw;" alt = "A_Hundred_Miles_Or_More"></li>
									<li class="splide__slide" data-splide-interval="10000"><img src = "images/secondQuery/A_Hundred_Miles_Or_More.jpg" style = "width: 17.7vw;" alt = "A_Hundred_Miles_Or_More"></li>
									<li class="splide__slide" data-splide-interval="10000"><img src = "images/secondQuery/Flying_Cowboys.jpg" style = "width: 17.7vw;" alt = "Fields Of Fire"></li>
									<li class="splide__slide" data-splide-interval="10000"><img src = "images/secondQuery/Shamrock_Diaries.jpg" style = "width: 17.7vw;" alt = "Love This Giant"></li>
									<li class="splide__slide" data-splide-interval="10000"><img src = "images/secondQuery/Say_You_Will.jpg" style = "width: 17.7vw;" alt = "Watermark"></li>
									<li class="splide__slide" data-splide-interval="10000"><img src = "images/secondQuery/Five_Minutes_With_Arctic_Monkeys.jpg" style = "width: 17.7vw;" alt = "Five_Minutes_With_Arctic_Monkeys"></li>
									<li class="splide__slide" data-splide-interval="10000"><img src = "images/secondQuery/Live_In_Texas.jpg" style = "width: 17.7vw;" alt = "Early Alchemy"></li>
									<li class="splide__slide" data-splide-interval="10000"><img src = "images/secondQuery/Gael_Force.jpg" style = "width: 17.7vw;" alt = "Fields Of Fire"></li>
									<li class="splide__slide" data-splide-interval="10000"><img src = "images/secondQuery/Shona_Laing.jpg" style = "width: 17.7vw;" alt = "Love This Giant"></li>
									<li class="splide__slide" data-splide-interval="10000"><img src = "images/secondQuery/At_Budokan.jpg" style = "width: 17.7vw;" alt = "Watermark"></li>
									<li class="splide__slide" data-splide-interval="10000"><img src = "images/secondQuery/At_Budokan.jpg" style = "width: 17.7vw;" alt = "Love This Giant"></li>
									<li class="splide__slide" data-splide-interval="10000"><img src = "images/secondQuery/Dixie_Chicks.jpg" style = "width: 17.7vw;" alt = "Watermark"></li>
								</ul>
							</div>
						</section>
						<!-- End of carousel -->

						<!-- Start of carousel -->
						<section class="splide" aria-labelledby="carousel-heading" style = "padding-bottom: 5vw; padding-top: 5vw; text-align: center;">

							<!-- Heading for the carousel -->
							<h1 id="carousel-heading" style = "text-align: left; width: 49%; display: inline-block; margin-bottom: 1vw; font-size: 2vw;" >Pop</h1>

							<!-- Adds a "See All" button which is a link to the query's page -->
							<div class = "nav" style = "width: 49%; display: inline-block;">
								<div class = "buttons" style = "padding-left: 15vw; margin-bottom: 2.5vw;">
									<ul style = "margin-top: 0;">
										<li class = "login"><a href="query3.php" style = "font-size: 1.225vw;">See All</a></li>
									</ul>
								</div>
							</div>

							<!-- All desired images in order for the carousel -->
							<div class="splide__track">
								<ul class="splide__list">
									<li class="splide__slide" data-splide-interval="10000"><img src = "images/pop/From_Detroit_to_St_Germain.jpg" style = "width: 17.7vw;" alt = "From Detroit To St Germain"></li>
									<li class="splide__slide" data-splide-interval="10000"><img src = "images/pop/All_Things_Bright_and_Beautiful.jpg" style = "width: 17.7vw" alt = "All Thing Bright And Beautiful"></li>
									<li class="splide__slide" data-splide-interval="10000"><img src = "images/pop/The_Definitive_Collection.jpg" style = "width: 17.7vw" alt = "The Definitive Collection"></li>
									<li class="splide__slide" data-splide-interval="10000"><img src = "images/pop/Hoea.jpg" style = "width: 17.7vw" alt = "Hoea"></li>
									<li class="splide__slide" data-splide-interval="10000"><img src = "images/pop/Five_Minutes_With_Arctic_Monkeys.jpg" style = "width: 17.7vw" alt = "Five Minutes With Arctic Monkeys"></li>
									<li class="splide__slide" data-splide-interval="10000"><img src = "images/pop/Soul_Divas.jpg" style = "width: 17.7vw;" alt = "Soul Divas"></li>
									<li class="splide__slide" data-splide-interval="10000"><img src = "images/pop/The_Collection.jpg" style = "width: 17.7vw" alt = "The Collection"></li>
									<li class="splide__slide" data-splide-interval="10000"><img src = "images/pop/Hoea.jpg" style = "width: 17.7vw" alt = "Hoea"></li>
									<li class="splide__slide" data-splide-interval="10000"><img src = "images/pop/From_Detroit_to_St_Germain.jpg" style = "width: 17.7vw" alt = "From Detroit To St Germain"></li>
									<li class="splide__slide" data-splide-interval="10000"><img src = "images/pop/The_Collection.jpg" style = "width: 17.7vw" alt = "The Collection"></li>
									<li class="splide__slide" data-splide-interval="10000"><img src = "images/pop/Bring_Me_Home.jpg" style = "width: 17.7vw;" alt = "Bring Me Home"></li>
									<li class="splide__slide" data-splide-interval="10000"><img src = "images/pop/Listen.jpg" style = "width: 17.7vw" alt = "Listen"></li>
									<li class="splide__slide" data-splide-interval="10000"><img src = "images/pop/10_Years_Of_Hits.jpg" style = "width: 17.7vw" alt = "10 Years Of Hits"></li>
									<li class="splide__slide" data-splide-interval="10000"><img src = "images/pop/The_Cross_of_Changes.jpg" style = "width: 17.7vw" alt = "The Cross Of Changes"></li>
									<li class="splide__slide" data-splide-interval="10000"><img src = "images/pop/Footrot_Flats.jpg" style = "width: 17.7vw" alt = "Footrot Flats"></li>
									<li class="splide__slide" data-splide-interval="10000"><img src = "images/pop/Walk_Like_An_Egyptian.jpg" style = "width: 17.7vw;" alt = "Walk Like An Egyptian"></li>
									<li class="splide__slide" data-splide-interval="10000"><img src = "images/pop/Fundamental.jpg" style = "width: 17.7vw" alt = "Fundamental"></li>
									<li class="splide__slide" data-splide-interval="10000"><img src = "images/pop/Listen.jpg" style = "width: 17.7vw" alt = "Listen"></li>
									<li class="splide__slide" data-splide-interval="10000"><img src = "images/pop/His_Young_Heart.jpg" style = "width: 17.7vw" alt = "His Young Heart"></li>
									<li class="splide__slide" data-splide-interval="10000"><img src = "images/pop/California.jpg" style = "width: 17.7vw" alt = "California"></li>
									<li class="splide__slide" data-splide-interval="10000"><img src = "images/pop/Smilewound.jpg" style = "width: 17.7vw;" alt = "Smilewound"></li>
									<li class="splide__slide" data-splide-interval="10000"><img src = "images/pop/Live_In_Texas.jpg" style = "width: 17.7vw" alt = "Live In Texas"></li>
								</ul>
							</div>
						</section>
						<!-- End of carousel -->

						<!-- Start of carousel -->
						<section class="splide" aria-labelledby="carousel-heading" style = "padding-bottom: 5vw; padding-top: 5vw; text-align: center;">

							<!-- Heading for the carousel -->
							<h1 id="carousel-heading" style = "text-align: left; width: 49%; display: inline-block; margin-bottom: 1vw; font-size: 2vw;" >Country</h1>

							<!-- Adds a "See All" button which is a link to the query's page -->
							<div class = "nav" style = "width: 49%; display: inline-block;">
								<div class = "buttons" style = "padding-left: 15vw; margin-bottom: 2.5vw;">
									<ul style = "margin-top: 0;">
										<li class = "login"><a href="query4.php" style = "font-size: 1.225vw;">See All</a></li>
									</ul>
								</div>
							</div>

							<!-- All desired images in order for the carousel -->
							<div class="splide__track">
								<ul class="splide__list">
									<li class="splide__slide" data-splide-interval="10000"><img src = "images/country/American_Heart.jpg" style = "width: 17.7vw;" alt = "American Heart"></li>
									<li class="splide__slide" data-splide-interval="10000"><img src = "images/country/American_Pie.jpg" style = "width: 17.7vw;" alt = "American Pie"></li>
									<li class="splide__slide" data-splide-interval="10000"><img src = "images/country/I_Hope_You_Dance.jpg" style = "width: 17.7vw;" alt = "I Hope You Dance"></li>
									<li class="splide__slide" data-splide-interval="10000"><img src = "images/country/Greatest_Hits.jpg" style = "width: 17.7vw;" alt = "Greatest Hits"></li>
									<li class="splide__slide" data-splide-interval="10000"><img src = "images/country/At_Budokan.jpg" style = "width: 17.7vw;" alt = "At Budokan"></li>
									<li class="splide__slide" data-splide-interval="10000"><img src = "images/country/Food_In_The_Belly.jpg" style = "width: 17.7vw;" alt = "Food In The Belly"></li>
									<li class="splide__slide" data-splide-interval="10000"><img src = "images/country/Im_In_The_Mood_For_Dancing.jpg" style = "width: 17.7vw;" alt = "I'm In The Mood For Dancing"></li>
									<li class="splide__slide" data-splide-interval="10000"><img src = "images/country/A_Place_On_Earth.jpg" style = "width: 17.7vw;" alt = "A Place On Earth"></li>
									<li class="splide__slide" data-splide-interval="10000"><img src = "images/country/The_Best_Of_Nancy_Wilson.jpg" style = "width: 17.7vw;" alt = "The Best Of Nancy Wilson"></li>
									<li class="splide__slide" data-splide-interval="10000"><img src = "images/country/A_Place_On_Earth.jpg" style = "width: 17.7vw;" alt = "A Place On Earth"></li>
									<li class="splide__slide" data-splide-interval="10000"><img src = "images/country/Food_In_The_Belly.jpg" style = "width: 17.7vw;" alt = "Food In The Belly"></li>
									<li class="splide__slide" data-splide-interval="10000"><img src = "images/country/Early_Alchemy.jpg" style = "width: 17.7vw;" alt = "Early Alchemy"></li>
									<li class="splide__slide" data-splide-interval="10000"><img src = "images/country/CMT_Crossroads.jpg" style = "width: 17.7vw;" alt = "CMT Crossroads"></li>
									<li class="splide__slide" data-splide-interval="10000"><img src = "images/country/A_Hundred_Miles_Or_More.jpg" style = "width: 17.7vw;" alt = "A Hundred Miles Or More"></li>
									<li class="splide__slide" data-splide-interval="10000"><img src = "images/country/Three_Decades_Of_Males.jpg" style = "width: 17.7vw;" alt = "Three Decades Of Males"></li>
									<li class="splide__slide" data-splide-interval="10000"><img src = "images/country/Spanish_Train_&_Other_Stories.jpg" style = "width: 17.7vw;" alt = "Spanish Train & Other Stories"></li>
									<li class="splide__slide" data-splide-interval="10000"><img src = "images/country/CMT_Crossroads.jpg" style = "width: 17.7vw;" alt = "CMT Crossroads"></li>
									<li class="splide__slide" data-splide-interval="10000"><img src = "images/country/Flying_Cowboys.jpg" style = "width: 17.7vw;" alt = "Flying Cowboys"></li>
									<li class="splide__slide" data-splide-interval="10000"><img src = "images/country/Food_In_The_Belly.jpg" style = "width: 17.7vw;" alt = "Food In The Belly"></li>
									<li class="splide__slide" data-splide-interval="10000"><img src = "images/country/At_Budokan.jpg" style = "width: 17.7vw;" alt = "At Budokan"></li>
									<li class="splide__slide" data-splide-interval="10000"><img src = "images/country/Early_Alchemy.jpg" style = "width: 17.7vw;" alt = "Early Alchemy"></li>
									<li class="splide__slide" data-splide-interval="10000"><img src = "images/country/Dixie_Chicks.jpg" style = "width: 17.7vw;" alt = "Dixie Chicks"></li>
								</ul>
							</div>
						</section>
						<!-- End of carousel -->

						<!-- Start of carousel -->
						<section class="splide" aria-labelledby="carousel-heading" style = "padding-bottom: 5vw; padding-top: 5vw; text-align: center;">

							<!-- Heading for the carousel -->
							<h1 id="carousel-heading" style = "text-align: left; width: 49%; display: inline-block; margin-bottom: 1vw; font-size: 2vw;" >Rock</h1>

							<!-- Adds a "See All" button which is a link to the query's page -->
							<div class = "nav" style = "width: 49%; display: inline-block;">
								<div class = "buttons" style = "padding-left: 15vw; margin-bottom: 2.5vw;">
									<ul style = "margin-top: 0;">
										<li class = "login"><a href="query5.php" style = "font-size: 1.225vw;">See All</a></li>
									</ul>
								</div>
							</div>

							<!-- All desired images in order for the carousel -->
							<div class="splide__track">
								<ul class="splide__list">
									<li class="splide__slide" data-splide-interval="10000"><img src = "images/rock/Under_The_Covers.jpg" style = "width: 17.7vw;" alt = "Zombie"></li>
									<li class="splide__slide" data-splide-interval="10000"><img src = "images/rock/Aqualung.jpg" style = "width: 17.7vw;" alt = "Zombie"></li>
									<li class="splide__slide" data-splide-interval="10000"><img src = "images/rock/Bring_Me_Home.jpg" style = "width: 17.7vw;" alt = "Zombie"></li>
									<li class="splide__slide" data-splide-interval="10000"><img src = "images/rock/Fallen.jpg" style = "width: 17.7vw;" alt = "Zombie"></li>
									<li class="splide__slide" data-splide-interval="10000"><img src = "images/rock/Five_Minutes_With_Arctic_Monkeys.jpg" style = "width: 17.7vw;" alt = "Zombie"></li>
									<li class="splide__slide" data-splide-interval="10000"><img src = "images/rock/One_More_From_The_Road.jpg" style = "width: 17.7vw;" alt = "Zombie"></li>
									<li class="splide__slide" data-splide-interval="10000"><img src = "images/rock/Primitive_Man.jpg" style = "width: 17.7vw;" alt = "Zombie"></li>
									<li class="splide__slide" data-splide-interval="10000"><img src = "images/rock/Babel.jpg" style = "width: 17.7vw;" alt = "Zombie"></li>
									<li class="splide__slide" data-splide-interval="10000"><img src = "images/rock/Electric_Music_For_The_Mind_And_The_Mind.jpg" style = "width: 17.7vw;" alt = "Zombie"></li>
									<li class="splide__slide" data-splide-interval="10000"><img src = "images/rock/The_Division_Bell.jpg" style = "width: 17.7vw;" alt = "Zombie"></li>
									<li class="splide__slide" data-splide-interval="10000"><img src = "images/rock/Fields_Of_Fire.jpg" style = "width: 17.7vw;" alt = "Zombie"></li>
									<li class="splide__slide" data-splide-interval="10000"><img src = "images/rock/Sarah_Slean.jpg" style = "width: 17.7vw;" alt = "Zombie"></li>
									<li class="splide__slide" data-splide-interval="10000"><img src = "images/rock/Strange_Mercy.jpg" style = "width: 17.7vw;" alt = "Zombie"></li>
									<li class="splide__slide" data-splide-interval="10000"><img src = "images/rock/Finally_We_Are_No_One.jpg" style = "width: 17.7vw;" alt = "Zombie"></li>
									<li class="splide__slide" data-splide-interval="10000"><img src = "images/rock/A_Momentary_Lapse_Of_Reason.jpg" style = "width: 17.7vw;" alt = "Zombie"></li>
									<li class="splide__slide" data-splide-interval="10000"><img src = "images/rock/Continued_Silence.jpg" style = "width: 17.7vw;" alt = "Zombie"></li>
									<li class="splide__slide" data-splide-interval="10000"><img src = "images/rock/Watermark.jpg" style = "width: 17.7vw;" alt = "Zombie"></li>
									<li class="splide__slide" data-splide-interval="10000"><img src = "images/rock/Sarah_Slean.jpg" style = "width: 17.7vw;" alt = "Zombie"></li>
									<li class="splide__slide" data-splide-interval="10000"><img src = "images/rock/Greatest_Hits.jpg" style = "width: 17.7vw;" alt = "Zombie"></li>
									<li class="splide__slide" data-splide-interval="10000"><img src = "images/rock/Slow_Train_Coming.jpg" style = "width: 17.7vw;" alt = "Zombie"></li>
									<li class="splide__slide" data-splide-interval="10000"><img src = "images/rock/Running_On_Empty.jpg" style = "width: 17.7vw;" alt = "Zombie"></li>
									<li class="splide__slide" data-splide-interval="10000"><img src = "images/rock/Greatest_Hits.jpg" style = "width: 17.7vw;" alt = "Zombie"></li>
								</ul>
							</div>
						</section>
						<!-- End of carousel -->

					</div>
				</div>
				<?php
	//Pulls the links from the nav.php page and places them in the navigation div
	require 'footer.php'; //'require' is 100% needed for the site to run 
				?>
			</div>
		</main>

		<!-- Links the loader javascript -->
		<script src="js/loader.js"></script>
	</body>
	<!-- Links the library to this page -->
	<script src="splide/splide.min.js"></script>
</html>