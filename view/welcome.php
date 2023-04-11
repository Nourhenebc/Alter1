<h1> welcome </h1>


	<?php
		// Check if user clicked the logout button
		if(isset($_POST['logout'])) {
			unset($_SESSION['token']);
			unset($_SESSION['authenticated']);
			unset($_SESSION['email']);
			


			session_destroy();
			// Redirect to the login page
			header("Location: login.php");
			exit();
		}
	?>
    


	<!-- Logout button -->
	<form method="post">
		<button type="submit" name="logout">Logout</button>
	</form>
