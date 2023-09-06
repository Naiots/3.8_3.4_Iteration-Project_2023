<?php
ob_start();
// Session start
session_start();
$error = NULL;

if($_SERVER["REQUEST_METHOD"] == "POST") { // Activates only when the form is submitted to prevent the query from running on empty fields and error messages to pop up before the form is submitted

	// connect.php (tells where to connect servername, dbasename, username, password)
	require"Music_Database_mysqli.php";

	// Collect the inputs from every field and store them in a dedicated variable
	$myusername = mysqli_real_escape_string($conn, $_POST['username']);
	$mypassword = mysqli_real_escape_string($conn, $_POST['password']);

	// Select the username of the desired user
	$query = "SELECT Username FROM users WHERE Username = '$myusername' and Password = '$mypassword'";

	// Connects to the server and runs the query
	$result = mysqli_query($conn, $query);
	// Fetches the rows that match
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

	// Counts how many rows match
	$count = mysqli_num_rows($result);

	// If result matched $myusername and $mypassword, they must be on the same row (i.e. the amount of rows must be equal to 1)
	if($myusername == "Graeme" or $myusername == "graeme" and $count == 1){
		$sql = "SELECT User_ID, First_Name FROM users WHERE Username = '$myusername' and Password = '$mypassword'"; // New query to select that user's ID
		$query2 =  mysqli_query($conn, $sql); // Connects to the server and runs the query
		$result2 = mysqli_fetch_array($query2, MYSQLI_ASSOC); // Fetches the rows that match
		$result2StringFirstName = $result2['First_Name']; // Fetches the First Name
		$result2StringUserId = $result2['User_ID']; // Fetches the User's ID
		$_SESSION['login_user'] = $result2StringFirstName; // Mainly used for "homepage.php" but also to confirm the user is logged in
		$_SESSION['user_id'] = $result2StringUserId; // Mainly used for "account.php"
		header("location: allUsers.php"); // Redirects the user to "homepage.php"
	} 
	// If Graeme is the username and the username + password are on the same row
	elseif($count == 1) {
		$sql = "SELECT User_ID, First_Name FROM users WHERE Username = '$myusername' and Password = '$mypassword'"; // New query to select that user's ID
		$query2 =  mysqli_query($conn, $sql); // Connects to the server and runs the query
		$result2 = mysqli_fetch_array($query2, MYSQLI_ASSOC); // Fetches the rows that match
		$result2StringFirstName = $result2['First_Name']; // Fetches the First Name
		$result2StringUserId = $result2['User_ID']; // Fetches the User's ID
		$_SESSION['login_user'] = $result2StringFirstName; // Mainly used for "homepage.php" but also to confirm the user is logged in
		$_SESSION['user_id'] = $result2StringUserId; // Mainly used for "account.php"
		header("location: homepage.php"); // Redirects the user to "homepage.php"
	}
	// Otherwise store an error message in $error
	else {
		$error = "<br><h1 style='color: #EC2323; font-size: 1.4vw;'>ERROR! Your Login Name or Password is invalid</h1>";
	}
}
ob_end_flush();
?>

<!DOCTYPE html>
<!-- Define document language -->
<html lang="en">
	<head>

		<!-- Add a title so the user knows what page they're on even if they're in another page -->
		<title>Graeme's Music | Log In</title>
		
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
				
				<div class = "content">

				<!-- Empty div to space out the next divisions from the top -->
				<div id = "empty1"></div>

				<!-- "content" holds the page's main content -->
				

					<h1 style = "font-size: 5.5vw;">Login</h1>

					<!-- Provides a direct link to "signup.php" in case the user doesn't have an account -->
					<p style = "font-size: 1.2vw;">Don't have an account? - <a href = "signup.php" style = "font-size: 1.225vw;">Sign up</a></p><br><br><br>


					<div class="login-box">

						<!-- The start of the form that the user needs to fill in -->
						<h3><form method = "post" id = "01_login">

							<!-- Field for the Username -->
							<label for = "login" style = "padding-right: 21vw; font-size: 1.3vw;">Username</label><br>
							<input type = "text" name = "username" placeholder = "Enter user name"/><br><br>

							<!-- Field for the Password -->
							<label for = "login" style = "padding-right: 21vw; font-size: 1.3vw;">Password</label><br>
							<input id = "password-input" type = "password" name = "password" placeholder = "Enter your password"/><br>

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
							<h3 class = "error1"><?php echo $error; ?></h3><br>

							<!-- The submit button that will make the line 7 if statement true -->
							<input type = "submit" value = " Continue "/><br />

							<!-- End of the form -->
							</form></h3>
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