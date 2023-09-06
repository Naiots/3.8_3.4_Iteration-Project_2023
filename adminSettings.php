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

// Initiate variables for error codes

$check10 = '';
$check11 = '';

$check20 = '';
$check21 = '';

$check30 = '';
$check31 = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") { // Activates only when one of the forms are submitted to prevent from queries to run on empty fields and error messages to pop up before the forms are submitted
	if (isset($_POST['add'])) { // If the "add" submit button was clicked

		// connect.php (tells where to connect servername, username, password, dbaseName)
		require "Music_Database_mysqli.php";

		// Collect the inputs from every field and store them in a dedicated variable
		$UserFName = isset($_POST['fname']) ? $_POST['fname']: ''; 
		$UserLName = isset($_POST['lname']) ? $_POST['lname']: ''; 
		$UserEmail = isset($_POST['email']) ? $_POST['email']: ''; 
		$UserName = isset($_POST['username']) ? $_POST['username']: ''; 
		$PW = isset($_POST['password-input']) ? $_POST['password-input']: '';

		// Add the desired user to the database
		$insertquery = "INSERT INTO users ( First_Name, Last_Name, Email, Username, Password  ) VALUES(  '$UserFName', '$UserLName', '$UserEmail', '$UserName', '$PW' )";

		// If the query was run, prepare the query
		$stmt = $conn->prepare($insertquery);
		// The $stmt and prepare method helps to defend against SQL injection attacks

		if(!$stmt){ // If the query failed the preparation phase, store the error and error code in $check11
			$check11 = "<br><h1 style='color: #EC2323; font-size: 1.4vw;'>Prepare failed: (". $conn->error.") ".$conn->error."</h1><br>";
		}

		if ($stmt->execute()) // If the preparation is executed, update the page and let the user know (Use the username to confirm which username was affected)
		{
			$check10 = "<br><h1 style='color: #16CE4E; font-size: 1.4vw;'>$UserName's Account Was Successfully Added</h1>";
		} else { // Otherwise print an error with an error code to let the user know something went wrong
			$check10 = "<br><h1 style='color: #EC2323; font-size: 1.4vw;'>ERROR! Unable To Add Account.<br>Please Try Again Later.<br>Error:" . $stmt->error . "</h1>";
		}

	}
	elseif (isset($_POST['update'])) { // If the "update" submit button was clicked

		// connect.php (tells where to connect servername, username, password, dbaseName)
		require "Music_Database_mysqli.php";

		// Collect the inputs from every field and store them in a dedicated variable
		$UserName = isset($_POST['username']) ? $_POST['username']: ''; 
		$PW = isset($_POST['password-input']) ? $_POST['password-input']: '';
		$NPW = isset($_POST['newPassword-input']) ? $_POST['newPassword-input']: '';

		// Update paassword with the new password for the desired user
		$updatequery = "UPDATE users SET `Password` = '$NPW' WHERE `Username` = '$UserName' AND `Password` = '$PW'";

		// If the query was run, prepare the query
		$stmt = $conn->prepare($updatequery);
		// The $stmt and prepare method helps to defend against SQL injection attacks

		if(!$stmt){ // If the query failed the preparation phase, store the error and error code in $check21
			$check21 = "<br><h1 style='color: #EC2323; font-size: 1.4vw;'>Prepare failed: (". $conn->error.") ".$conn->error."</h1><br>";
		}

		if ($stmt->execute()) // If the preparation is executed, update the page and let the user know (Use the username to confirm which username was affected)
		{
			$check20 = "<br><h1 style='color: #16CE4E; font-size: 1.4vw;'>$UserName's Password Was Updated Successfully</h1>";
		} else { // Otherwise print an error with an error code to let the user know something went wrong
			$check20 = "<br><h1 style='color: #EC2323; font-size: 1.4vw;'>ERROR! Unable To Update Password.<br>Please Try Again Later.<br>Error:" . $stmt->error . "</h1>";
		}

	}
	elseif (isset($_POST['delete'])) { // If the "delete" submit button was clicked

		// connect.php (tells where to connect servername, username, password, dbaseName)
		require "Music_Database_mysqli.php";

		// Collect the inputs from every field and store them in a dedicated variable
		$UserName = isset($_POST['username']) ? $_POST['username']: ''; 

		// Delete the desired user
		$query = "DELETE FROM users WHERE `Username` = '$UserName'";

		// If the query was run, prepare the query
		$stmt = $conn->prepare($query);

		if(!$stmt){ // If the query failed the preparation phase, store the error and error code in $check31
			$check31 = "<br><h1 style='color: #EC2323; font-size: 1.4vw;'>Prepare failed: (". $conn->error.") ".$conn->error."</h1><br>";
		}

		//lets the admin know the status of the action; whether or not the user was successfully deleted or they have to try again.
		if ($stmt->execute()) { // If the preparation is executed, update the page and let the user know (Use the username to confirm which username was affected)
			$check30 = "<br><h1 style='color: #16CE4E; font-size: 1.4vw;'>$UserName's Account Was Deleted Successfully</p>";
		} else { // Otherwise print an error with an error code to let the user know something went wrong
			$check30 = "<br><h1 style='color: #EC2323; font-size: 1.4vw;'>ERROR! Unable To Delete User.<br>Please Try Again Later.<br>Error:" . $stmt->error . "</h1>";
		}

	}
	else{
		// Empty code block, does nothing
	}
}

?>

<!DOCTYPE html>
<!-- Define document language -->
<html lang="en">
	<head>

		<!-- Add a title so the user knows what page they're on even if they're in another page -->
		<title>[Admin] Graeme's Music | Admin Settings</title>
		
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
					// Pulls the links from the nav.php page and places them in the navigation div
					require 'nav_1.php'; // 'require' is 100% needed for the site to run 
					?>

					<!-- An extra button for the admin to switch between admin settings and the list of users -->
					<div class = "buttons" style = "padding-left: 15vw; margin-bottom: 1.7vw;">

						<ul>
							<li class = "login"><a href="allUsers.php">User List</a></li>
						</ul>

					</div>

				</div>

				<div class="content">

					<!-- Empty div to space out the next divisions from the top -->
					<div id = "empty2"></div>

					<!-- "content" holds the page's main content -->
					<div id = "content">
						<h1 style = "font-size: 2vw;">Create An Account</h1><br>

						<div class="addAccount">
							<!-- The start of the form that the user needs/can fill in -->
							<h3><form method = "post" id = "addAccount">

								<!-- Field for the First Name -->
								<label for = "login" style = "padding-right: 21.5vw; font-size: 1.3vw;">First Name</label><br>
								<input type = "text" name = "fname" placeholder = "Enter User's First Name"/><br><br>

								<!-- Field for the Last Name -->
								<label for = "login" style = "padding-right: 21.5vw; font-size: 1.3vw;">Last Name</label><br>
								<input type = "text" name = "lname" placeholder = "Enter User's Last Name..."/><br><br>

								<!-- Field for the Username -->
								<label for = "login" style = "padding-right: 21.5vw; font-size: 1.3vw;">Username</label><br>
								<input type = "text" name = "username" placeholder = "Enter Username..."/><br><br>

								<!-- Field for the Email -->
								<label for = "login" style = "padding-right: 23.5vw; font-size: 1.3vw;">Email</label><br>
								<input type = "text" name = "email" placeholder = "Enter User's Email..."/><br><br>

								<!-- Field for the Password -->
								<label for = "login" style = "padding-right: 21.5vw; font-size: 1.3vw;">Password</label><br>
								<input id = "password-input" type = "password" name = "password-input" placeholder = "Enter User's Password..."/><br>

								<!-- This division holds the code for the "show password" checkbox -->
								<div id="show-password">
									<!-- The actual checkbox and link to the javascript code -->
									<input type="checkbox" onclick="myFunction()"> Show Password<br><br>

									<!-- Javascript code for the checkbox to change the type from "password" to "text". This reveals the password in characters -->
									<script>
										function myFunction() {
											var x = document.getElementById("password-input");
											if (x.type === "password") {
												x.type = "text";
											} else {
												x.type = "password";
											}

										}
									</script>
								</div>

								<!-- Any error messages will print here -->
								<?php
								echo $check11;
								echo $check10;
								?>
								<br>

								<!-- The submit button that will make the line 25 if statement true -->
								<input type = "submit" name = "add" value = " Create Account "/><br>

								<!-- End of the form -->
								</form></h3>
						</div>

						<!-- Empty field to separate forms -->
						<div id = "empty3">
							<!------------------------------------------------------------------ EMPTY -------------------------------------------------------------------->
						</div>

						<h1 style = "font-size: 2vw;">Update A Password</h1><br>

						<div class="updatePassword">
							<!-- The start of the form that the user needs/can fill in -->
							<h3><form method = "post" id = "updateAccount">

								<!-- Field for the Username -->
								<label for = "login" style = "padding-right: 21.5vw; font-size: 1.3vw;">Username</label><br>
								<input type = "text" name = "username" placeholder = "Enter Username..."/><br><br>

								<!-- Field for the Password -->
								<label for = "login" style = "padding-right: 21.5vw; font-size: 1.3vw;">Password</label><br>
								<input id = "password-input" type = "password" name = "password-input" placeholder = "Enter User's Password..."/><br>

								<!-- This division holds the code for the "show password" checkbox -->
								<div id="show-password">
									<!-- The actual checkbox and link to the javascript code -->
									<input type="checkbox" onclick="myFunction()"> Show Password<br><br>

									<!-- Javascript code for the checkbox to change the type from "password" to "text". This reveals the password in characters -->
									<script>
										function myFunction() {
											var x = document.getElementById("password-input");
											if (x.type === "password") {
												x.type = "text";
											} else {
												x.type = "password";
											}

										}
									</script>
								</div>
								<label for = "login" style = "padding-right: 19vw; font-size: 1.3vw;">New Password</label><br>
								<input id = "newPassword-input" type = "password" name = "newPassword-input" placeholder = "Enter User's New Password..."/><br>

								<!-- This division holds the code for the "show password" checkbox -->
								<div id="show-password">
									<!-- The actual checkbox and link to the javascript code -->
									<input type="checkbox" onclick="myFunction2()"> Show Password<br><br>

									<!-- Javascript code for the checkbox to change the type from "password" to "text". This reveals the password in characters -->
									<script>
										function myFunction2() {
											var x = document.getElementById("newPassword-input");
											if (x.type === "password") {
												x.type = "text";
											} else {
												x.type = "password";
											}
										}
									</script>
								</div>

								<!-- Any error messages will print here -->
								<?php
								echo $check21;
								echo $check20;
								?>
								<br>

								<!-- The submit button that will make the line 56 if statement true -->
								<input type = "submit" name = "update" value = " Update Password "/><br>

								<!-- End of the form -->
								</form></h3>
						</div>

						<!-- Empty field to separate forms -->
						<div id = "empty3">
							<!------------------------------------------------------------------ EMPTY -------------------------------------------------------------------->
						</div>

						<h1 style = "font-size: 2vw;">Delete an Account</h1><br>

						<div class="deleteAccount">
							<!-- The start of the form that the user needs/can fill in -->
							<h3><form method = "post" id = "deleteAccount">

								<!-- Field for the Username -->
								<label for = "login" style = "padding-right: 21.5vw; font-size: 1.3vw;">Username</label><br>
								<input type = "text" name = "username" placeholder = "Enter Username..."/><br><br>

								<!-- Any error messages will print here -->
								<?php
								echo $check31;
								echo $check30;
								?>
								<br>

								<!-- The submit button that will make the line 56 if statement true -->
								<input type = "submit" name = "delete" value = " Delete Account "/><br>

								<!-- End of the form -->
								</form></h3>

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
</html>