<?php
// Session start
session_start();
// If the user isnt't logged in, redirect them to the landing page
if(!isset($_SESSION['login_user'])){
	header("location: index.php");
}
// Otherwise, store their first name and User ID into dedicated variables for later use
else{
	$User = $_SESSION['login_user'];
	$result2StringUserId = $_SESSION['user_id'];
}


// connect.php (tells where to connect servername, username, password, dbaseName)
require "Music_Database_mysqli.php";

// Fetch the existing record data to pre-fill the form
$selectQuery = "SELECT * FROM users WHERE User_ID = ?";
$stmt = $conn->prepare($selectQuery);
$stmt->bind_param("i", $result2StringUserId); // "i" represents an integer
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

// Initiate variables
$check10 = '';
$check11 = '';
$updatequery = '';
$updatePassword = false;
$errorPassword = false;
$UserFName = ''; 
$UserLName = ''; 
$UserName = ''; 
$Password = '';
$NPW = '';
$UserEmail = ''; 
$UserPhone = ''; 
$UserCity = ''; 
$UserCountry = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") { // Activates only when the form is submitted to prevent from queries to run on empty fields and error messages to pop up before the form is submitted
	if (isset($_POST['update'])) {

		// connect.php (tells where to connect servername, username, password, dbaseName)
		require "Music_Database_mysqli.php";

		// Collect the inputs from every field and store them in a dedicated variable
		$UserFName = isset($_POST['fname']) ? $_POST['fname']: ''; 
		$UserLName = isset($_POST['lname']) ? $_POST['lname']: ''; 
		$UserName = isset($_POST['username']) ? $_POST['username']: ''; 
		$Password = isset($_POST['password-input']) ? $_POST['password-input']: '';
		$NPW = isset($_POST['newPassword-input']) ? $_POST['newPassword-input']: '';
		$UserEmail = isset($_POST['email']) ? $_POST['email']: ''; 
		$UserPhone = isset($_POST['phone']) ? $_POST['phone']: ''; 
		$UserCity = isset($_POST['city']) ? $_POST['city']: ''; 
		$UserCountry = isset($_POST['country']) ? $_POST['country']: ''; 

		// Checks if the password is updated and sets the variable $passwordUpdated
		//////////////////////////////////////////////////////////////////////////
		if ($NPW == '') { //Password is not updated
			$updatePassword = false;
		}
		else { // There is a new password
			$updatePassword = true;
			if ($Password == '') { //The current password has not been provided
				$check10 = "<br><h1 style='color: #EC2323; font-size: 1.4vw;'>ERROR! Unable To Update Password.<br>Please provide your current password.</h1><br>" . $stmt->error;
				$errorPassword = true;
			} else { // Current password has been provided
				if ($Password == $row['Password']) { //The current password provided is correct
					$errorPassword = false;
				} else { // The current password provided is incorrect
					$check10 = "<br><h1 style='color: #EC2323; font-size: 1.4vw;'>ERROR! Unable To Update Password.<br>Invalid current password.</h1><br>" . $stmt->error;
					$errorPassword = true;
				}
			}
		}

		// Prepare and execute the update
		////////////////////////////////
		// Create a variable to store sql code for the 'Update Users' query
		if (!$updatePassword) { // If the user didn't enter anything in the password fields, use this query
			$updatequery = "UPDATE users SET `First_Name` = '$UserFName', `Last_Name` = '$UserLName', `Username` = '$UserName', `Phone` = '$UserPhone', `City` = '$UserCity', `Country` = '$UserCountry' WHERE `User_ID` = '$result2StringUserId'";
		} elseif ($updatePassword && !$errorPassword) { // If there is no error in the password and the new password has something in it, use this query
			$updatequery = "UPDATE users SET `First_Name` = '$UserFName', `Last_Name` = '$UserLName', `Username` = '$UserName', `Password` = '$NPW', `Phone` = '$UserPhone', `City` = '$UserCity', `Country` = '$UserCountry' WHERE `User_ID` = '$result2StringUserId'";
		} else { // Otherwise make the $updatequery variable empty
			$updatequery = '';
		}

		if ($updatequery != '') { // If one of the query were run, prepare the query
			$stmt = $conn->prepare($updatequery);
			// The $stmt and prepare method helps to defend against SQL injection attacks

			if(!$stmt) { // If the query failed the preparation phase, store the error and error code in $check11
				$check11 = "<br><h1 style='color: #EC2323; font-size: 1.4vw;'>Prepare failed: (". $conn->error.") ".$conn->error."</h1><br>";
			}

			if ($stmt->execute()) { // If the preparation is executed, update the page and let the user know
				$check10 = "<br><h1 style='color: #16CE4E; font-size: 1.4vw;'>Succesfully Updated Your Details</h1>";
				// Fetch the existing record data to pre-fill the form
				$selectQuery = "SELECT * FROM users WHERE User_ID = ?";
				$stmt = $conn->prepare($selectQuery);
				$stmt->bind_param("i", $result2StringUserId); // "i" represents an integer
				$stmt->execute();
				$result = $stmt->get_result();
				$row = $result->fetch_assoc();
			} else {
				// Empty code block, does nothing
			}
		}
	}
	else {
		// Empty code block, does nothing
	}
}
else {
	// Empty code block, does nothing
}

if (isset($_POST['confirm_delete'])) {  // Activates only when the delete button is clicked and the user confirms the deletion via the Javascript on line 274

	// Use a DELETE SQL query to delete the user's account
	$sql = "DELETE FROM users WHERE `User_ID` = '$result2StringUserId'";
	$result = mysqli_query($conn, $sql);

	// If the result returns a value, log the user out and redirect them to the landing page
	if ($result) {
		session_destroy();
		header("Location: index.php");
	} else { // Otherwise pring an error message
		echo "<br><h1 style='color: #EC2323; font-size: 1.4vw;'>Error deleting account.</h1>";
	}
}

?>

<!DOCTYPE html>
<!-- Define document language -->
<html lang="en">
	<head>

		<!-- Add a title so the user knows what page they're on even if they're in another page -->
		<title>Graeme's Music | Account</title>
		
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
		<main>
			<?php
			//Pulls the links from the nav.php page and places them in the navigation div
			require 'loader.php'; //'require' is 100% needed for the site to run 
			?>
			<div class = "wrapper">
				<div class = "nav">
					<?php
					//Pulls the links from the nav.php page and places them in the navigation div
					require 'nav_1.php'; //'require' is 100% needed for the site to run 
					?>
				</div>

				<div class="content">

					<!-- Empty div to space out the next divisions from the top -->
					<div id = "empty4" style = ""></div>

					<!-- "content" holds the page's main content -->
					<div id = "content">
						<h1 style = "font-size: 3.2vw;">Account Settings</h1><br>

						<div class="updateDetails">
							<!-- The start of the form that the user needs/can fill in -->
							<h3><form method = "post" id = "updateAccount">

								<!-- Field for the First Name -->
								<label for = "login" style = "padding-right: 20.5vw; font-size: 1.3vw;">First Name</label><br>
								<input type = "text" name = "fname" placeholder = "Enter Your First Name..." value="<?php echo $row['First_Name']; ?>"/><br><br>

								<!-- Field for the Last Name -->
								<label for = "login" style = "padding-right: 20.5vw; font-size: 1.3vw;">Last Name</label><br>
								<input type = "text" name = "lname" placeholder = "Enter Your Last Name..." value="<?php echo $row['Last_Name']; ?>"/><br><br>

								<!-- Field for the Username -->
								<label for = "login" style = "padding-right: 20.5vw; font-size: 1.3vw;">Username</label><br>
								<input type = "text" name = "username" placeholder = "Enter Your Username..." value="<?php echo $row['Username']; ?>"/><br><br>

								<!-- Field for the Current Password -->
								<label for = "login" style = "padding-right: 15.5vw; font-size: 1.3vw;">Current Password</label><br>
								<input id = "password-input" type = "password" name = "password-input" placeholder = "Enter Your Current Password..."/><br>

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

								<!-- Field for the New Password -->
								<label for = "login" style = "padding-right: 18vw; font-size: 1.3vw;">New Password</label><br>
								<input id = "newPassword-input" type = "password" name = "newPassword-input" placeholder = "Enter A New Password..."/><br>

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

								<!-- Field for the Email (This cannot be edited for security reasons as a hacked account can send themselves a "forgot password" email to lock out the original user) -->
								<label for = "login" style = "padding-right: 23.5vw; font-size: 1.3vw;">Email</label><br>
								<input type = "text" name = "email" placeholder = "You Shouldn't See This - Please Contact Support" value="<?php echo $row['Email']; ?>" disabled/><br><br>

								<!-- Field for the Phone Number (Is optional for an account) -->
								<label for = "login" style = "padding-right: 11vw; font-size: 1.3vw;">Phone Number (Optional)</label><br>
								<input type = "text" name = "phone" placeholder = "Please Enter Your Phone Number" value="<?php echo $row['Phone']; ?>"/><br><br>

								<!-- Field for the City (Is optional for an account) -->
								<label for = "login" style = "padding-right: 18vw; font-size: 1.3vw;">City (Optional)</label><br>
								<input type = "text" name = "city" placeholder = "Please Enter Your Current City" value="<?php echo $row['City']; ?>"/><br><br>

								<!-- Dropdown field for the Country (Is optional for an account) -->
								<label for = "country" style = "padding-right: 15vw; font-size: 1.3vw;">Country (Optional)</label><br>
								<!-- Since this is a dropdown, the user is limited to two options. The recorded value of the selected option is the "value" (Is optional for an account) -->
								<select name="country" id="country" style = "width: 27vw;">
									<option value="Australia">Australia</option>
									<option value="New Zealand">New Zealand</option>
								</select>

								<!-- Any error messages will print here -->
								<p>
									<?php
									echo $check11;
									echo $check10;
									?>
								</p><br>

								<!-- The submit button that will make the line 42 if statement true -->
								<input type = "submit" name = "update" value = " Update My Details "/><br>

								<!-- End of the form -->
								</form></h3><br>

							<!-- Javascript for a window.confirm() pop up to appear -->
							<script>
								function confirmDelete() { // Once this function is called, the code will run
									if (window.confirm("Are you sure you want to delete your account? This action cannot be undone.")) { // Asks user for confirmation
										// If the user clicks "OK" in the confirmation dialog, submit the form
										document.getElementById("deleteForm").submit();
									} else {
										// If the user clicks "Cancel," do nothing
									}
								}
							</script>

							<!-- This division holds both buttons at the bottom -->
							<div class="button-container">

								<ul class = "right-align">

									<!-- This is the Logout button which will run 'signOut.php' located in the root file and will end the session therefore logging the active user out -->
									<li><a href='signOut.php'>Logout</a></li>

								</ul>

								<!-- This tag avoids the text from breaking lines -->
								<nobr>
									<!-- A new form for a singular button that will run some Javascript and PHP -->
									<form id="deleteForm" method="POST" action="account.php">

										<!-- Links up the php on line 121 -->
										<input type="hidden" name="confirm_delete" value="1">

										<!-- This is the button that will launch the Javascript on line 274 -->
										<button type="button" onclick="confirmDelete()" name = "delete-account">Delete My Account</button>

									</form>


								</nobr>
							</div>

						</div>
					</div>
				</div>
			</div>
			<?php
			//Pulls the links from the nav.php page and places them in the navigation div
			require 'footer.php'; //'require' is 100% needed for the site to run 
			?>
		</main>
		<!-- Links the loader javascript -->
		<script src="js/loader.js"></script>
	</body>
</html>