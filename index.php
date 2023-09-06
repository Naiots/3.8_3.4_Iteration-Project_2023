<!DOCTYPE html>
<!-- Define document language -->
<html lang="en">
	<head>
		
		<!-- Add a title so the user knows what page they're on even if they're in another page -->
		<title>Graeme's Music</title>
		
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
		<main>
			<div class = "wrapper">
				
				<!-- "gradient" holds the page's content that is in the division with a gradient background -->
				<div class = "gradient">
					
					<div class = "nav">
						
						<!-- Navigation Menu -->
						<nav>
							
							<!-- Website's logo which also acts as a button to redirect the user to "index.php" -->
							<div class = "logo">
								<a href = "index.php">
								<img src = "images/download.png" style = "width: 12vw">
								</a>
							</div>
							
							<!-- Buttons to allow the user to login and sign up -->
							<div class = "buttons" style = "padding-left: 15vw">
								<ul>
									<li class = "login" style = "font-size: 1.225vw;"><a href="login.php">Login</a></li>
									<li class = "signup" style = "font-size: 1.225vw;"><a href="signup.php">Sign Up</a></li>
								</ul>
							</div>
						</nav>
						
					</div>
					
					<h1 style = "font-size: 4vw;">Graeme's Music</h1>
					
					<h2 style = "padding-top: 1vw; font-size: 2vw;">Popular Right Now</h2>
					
					<!-- Javascript from an imported library to easily edit all the carousels  -->
					<script>
  						document.addEventListener( 'DOMContentLoaded', function() {
							
							// Custom settings
    						var splide = new Splide( '.splide', {
  								type   : 'loop',
								drag   : 'free',
  								perPage: 4,
  								focus  : 'center',
								//autoplay: true,
  								snap   : true,
								wheel  : true,
							} );

							// Only allows 1 carousel
							splide.mount();
  						} );
					</script>
					
					<!-- Start of carousel -->
					<section class="splide" aria-labelledby="carousel-heading" style = "padding-bottom: 5vw; padding-top: 5vw; text-align: center;">
						
						<!-- Heading for the carousel -->

						<!-- All desired images in order for the carousel -->
 						<div class="splide__track">
							<ul class="splide__list">
								<li class="splide__slide" data-splide-interval="10000">
									<div class="inner">
										<img src = "images/download(1).png" style = "width: 17.7vw">
									</div>
								</li>
								<li class="splide__slide" data-splide-interval="10000">
									<div class="inner">
										<img src = "images/download(2).png" style = "width: 17.7vw">
									</div>
								</li>
								<li class="splide__slide" data-splide-interval="10000">
									<div class="inner">
										<img src = "images/download(3).png" style = "width: 17.7vw">
									</div>
								</li>
								<li class="splide__slide" data-splide-interval="10000">
									<div class="inner">
										<img src = "download(4).png" style = "width: 17.7vw">
									</div>
								</li>
								<li class="splide__slide" data-splide-interval="10000">
									<div class="inner">
										<img src = "download(5).png" style = "width: 17.7vw">
									</div>
								</li>
							</ul>
  						</div>
					</section>
					<!-- End of carousel -->
					
				</div>
				
				<!-- Text-Empty div -->
				<div id="overlay"></div>
				
				<!-- Div to feature artist profiles -->
				<div id="feat-artist">
					<h1 style = "padding-top: 3vw; font-size: 4vw;">Discover</h1>
					<p style = "padding-top: 1vw; font-size: 2vw;">Find new up-and-coming artists you like</p>
					
					<!-- Holds the images -->
					<div id="images">
						
						<!-- <figure> is used to allow <figcaption> -->
						<figure>
							
							<img src = "images/download.png" style = "border-radius: 50%; width: 17.7vw; height: 17.7vw; margin: 3vw;">
							<!-- Adds a caption to an image -->
							<figcaption>Mei Rose</figcaption>
							
						</figure>
						
						<!-- <figure> is used to allow <figcaption> -->
						<figure>
							
							<img src = "images/download.png" style = "border-radius: 50%; width: 26vw; height: 26vw; margin: 3vw;">
							<!-- Adds a caption to an image -->
							<figcaption style = "font-weight: 700; font-size: 4vw">Lil Mabu</figcaption>
							
						</figure>
						
						<!-- <figure> is used to allow <figcaption> -->
						<figure>
							
							<img src = "images/download.png" style = "border-radius: 50%; width: 17.7vw; height: 17.7vw; margin: 3vw;">
							<!-- Adds a caption to an image -->
							<figcaption>Qiyah Abdul</figcaption>
							
						</figure>
						
					</div>
					
				</div>
				<?php
                    //Pulls the links from the nav.php page and places them in the navigation div
                    require 'footer.php'; //'require' is 100% needed for the site to run 
                ?>
			</div>
		</main>
	</body>
	<!-- Links the library to this page -->
	<script src="splide/splide.min.js"></script>
</html>
					
