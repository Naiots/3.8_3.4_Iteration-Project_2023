<!-- Hamburger Menu -->
<div class="hamburger-menu">
	<!-- The hamburger menu icon is actually a hidden checkbox -->
	<input id="menu__toggle" type="checkbox" />
	<label class="menu__btn" for="menu__toggle">
		<span></span>
	</label>

	<!-- This is the part of the menu that actually pops out -->
	<ul class="menu__box">
		
		<!-- Every button that is in the menu which are linked to their respective pages -->
		<li><a class="menu__item" href="homepage.php">Home</a></li>
		<li><a class="menu__item" href="account.php">Account</a></li>
		
		<!-- If Graeme is the user, he has access to more buttons which are only visible to him. These buttons will redirect him to the admin pages -->
		<?php
			if ($_SESSION["login_user"] == "Graeme" or $_SESSION["login_user"] == "graeme")
				echo "<li><a class='menu__item' href='allUsers.php'>User List</a></li>
				<li><a class='menu__item' href='adminSettings.php'>Admin Settings</a></li>";
		?>
		
		<!-- Logout button that activates "signOut.php" which logs the user out -->
		<li><a class = "sign-out" href='signOut.php'>Logout</a></li>
		
		
	</ul>
</div>

<!-- Website's logo which also acts as a button to redirect the user to "homepage.php" -->
<div class = "logo">
	<a href = "homepage.php">
	<img src = "images/logos/Logo1.png" style = "width: 12vw; position: static;">
	</a>
</div>