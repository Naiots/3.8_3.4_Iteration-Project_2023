<?php
	// Session start
	session_start();
	if(isset($_SESSION['login_user'])){ // Checks that the user is actually logged in before destroying the session
		session_destroy(); // Destroys session
		header("location: index.php"); // Redirects user to the landing page
		}
	// Otherwise the user is simply redirected to the homepage
	else{
		header("location: homepage.php");
	}
?>
