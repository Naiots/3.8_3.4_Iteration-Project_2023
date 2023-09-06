<?php
	// Session start
    session_start();
	// If the user isnt't logged in, redirect them to the landing page
    if(!isset($_SESSION['login_user'])){
    	header("location: index.php");
	}
	// Otherwise, store their first name into a dedicated variable for later use
	else{
		$User = $_SESSION['login_user'];
    }
?>

<!DOCTYPE html>
<!-- Define document language -->
<html lang="en">
	<head>
		
		<!-- Add a title so the user knows what page they're on even if they're in another page -->
		<title>[Admin] Graeme's Music | All Users</title>
		
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
					
					<!-- An extra button for the admin to switch between admin settings and the list of users -->
					<div class = "buttons" style = "padding-left: 15vw; margin-bottom: 1.7vw;">
						
						<ul>
							<li class = "login"><a href="adminSettings.php">Admin Settings</a></li>
						</ul>
						
					</div>
					
				</div>
				
				<!-- Empty div to space out the next divisions from the top -->
				<div id = "empty2"></div>
				
				<!-- "admin-content" holds the page's main content -->
				<div class="admin-content" style="padding: 0; height: 56vh; overflow-y: auto; overflow-x: hidden;">
					
					<heading3><!-- "heading3" is used to split the content into 2 parts with the usernames on the left -->
						<User1><h3 style="padding-left: 0.4vw;">USERNAME</h3></User1>
						<Password1><h3>PASSWORD</h3></Password1>
					</heading3>
									
						<?php
							// connect.php (tells where to connect servername, username, password, dbaseName)
							require "Music_Database_mysqli.php";

							// Select everything from users
							$query = ("SELECT * FROM users");

							// Runs the query above
							$result = mysqli_query($conn,$query);

							// While loop to output the results
							while ($output = mysqli_fetch_array($result))
							{
								?>
								<heading4><!-- "heading4" is used to split the content into 2 parts with the usernames on the left-->
									<User2 style="padding-left: 0.36vw;"><p><?php echo $output['Username']; ?></p></User2>
									<Password2><p><?php echo $output['Password']; ?></p></Password2>
								</heading4>
							<?php
								// Close the output while loop
								}
							?>
					
				</div>
				<?php
                    //Pulls the links from the nav.php page and places them in the navigation div
                    require 'footer.php'; //'require' is 100% needed for the site to run 
                ?>
			</div>
		</main>
	</body>
</html>
