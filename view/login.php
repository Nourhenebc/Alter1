<?php
include '../controller/UserC.php';





if(isset($_POST['submit'])) {

    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    //$phone = $_POST['phone'];
    //$address = $_POST['address'];
    $profilePic = $_FILES['profilePic']['name'];
    $profilePicTmpName = $_FILES['profilePic']['tmp_name'];
    $gender = $_POST['gender'];
    $dateOfBirth = $_POST['dateOfBirth'];
    $role = $_POST['role'];

	$createdAt = date('Y-m-d H:i:s');
    $modifiedAt =null ;
    $deletedAt = null;
    // handle the uploaded file
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($profilePic);
    move_uploaded_file($profilePicTmpName, $targetFile);


	$documents = '';
    if ($role == 'doctor') {
        if (!empty($_FILES['documents']['name'])) {
            $documents = $_FILES['documents']['name'];
            $documentsTemp = $_FILES['documents']['tmp_name'];
            move_uploaded_file($documentsTemp, "uploads/documents/$documents");
        } else {
            echo "Error: Required documents not uploaded.";
            exit();
        }
    }
	$userDao = new UserC();
    $existingUser = $userDao->getUserByUsernameOrEmail($username, $email);
    if ($existingUser !=null) {
		echo '<div id="popup" class="popup">';
		echo '<div class="popup-content">';
		echo '<span class="close">&times;</span>';
		echo '<h2>Error: Username or email already exists</h2>';
		echo '<p>The username or email you entered already exists in our database. Please choose a different username or email.</p>';
		echo '</div>';
		echo '</div>';

		echo '<style>
		/* Popup container */
		.popup {
		  display: block; /* Hidden by default */
		  position: fixed; /* Stay in place */
		  z-index: 1; /* Sit on top */
		  padding-top: 100px; /* Location of the box */
		  left: 0;
		  top: 0;
		  width: 100%; /* Full width */
		  height: 100%; /* Full height */
		  overflow: auto; /* Enable scroll if needed */
		  background-color: rgb(0,0,0); /* Fallback color */
		  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
		}

		/* Popup content */
		.popup-content {
		  background-color: #fefefe;
		  margin: auto;
		  padding: 20px;
		  border: 1px solid #888;
		  width: 80%;
		  max-width: 400px;
		  text-align: center;
		  position: relative;
		}

		/* Close button */
		.close {
		  position: absolute;
		  top: 0;
		  right: 0;
		  color: #aaa;
		  font-size: 28px;
		  font-weight: bold;
		  padding: 10px;
		  cursor: pointer;
		}

		.close:hover,
		.close:focus {
		  color: black;
		  text-decoration: none;
		  cursor: pointer;
		}
	</style>';
	echo '<script>
	// Get the popup element
	var popup = document.getElementById("popup");

	// Get the close button
	var close = document.getElementsByClassName("close")[0];

	// When the user clicks the close button, hide the popup
	close.onclick = function() {
	  popup.style.display = "none";
	}
</script>';
        exit();
    }
	
    // create a new user object
    $user = new User();
	$user->setname($name);
    $user->setUsername($username);
    $user->setEmail($email);
    $user->setPassword(password_hash($password, PASSWORD_DEFAULT));
    //$user->setPhone($phone);
    //$user->setAddress($address);
    $user->setProfilePic($targetFile);
    $user->setGender($gender);
    $user->setDateOfBirth($dateOfBirth);
    $user->setRole($role);
	$user->setDocuments($documents);	
		$user->setDocuments($documents);	
  $user->setCreatedAt($createdAt);
//$user->setModifiedAt($modifiedAt);
  //  $user->setDeletedAt($deletedAt);
    // insert the user into the database
    $userDao->create($user);

    // redirect to a success page
    header("Location: login.php");
    exit;
}
  


session_start();
$emailErr = $passwordErr = $loginErr = "";

header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");

if (isset($_POST['login'])) {
	// Get form data
	$email = $_POST['email'];

	$password = $_POST['password'];
		// Check if email is empty
		if (empty($email)) {
			$emailErr = "Please enter your email.";
		}
		// Check if password is empty
		if (empty($password)) {
			$passwordErr = "Please enter your password.";
		}
		if (empty($emailErr) && empty($passwordErr)) {
			$userDao = new UserC();
			if ($userDao->verifyCredentials($email, $password)){
				$token = bin2hex(random_bytes(32));
				$user = $userDao->login($email);

				// Set session variables
				$_SESSION['email'] = $email;
				$_SESSION['token'] = $token;

				if ($user['role'] == 'doctor') {
					header('Location: doc_login.php');
					exit();
				} else if ($user['role'] == 'client') {
					header('Location: loggedin.php');
					exit();
				}

			} else {
				// Invalid login credentials, show error message
				$loginErr = "Invalid email or password. Please try again.";
			}
		}
	}
?>







<meta http-equiv="cache-control" content="no-cache, must-revalidate, post-check=0, pre-check=0">

<link href="css/login.css" rel="stylesheet">





<div class="container" id="container">
	<div class="form-container sign-up-container">
	<form id="signup_form" action="#" method="POST" enctype="multipart/form-data">
			<h2>Create Account</h2>
			<input type="text" placeholder="Full Name " name="name" id="name"/>
			<input type="text" placeholder="username" name="username" id="username"/>
			<input type="email" placeholder="Email" name="email" id="emaile"/>
			<input type="password" placeholder="Password" name="password" id="passworde" />
	
	<input placeholder="Address" type="file" name="profilePic" id="profilePic">

    <label  placeholder="Gender" for="gender"></label>
    <select id="gender" name="gender">
        <option value="male">Male</option>
        <option value="female">Female</option>
    </select>
	<label for="dateOfBirth"></label>
    <input type="date" name="dateOfBirth" id="dateOfBirth">
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script>
	$(document).ready(function(){
	    $("#role").change(function(){
	        if($(this).val() == "doctor"){
	            $("#documents").show();
	        }else{
	            $("#documents").hide();
	        }
	    });
	});
	</script>

	

<label for="role"></label>
    <select id="role" name="role">
        <option value="client">Client</option>
        <option value="doctor">Doctor</option>
    </select>

    <div id="documents" style="display:none;">
        <label for="documents">Upload License and Papers:</label>
        <input type="file" id="documents" name="documents"  accept=".pdf,.doc,.docx">
    </div>

    <button type="submit" name="submit" >Sign Up</button>
		</form>
	</div>
	<div class="form-container sign-in-container">



		<form  id="login-form" action="" method="POST"  >

			<h1>Sign in</h1>

			<input type="email" name="email" id="email" placeholder="Email"  <?php if(!empty($emailErr) || !empty($loginErr)){ echo 'style="background-color: #FFB6C1"';} ?> />
	<span class="error"><?php echo $emailErr;?></span>
	<input type="password" name="password" id="password" placeholder="Password"  <?php if(!empty($passwordErr) || !empty($loginErr)){ echo 'style="background-color: #FFB6C1"';} ?> />
	<span class="error"><?php echo $passwordErr;?></span>
		

			<a href="">Forgot your password?</a>
			<button  type="submit" name="login" >Sign In</button>
			<span class="error"><?php echo $loginErr;?></span>

		</form>


		











	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Welcome Back!</h1>
				<p>To keep connected with us please login in</p>
				<button class="ghost" id="signIn">Sign In</button>
			</div>
			<div class="overlay-panel overlay-right">

				<h1>Hello, are you a new Patient !</h1>
				<p>Enter your personal details and start journey with us</p>
				<button class="ghost" id="signUp">Sign Up</button>
			</div>
		</div>
	</div>
</div>

<footer>
	<script src="js/validation.js"> </script>

	<script src="js/login.js"> </script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


</footer>
