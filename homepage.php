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
        "Message 1",
        "Message 2",
        "Message 3",
        "Message 4",
		"Message 5",
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
				<div class = "nav">
					<?php
                        //Pulls the links from the nav.php page and places them in the navigation div
                        require 'nav_1.php'; //'require' is 100% needed for the site to run 
                    ?>

				</div>
				
				<!-- Empty div to space out the next divisions from the top -->
				<div id = "empty2"></div>
				
				<!-- A division that holds a greeting and an image to greet the user to the homepage -->
				<div id = "greeting">
					
					<div id = "greeting-text"style = 'padding-top: 18vw;'>
						
						<!-- Prints the randomly generated message from line 27 and the user's first name to make the experience different and personal everytime the user logs in -->
						<?php echo "<span>" . $quip . "</span> <span>" . ($_SESSION['login_user']) . "?</span>" ?>
						<p>Lorem Ipsum</p>
						
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
  						<h1 id="carousel-heading" style = "text-align: left; width: 49%; display: inline-block; margin-bottom: 1vw;" >Splide Basic HTML Example</h1>
						
						<!-- Adds a "See All" button which is a link to the query's page -->
						<div class = "nav" style = "width: 49%; display: inline-block;">
							<div class = "buttons" style = "padding-left: 15vw; margin-bottom: 1.7vw;">
								<ul>
									<li class = "login"><a href="query1.php">See All</a></li>
								</ul>
							</div>
						</div>

						<!-- All desired images in order for the carousel -->
 						<div class="splide__track">
							<ul class="splide__list">
								<li class="splide__slide" data-splide-interval="10000"><img src = "images/download(1).png" style = "width: 17.7vw;"></li>
								<li class="splide__slide" data-splide-interval="10000"><img src = "images/download(2).png" style = "width: 17.7vw"></li>
								<li class="splide__slide" data-splide-interval="10000"><img src = "images/download(3).png" style = "width: 17.7vw"></li>
								<li class="splide__slide" data-splide-interval="10000"><img src = "download(4).png" style = "width: 17.7vw"></li>
								<li class="splide__slide" data-splide-interval="10000"><img src = "download(5).png" style = "width: 17.7vw"></li>
							</ul>
  						</div>
					</section>
					<!-- End of carousel -->
					
					<!-- Start of carousel -->
					<section class="splide" aria-labelledby="carousel-heading" style = "padding-bottom: 5vw; padding-top: 5vw; text-align: center;">
						
						<!-- Heading for the carousel -->
  						<h1 id="carousel-heading" style = "text-align: left; width: 49%; display: inline-block; margin-bottom: 1vw;" >Splide Basic HTML Example</h1>
						
						<!-- Adds a "See All" button which is a link to the query's page -->
						<div class = "nav" style = "width: 49%; display: inline-block;">
							<div class = "buttons" style = "padding-left: 15vw; margin-bottom: 1.7vw;">
								<ul>
									<li class = "login"><a href="query2.php">See All</a></li>
								</ul>
							</div>
						</div>

						<!-- All desired images in order for the carousel -->
 						<div class="splide__track">
							<ul class="splide__list">
								<li class="splide__slide" data-splide-interval="10000"><img src = "images/download(1).png" style = "width: 17.7vw;"></li>
								<li class="splide__slide" data-splide-interval="10000"><img src = "images/download(2).png" style = "width: 17.7vw"></li>
								<li class="splide__slide" data-splide-interval="10000"><img src = "images/download(3).png" style = "width: 17.7vw"></li>
								<li class="splide__slide" data-splide-interval="10000"><img src = "download(4).png" style = "width: 17.7vw"></li>
								<li class="splide__slide" data-splide-interval="10000"><img src = "download(5).png" style = "width: 17.7vw"></li>
							</ul>
  						</div>
					</section>
					<!-- End of carousel -->
					
					<!-- Start of carousel -->
					<section class="splide" aria-labelledby="carousel-heading" style = "padding-bottom: 5vw; padding-top: 5vw; text-align: center;">
						
						<!-- Heading for the carousel -->
  						<h1 id="carousel-heading" style = "text-align: left; width: 49%; display: inline-block; margin-bottom: 1vw;" >Splide Basic HTML Example</h1>
						
						<!-- Adds a "See All" button which is a link to the query's page -->
						<div class = "nav" style = "width: 49%; display: inline-block;">
							<div class = "buttons" style = "padding-left: 15vw; margin-bottom: 1.7vw;">
								<ul>
									<li class = "login"><a href="query3.php">See All</a></li>
								</ul>
							</div>
						</div>

						<!-- All desired images in order for the carousel -->
 						<div class="splide__track">
							<ul class="splide__list">
								<li class="splide__slide" data-splide-interval="10000"><img src = "images/download(1).png" style = "width: 17.7vw;"></li>
								<li class="splide__slide" data-splide-interval="10000"><img src = "images/download(2).png" style = "width: 17.7vw"></li>
								<li class="splide__slide" data-splide-interval="10000"><img src = "images/download(3).png" style = "width: 17.7vw"></li>
								<li class="splide__slide" data-splide-interval="10000"><img src = "download(4).png" style = "width: 17.7vw"></li>
								<li class="splide__slide" data-splide-interval="10000"><img src = "download(5).png" style = "width: 17.7vw"></li>
							</ul>
  						</div>
					</section>
					<!-- End of carousel -->
					
					<!-- Start of carousel -->
					<section class="splide" aria-labelledby="carousel-heading" style = "padding-bottom: 5vw; padding-top: 5vw; text-align: center;">
						
						<!-- Heading for the carousel -->
  						<h1 id="carousel-heading" style = "text-align: left; width: 49%; display: inline-block; margin-bottom: 1vw;" >Splide Basic HTML Example</h1>
						
						<!-- Adds a "See All" button which is a link to the query's page -->
						<div class = "nav" style = "width: 49%; display: inline-block;">
							<div class = "buttons" style = "padding-left: 15vw; margin-bottom: 1.7vw;">
								<ul>
									<li class = "login"><a href="query4.php">See All</a></li>
								</ul>
							</div>
						</div>

						<!-- All desired images in order for the carousel -->
 						<div class="splide__track">
							<ul class="splide__list">
								<li class="splide__slide" data-splide-interval="10000"><img src = "images/download(1).png" style = "width: 17.7vw;"></li>
								<li class="splide__slide" data-splide-interval="10000"><img src = "images/download(2).png" style = "width: 17.7vw"></li>
								<li class="splide__slide" data-splide-interval="10000"><img src = "images/download(3).png" style = "width: 17.7vw"></li>
								<li class="splide__slide" data-splide-interval="10000"><img src = "download(4).png" style = "width: 17.7vw"></li>
								<li class="splide__slide" data-splide-interval="10000"><img src = "download(5).png" style = "width: 17.7vw"></li>
							</ul>
  						</div>
					</section>
					<!-- End of carousel -->
					
					<!-- Start of carousel -->
					<section class="splide" aria-labelledby="carousel-heading" style = "padding-bottom: 5vw; padding-top: 5vw; text-align: center;">
						
						<!-- Heading for the carousel -->
  						<h1 id="carousel-heading" style = "text-align: left; width: 49%; display: inline-block; margin-bottom: 1vw;" >Splide Basic HTML Example</h1>
						
						<!-- Adds a "See All" button which is a link to the query's page -->
						<div class = "nav" style = "width: 49%; display: inline-block;">
							<div class = "buttons" style = "padding-left: 15vw; margin-bottom: 1.7vw;">
								<ul>
									<li class = "login"><a href="query5.php">See All</a></li>
								</ul>
							</div>
						</div>

						<!-- All desired images in order for the carousel -->
 						<div class="splide__track">
							<ul class="splide__list">
								<li class="splide__slide" data-splide-interval="10000"><img src = "images/download(1).png" style = "width: 17.7vw;"></li>
								<li class="splide__slide" data-splide-interval="10000"><img src = "images/download(2).png" style = "width: 17.7vw"></li>
								<li class="splide__slide" data-splide-interval="10000"><img src = "images/download(3).png" style = "width: 17.7vw"></li>
								<li class="splide__slide" data-splide-interval="10000"><img src = "download(4).png" style = "width: 17.7vw"></li>
								<li class="splide__slide" data-splide-interval="10000"><img src = "download(5).png" style = "width: 17.7vw"></li>
							</ul>
  						</div>
					</section>
					<!-- End of carousel -->
					
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
