<?php
ob_start();
// Session start
session_start();

// Initiate variables for error codes
$check10 = '';
$check11 = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") { // Activates only when one of the forms are submitted to prevent from queries to run on empty fields and error messages to pop up before the forms are submitted

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
		$sql = "SELECT User_ID, First_Name FROM users WHERE Username = '$UserName' and Password = '$PW'"; // New query to select that user's ID
		$query2 =  mysqli_query($conn, $sql); // Connects to the server and runs the query
		$result2 = mysqli_fetch_array($query2, MYSQLI_ASSOC); // Fetches the rows that match
		$result2StringFirstName = $result2['First_Name']; // Fetches the First Name
		$result2StringUserId = $result2['User_ID']; // Fetches the User's ID
		$_SESSION['login_user'] = $result2StringFirstName; // Mainly used for "homepage.php" but also to confirm the user is logged in
		$_SESSION['user_id'] = $result2StringUserId; // Mainly used for "account.php"
		header("location: homepage.php"); // Redirects the user to "homepage.php"
	} else { // Otherwise print an error with an error code to let the user know something went wrong
		$check10 = "<br><h1 style='color: #EC2323; font-size: 1.4vw;'>ERROR! Unable To Add Account.<br>Please Try Again Later.<br>Error:" . $stmt->error . "</h1>";
	}

}
?>

<!DOCTYPE html>
<!-- Define document language -->
<html lang="en">
	<head>

		<!-- Add a title so the user knows what page they're on even if they're in another page -->
		<title>Graeme's Music | Sign Up</title>
		
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
					<!-- Website's logo which also acts as a button to redirect the user to "index.php" -->
					<div class = "logo">
						<a href = "index.php">
							<img src = "images/logos/Logo1.png" style = "width: 12vw; position: static;" alt = "Logo">
						</a>
					</div>

				</div>

				<div class="content">

					<!-- Empty div to space out the next divisions from the top -->
					<div id = "empty2"></div>

					<!-- "content" holds the page's main content -->
					<div id = "content">

						<img src = "images/download.png" style = "width: 20vw;">
						<h1>Lorem Ipsum</h1>

						<!-- Provides a direct link to "login.php" in case the user already has an account -->
						<p>Already have an account? - <a href = "login.php">Log In</a></p><br><br>


						<div class="login-box">

							<!-- The start of the form that the user needs to fill in -->
							<h3><form method = "post" id = "01_login">

								<!-- Field for the First Name -->
								<label for = "login" style = "padding-right: 21.5vw;">First Name</label><br>
								<input type = "text" name = "fname" placeholder = "Enter Your First Name..."/><br><br>

								<!-- Field for the Last Name -->
								<label for = "login" style = "padding-right: 21.5vw;">Last Name</label><br>
								<input type = "text" name = "lname" placeholder = "Enter Your Last Name..."/><br><br>

								<!-- Field for the Username -->
								<label for = "login" style = "padding-right: 21.5vw;">Username</label><br>
								<input type = "text" name = "username" placeholder = "Enter Your Username..."/><br><br>

								<!-- Field for the Email -->
								<label for = "login" style = "padding-right: 23.5vw;">Email</label><br>
								<input type = "text" name = "email" placeholder = "Enter Your Email..."/><br><br>

								<!-- Field for the Password -->
								<label for = "login" style = "padding-right: 21.5vw;">Password</label><br>
								<input id = "password-input" type = "password" name = "password-input" placeholder = "Enter Your Password..."/><br>

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

								<input type = "submit" value = " Continue "/><br />
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
