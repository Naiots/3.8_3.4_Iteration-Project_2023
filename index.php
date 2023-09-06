<!DOCTYPE html>
<!-- Define document language -->
<html lang="en">
	<head>
		
		<!-- Add a title so the user knows what page they're on even if they're in another page -->
		<title>Graeme's Music</title>
		
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
				
				<!-- "gradient" holds the page's content that is in the division with a gradient background -->
				<div class = "gradient">
					
					<div class = "nav">
						
						<!-- Navigation Menu -->
						<nav>
							
							<!-- Website's logo which also acts as a button to redirect the user to "index.php" -->
							<div class = "logo">
								<a href = "index.php">
								<img src = "images/logos/Logo3.png" style = "width: 12vw">
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
					
					<div class="content">
					
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
								autoplay: true,
  								snap   : true,
								wheel  : true,
							} );

							// Only allows 1 carousel
							splide.mount();
  						} );
					</script>
					
					<!-- Start of carousel -->
					<section class="splide" aria-labelledby="carousel-heading" style = "padding-bottom: 5vw; text-align: center; height: 36vw;">
						
						<!-- Heading for the carousel -->

						<!-- All desired images in order for the carousel -->
 						<div class="splide__track">
							<ul class="splide__list">
								<li class="splide__slide" data-splide-interval="10000">
									<div class="inner">
										<img src = "images/clickbait/Il_Etait_Une_Fois.jpg" style = "width: 45vw" alt = "Il était une fois...">
									</div>
								</li>
								<li class="splide__slide" data-splide-interval="10000">
									<div class="inner">
										<img src = "images/clickbait/Heroes_&_Villains.jpg" style = "width: 45vw" alt = "Heroes & Villains">
									</div>
								</li>
								<li class="splide__slide" data-splide-interval="10000">
									<div class="inner">
										<img src = "images/clickbait/Future_Nostalgia.jpg" style = "width: 45vw" alt = "Future Nostalgia">
									</div>
								</li>
								<li class="splide__slide" data-splide-interval="10000">
									<div class="inner">
										<img src = "images/clickbait/For_All_The_Dogs.jpg" style = "width: 45vw" alt = "For All The Dogs">
									</div>
								</li>
								<li class="splide__slide" data-splide-interval="10000">
									<div class="inner">
										<img src = "images/clickbait/Foo_Fighters.jpg" style = "width: 45vw" alt = "Foo Fighters">
									</div>
								</li>
								
								
								<li class="splide__slide" data-splide-interval="10000">
									<div class="inner">
										<img src = "images/clickbait/Equals.jpg" style = "width: 45vw" alt = "Equals">
									</div>
								</li>
								<li class="splide__slide" data-splide-interval="10000">
									<div class="inner">
										<img src = "images/clickbait/Endless_Summer_Vacation.jpg" style = "width: 45vw" alt = "Endless Summer Vacation">
									</div>
								</li>
								<li class="splide__slide" data-splide-interval="10000">
									<div class="inner">
										<img src = "images/clickbait/Diamonds.jpg" style = "width: 45vw" alt = "Diamonds">
									</div>
								</li>
								<li class="splide__slide" data-splide-interval="10000">
									<div class="inner">
										<img src = "images/clickbait/Continued_Silence.jpg" style = "width: 45vw" alt = "Continued Silence">
									</div>
								</li>
								<li class="splide__slide" data-splide-interval="10000">
									<div class="inner">
										<img src = "images/clickbait/Austin.jpg" style = "width: 45vw" alt = "Austin">
									</div>
								</li>
								
								
								<li class="splide__slide" data-splide-interval="10000">
									<div class="inner">
										<img src = "images/clickbait/What_Was_I_Made_For.jpg" style = "width: 45vw" alt = "What Was I Made For">
									</div>
								</li>
								<li class="splide__slide" data-splide-interval="10000">
									<div class="inner">
										<img src = "images/clickbait/Utopia.jpg" style = "width: 45vw" alt = "Utopia">
									</div>
								</li>
								<li class="splide__slide" data-splide-interval="10000">
									<div class="inner">
										<img src = "images/clickbait/The_Eminem_Show.jpg" style = "width: 45vw" alt = "The Eminem Show">
									</div>
								</li>
								<li class="splide__slide" data-splide-interval="10000">
									<div class="inner">
										<img src = "images/clickbait/Starboy.jpg" style = "width: 45vw" alt = "Starboy">
									</div>
								</li>
								<li class="splide__slide" data-splide-interval="10000">
									<div class="inner">
										<img src = "images/clickbait/Split_Decision.jpg" style = "width: 45vw" alt = "Spllit Descision">
									</div>
								</li>
								
								
								<li class="splide__slide" data-splide-interval="10000">
									<div class="inner">
										<img src = "images/clickbait/Speak_Now.jpg" style = "width: 45vw" alt = "Speak Now">
									</div>
								</li>
								<li class="splide__slide" data-splide-interval="10000">
									<div class="inner">
										<img src = "images/clickbait/SOS.jpg" style = "width: 45vw" alt = "SOS">
									</div>
								</li>
								<li class="splide__slide" data-splide-interval="10000">
									<div class="inner">
										<img src = "images/clickbait/Les_Autres_Cest_Nous.jpg" style = "width: 45vw" alt = "Les Autres C'est Nous">
									</div>
								</li>
								<li class="splide__slide" data-splide-interval="10000">
									<div class="inner">
										<img src = "images/clickbait/LMF.jpg" style = "width: 45vw" alt = "LMF">
									</div>
								</li>
								<li class="splide__slide" data-splide-interval="10000">
									<div class="inner">
										<img src = "images/clickbait/Ipseite.jpg" style = "width: 45vw" alt = "Ipséité">
									</div>
								</li>
								<li class="splide__slide" data-splide-interval="10000">
									<div class="inner">
										<img src = "images/clickbait/Fave_Vibes.jpg" style = "width: 45vw" alt = "Vibes">
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
							
							<img src = "images/clickbait/profiles/Mei_Rose.jpg" style = "border-radius: 50%; width: 17.7vw; height: 17.7vw; margin: 3vw;">
							<!-- Adds a caption to an image -->
							<figcaption>Mei Rose</figcaption>
							
						</figure>
						
						<!-- <figure> is used to allow <figcaption> -->
						<figure>
							
							<img src = "images/clickbait/profiles/Lil_Mabu.jpg" style = "border-radius: 50%; width: 26vw; height: 26vw; margin: 3vw;">
							<!-- Adds a caption to an image -->
							<figcaption style = "font-weight: 700; font-size: 4vw">Lil Mabu</figcaption>
							
						</figure>
						
						<!-- <figure> is used to allow <figcaption> -->
						<figure>
							
							<img src = "images/clickbait/profiles/Qiyah_Abdul.jpg" style = "border-radius: 50%; width: 17.7vw; height: 17.7vw; margin: 3vw;">
							<!-- Adds a caption to an image -->
							<figcaption>Qiyah Abdul</figcaption>
							
						</figure>
						
					</div>
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
					