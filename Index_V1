<?php
ob_start();
session_start();
$error = NULL;
if($_SERVER["REQUEST_METHOD"] == "POST") {
	// connect.php (tells where to connect servername, dbasename, username, password)
	require"13CSI_practice_mysqli.php";
	// username and password sent from form
	$myusername = mysqli_real_escape_string($conn, $_POST['username']);
	$mypassword = mysqli_real_escape_string($conn, $_POST['password']);

	$query = "SELECT User_ID FROM user WHERE User_ID = '$myusername' and Password = '$mypassword'";

	$result = mysqli_query($conn, $query);
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

	$count = mysqli_num_rows($result);

	// If result matched $myusername and $mypassword, table row must be 1 row
	if($count == 1){
		$_SESSION['login_user'] = $myusername;
		header("location: 02_show_user.php");
	} else {
		$error = "ERROR! Your Login Name or Password is invalid";
	}
}
ob_end_flush();
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset = "utf-8" />
		<title>01_login</title>
		<link rel="stylesheet" type="text/css" href="divs.css">
		<link rel="stylesheet" type="text/css" href="fonts.css">
		<link rel="stylesheet" type="text/css" href="nav.css">
	</head>
	<body>
		<main>
			<div class="wrapper"><!-- the div that holds the grid -->
				<div class="header"><!-- Holds the heading image -->
					<img src = "images/header01.jpg" alt = "An image as a place holder" class = "image01" />
				</div>
				<div class="title"><!-- Holds the page title -->
					<h1 class = "grey"><center>01_LOGIN</center></h1>
				</div>
				<div class="nav"><!-- Holds the page navigation -->
					<?php
					//Pulls the links from the nav.php page and places them in the navigation div
					require '07_nav.php'; //'require' is 100% needed for the site to run 
					?>
				</div>
				<div class="content"><!-- Holds the main page content -->
					<div class="section3"><!-- Holds the main page content -->
						<h3><form method = "post" id = "01_login">
							<label for = "login">Username:</label>
							<input type = "text" name = "username" placeholder = "Enter user name"/><br />
							<label for = "login">Password:</label>
							<input type = "password" name = "password" placeholder = "Enter your password"/><br />
							<input type = "submit" value = " Submit "/><br />
							</form></h3>
						<h3 class = "grey"><?php echo $error; ?></h3>
					</div>
				</div>
				<div class="footer"><!-- Holds the foot notes -->
					<p class = "grey">&copy Copyright Stoian Jeames 2022</p>
				</div>
			</div>
		</main>        
	</body>
</html>
