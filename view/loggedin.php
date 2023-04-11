

<!DOCTYPE html>
<html lang="en">
	<main>

	<?php
session_start();

header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");

if (!isset($_SESSION['email'])) {
    header('Location: login.php');
    exit();
}

// Check if a token is present in the session
if (!isset($_SESSION['token'])) {
    echo "Invalid token";
    exit();
}

// Get the token from the session
$token = $_SESSION['token'];

// Validate the token
if (!preg_match('/^[a-f0-9]{64}$/', $token)) {
    echo "Invalid token";
    exit();
}

// Token is valid, show welcome message
echo "Welcome, ".$_SESSION['email']."!";
echo "Your token is: $token";

include '../controller/UserC.php';

$userDao = new UserC();

$email = $_SESSION['email'];
$user = $userDao->getUserByEmail($email);

$username = $userDao->getUserByUsername($email);

$profilepic = $userDao->getUserByProfilePic($email);

$completeness = 50;


?>


<main>

	
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

</main>



	</main>

<main> 

<?php


if (isset($_POST['updateUser'])) {
    // get the form values
    $id = $_POST['id'];
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $ModifiedAt = date('Y-m-d H:i:s');
    $userC = new UserC();

    $targetFile = '';
	$currentUser = $userC->getUserById($id); // Assuming there's a method in the UserC class to retrieve a user by ID

    // move the uploaded file to the server
	if (!empty($_FILES['profilePic']['name'])) {
		$targetDir = "uploads/";
		$targetFile = $targetDir . basename($_FILES['profilePic']['name']);
		move_uploaded_file($_FILES['profilePic']['tmp_name'], $targetFile);
	} else {
		$targetFile = $currentUser->getProfilePic();
	}
    $gender = $currentUser->getGender();
    $role = $currentUser->getRole();
    $dateofbirth = $currentUser->getDateOfBirth();
    $createdAt = $currentUser->getCreatedAt();


    $user = new User();
	$user->setId($id);
    $user->setname($name);
    $user->setUsername($username);
    $user->setEmail($email);
	$user->setGender($gender); // Set the user's current gender value
    $user->setRole($role);
	 // Set the user's current role value
	if (!empty($password) && $password === $_POST['password']) {
        $user->setPassword(password_hash($password, PASSWORD_DEFAULT));
    } else {
        // If passwords do not match or are empty, do not update the password
        $user->setPassword($currentUser->getPassword());

	}    $user->setProfilePic($targetFile);
    $user->setModifiedAt($ModifiedAt);    
	$user->setDateOfBirth($dateofbirth);
	$user->setCreatedAt($createdAt);


    var_dump($id);

    var_dump($user);

    $userC->update($user);
    
	header("Location: loggedin.php");
    exit();
}
?>



</main>

<main>
	<?php
if (isset($_POST['deleteProfile'])) {
  // Get the user ID from the hidden input field
  $id = $_POST['id'];

  // Call the delete function with the user ID
  $UserDelete = new UserC();
  $UserDelete->softDelete($id);

  session_destroy();

  header('Location: index.php');
  exit;
}
?>


</main>

<main>
<?php
    $userC = new UserC();
    $doctors = $userC->getDoctors();

?>
</main>

<main>
<?php
if (isset($_POST['updateuserdetails'])) {
    $id = $_POST['id_detail'];
    $weight = $_POST['weight'];
    $height = $_POST['height'];
    $activityLevel = $_POST['activityLevel'];
  
      $userC = new UserC();
    $currentUser = $userC->getUserById($id);

    $currentUser->setWeight($weight);
    $currentUser->setHeight($height);
    $currentUser->setActivityLevel($activityLevel);

    $userC->updateUserDetails($currentUser, $weight, $height, $activityLevel);

    $completeness = 50;
    if ($weight && $height && $activityLevel) {
        $completeness = 100;
    }

    var_dump($id);
    var_dump($_POST['activityLevel']);
    // var_dump($user);
    header("Location: loggedin.php?progress=" . $completeness);
   exit();

    
}
?>

</main>
  <head>
    <title>Avicenne</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-xZTJ4s3oT+dTlkFLeL3dgfpU6S/rMOAde+aLek9aR9cSJQpnGz8O6sgsT6UksqzT" crossorigin="anonymous">
  <link rel="stylesheet" href="../view/css/assets/css/all.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">
    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
  	<div class="py-1 bg-black top">
    	<div class="container">
    		<div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
	    		<div class="col-lg-12 d-block">
		    		<div class="row d-flex">
		    			<div class="col-md pr-4 d-flex topper align-items-center">
					    </div>
					    <div class="col-md pr-4 d-flex topper align-items-center">
			
		

							
					    </div>
					    <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right justify-content-end">
						<form method="post">

		<p class="mb-0 register-link"><a href="#" class="mr-3">	<span  class='greeting'><?php echo 'Welcome, ' . $username . '!'; ?></span></a><a href="index.php">Logout</a></p>
					</form>	
					    </div>
				    </div>
			    </div>
		    </div>
		  </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light site-navbar-target" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.html" > <div class="logo">
			<img src="../view/images/logo.png" alt="Logo" >
		</div></a>
		<style> 

	.logo {
    width: 130px; /* adjust as needed */
    height: 50px; /* adjust as needed */
    display: flex;
    align-items: center;
	margin-right: 20px; /* Adjust the value to your desired position */

}

.logo img {
    width: 170%;
    height: auto;
    object-fit: contain;
	transform: translateX(-20%); /* Adjust the value to your desired position */

}



.profile-picture {
	width: 50px;
  height: 50px;
  border: 1px solid #000;
  border-radius: 5px;
  overflow: hidden;
      }

	  .profile-pic img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

      .navbar-nav li {
        display: flex;
        align-items: center;
      }

      .navbar-nav li a {
        padding: 0 10px;
      }
	

	  .dropdown-menu {
  background-color: #fff;
  border-radius: 5px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
  padding: 0;
  width: 200px;


}

.dropdown-item {
  font-size: 16px;
  padding: 10px 20px;
  color: #333;
  transition: all 0.3s ease;
}

.dropdown-item:hover, .dropdown-item:focus {
  background-color: #207dff;
  color: #fff;
}

.dropdown-divider {
  border-bottom: 1px solid #ddd;
  margin: 0;
  
}
.cta {
  margin-left: -65px; /* Adjust the value to your desired position */
  transform: translateX(10px); /* Adjust the value to your desired position */
}
.nav-item.profile {
  transform: translateX(150px); /* Adjust the value to your desired position */
}

.nav-item.notifications {
  transform: translateX(140px); /* Adjust the value to your desired position */
}

.nav-item.appointment {
  transform: translateX(75px); /* Adjust the value to your desired position */
}
	</style>
	      <button class="navbar-toggler js-fh5co-nav-toggle fh5co-nav-toggle" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav" >
	        <ul class="navbar-nav ml-auto justify-content-end">
	          <li class="nav-item ml-auto"><a href="#home-section" class="nav-link"><span>Home</span></a></li>
	          <li class="nav-item ml-auto"><a href="#about-section" class="nav-link"><span>About</span></a></li>
	          <li class="nav-item ml-auto"><a href="#department-section" class="nav-link"><span>Department</span></a></li>
	          <li class="nav-item ml-auto"><a href="#doctor-section" class="nav-link"><span>Doctors</span></a></li>
	          <li class="nav-item ml-auto"><a href="#blog-section" class="nav-link"><span>Blog</span></a></li>
	          <li class="nav-item ml-auto"><a href="#contact-section" class="nav-link"><span>Contact</span></a></li>
            <li class="nav-item cta mr-md-2 appointment transparent">
  <a href="appointment.html" class="nav-link">
    <div class="progress-bar"  style="width: <?php echo $_GET['progress'] ; ?>%;" id="progress-bar">
      <div class="progress-bar-fill"  style="width: 50%;"></div>
    </div>
    <span class="button-text">Profile completeness</span>


  </a>
</li>
<script>
document.addEventListener('DOMContentLoaded', function() {
  var progress = <?php echo isset($_GET['progress']) ? $_GET['progress'] : 50; ?>;
  var progressBarFill = document.querySelector('.progress-bar-fill');

  // Update the width of the progress bar
  progressBarFill.style.width = progress + '%';
});
</script>
<style>

.progress-bar {
  height: 20px;
  width: 150px;
  background-color: #f2f2f2;
  border-radius: 10px;
  overflow: hidden;
}

.progress-bar-fill {
  height: 100%;
  width: 0%;
  background-color: #4CAF50;
  transition: width 0.5s ease-in-out;
}

.button-text {
  position: absolute;
  top: 0;
  left: 0;
  height: 20px;
  width: 150px;
  text-align: center;
  line-height: 20px;
  color: white;
  font-size: 14px;
}

.progress-bar-fill {
  width: 50%;
}
  </style>
			  <li class="nav-item ml-auto profile">
  <a class="nav-link dropdown-toggle" href="#" id="profile-dropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <img class="profile-picture" src="<?php echo $profilepic; ?>" alt="Profile Picture">
  </a>
  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="profile-dropdown">
    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#update-profile-modal">Settings</a>
  </div>
</li>

<li  class="nav-item ml-auto notifications">
    <a class="nav-link" href="notifications.php"><i class="fa fa-bell"></i></a>
  </li>
	    
<style>

.nav-link i.fa-bell {
  font-size: 24px;
}
</style>
    </ul>
	      </div>
	    </div>
	  </nav>
	  

	  <script>
  $(document).ready(function() {
    // Hide the modal when the "Close" button is clicked
    $('#update-profile-modal').on('hidden.bs.modal', function (e) {
      $(this).find('form')[0].reset(); // Reset the form fields
    });
  });
</script>
<div class="modal fade" id="update-profile-modal" tabindex="-1" role="dialog" aria-labelledby="update-profile-modal-label" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="update-profile-modal-label">MY PROFILE</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <!-- Add a side menu with two submenus -->
      <div class="modal-body">
        <div class="row">
          <div class="col-md-3">
            <div class="list-group" id="list-tab" role="tablist">
            <a class="list-group-item list-group-item-action" id="additional-info-tab" data-toggle="list" href="#additional-info" role="tab" aria-controls="additional-info">More Info</a>

              <a class="list-group-item list-group-item-action active" id="update-profile-tab" data-toggle="list" href="#update-profile" role="tab" aria-controls="update-profile">Update Profile</a>
              <a class="list-group-item list-group-item-action" id="delete-profile-tab" data-toggle="list" href="#delete-profile" role="tab" aria-controls="delete-profile">Delete Profile</a>

            </div>
          </div>
          <div class="col-md-9">
            <div class="tab-content" id="nav-tabContent">
              <!-- Add the Update Profile submenu -->
              <div class="tab-pane fade show active" id="update-profile" role="tabpanel" aria-labelledby="update-profile-tab">

    <form method="post" enctype="multipart/form-data" name="updateUserForm">
                  <div class="form-group">
                    <input type="hidden" name="id" value="<?php echo $user->getId(); ?>">

                    <input placeholder ="Username" type="text" value="<?php echo $username ; ?>" class="form-control" id="username" name="username">
                  </div>
                  <div class="form-group">
                    <input type="text" value="<?php echo $user->getName(); ?>" placeholder ="Name" class="form-control" id="name" name="name">
                  </div>
                  <div class="form-group">
                    <input type="text" placeholder ="Password"  type="password" class="form-control" id="password" name="password">
                  </div>
                  <div class="form-group">
                    <input type="text" placeholder ="Email" value="<?php echo $email ; ?>" type="email" class="form-control" id="email" name="email">
                  </div>
                  <div class="form-group">
                    <div>
                      <input type="file" placeholder="Profile Picture" class="form-control-file" id="profilePic" name="profilePic" onchange="previewImage(this);">
                      <br>
                      <div>
                        <!-- Add this image tag to show the current profile picture -->
                        <img height ="100" width="100" id="image-preview" src="<?php echo $user->getProfilePic(); ?>" alt="Profile Picture">
						<script>
function previewImage(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e) {
      document.getElementById('image-preview').src = e.target.result;
    }
    reader.readAsDataURL(input.files[0]);
  }
}
</script>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="updateUser">Save Changes</button>
                  </div>
                </form>
			
			</div>
              <!-- Add the Delete Profile submenu -->
              <div class="tab-pane fade" id="delete-profile" role="tabpanel" aria-labelledby="delete-profile-tab">
			  <div class="modal-body">
        <p>Are you sure you want to delete your profile?</p>
        <p>This action cannot be undone.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <form method="post" id="userdetail">
          <input type="hidden" name="id" value="<?php echo $user->getId(); ?>">
          <button type="submit" class="btn btn-danger" name="deleteProfile">Delete</button>
        </form>
      </div>              </div>


      <div class="tab-pane fade" id="additional-info" role="tabpanel" aria-labelledby="additional-info-tab">
  <ul class="nav nav-tabs" id="infoTabs" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" id="weight-tab" data-toggle="tab" href="#weight" role="tab" aria-controls="weight" aria-selected="true">Weight</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="height-tab" data-toggle="tab" href="#height" role="tab" aria-controls="height" aria-selected="false">Height</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="activity-tab" data-toggle="tab" href="#activity" role="tab" aria-controls="activity" aria-selected="false">Activity</a>
    </li>
  </ul>
  <div class="tab-content" id="infoTabsContent">
    <div class="tab-pane fade show active" id="weight" role="tabpanel" aria-labelledby="weight-tab">
      <form method="POST"  name="updatedetails" id="xxx">  
      <input type="hidden" name="id_detail" value="<?php echo $user->getId(); ?>">
     
        <div class="form-group">
       
          <label for="weightInput">Weight:</label>
          <input type="number" class="form-control" id="weightInput" name="weight"  required placeholder="Weight must be at least 20 kg.">
          <div class="tab-pane fade" id="height" role="tabpanel" aria-labelledby="height-tab">
     
          <label for="heightInput">Height:</label>
          <input type="number" class="form-control" id="heightInput" name="height" required placeholder="Height must be between 100 and 300 cm.">
         
        </div>

        <div class="tab-pane fade" id="activity" role="tabpanel" aria-labelledby="activity-tab">

<ul style="margin-top:25px;" class="nav nav-pills" id="activity-level" role="tablist">
<li class="nav-item">
    <a class="nav-link<?php if(!isset($_POST['activityLevel']) || $_POST['activityLevel'] == 'lightly-active') echo ' active'; ?>" id="lightly-active-tab" data-toggle="pill" href="#lightly-active" role="tab" aria-controls="lightly-active" aria-selected="true">Lightly Active</a>
</li>
<li class="nav-item">
    <a class="nav-link<?php if(isset($_POST['activityLevel']) && $_POST['activityLevel'] == 'moderately-active') echo ' active'; ?>" id="moderately-active-tab" data-toggle="pill" href="#moderately-active" role="tab" aria-controls="moderately-active" aria-selected="false">Moderately Active</a>
</li>
<li class="nav-item">
    <a class="nav-link<?php if(isset($_POST['activityLevel']) && $_POST['activityLevel'] == 'highly-active') echo ' active'; ?>" id="highly-active-tab" data-toggle="pill" href="#highly-active" role="tab" aria-controls="highly-active" aria-selected="false">Highly Active</a>
</li>
</ul>
<div class="tab-content" id="activity-level-content">
<div class="tab-pane fade<?php if(!isset($_POST['activityLevel']) || $_POST['activityLevel'] == 'lightly-active') echo ' show active'; ?>" id="lightly-active" role="tabpanel" aria-labelledby="lightly-active-tab">
    <p>Your daily activities include light exercise such as walking or stretching.</p>
</div>
<div class="tab-pane fade<?php if(isset($_POST['activityLevel']) && $_POST['activityLevel'] == 'moderately-active') echo ' show active'; ?>" id="moderately-active" role="tabpanel" aria-labelledby="moderately-active-tab">
    <p>Your daily activities include moderate exercise such as cycling or swimming.</p>
</div>
<div class="tab-pane fade<?php if(isset($_POST['activityLevel']) && $_POST['activityLevel'] == 'highly-active') echo ' show active'; ?>" id="highly-active" role="tabpanel" aria-labelledby="highly-active-tab">
    <p>Your daily activities include intense exercise such as running or weightlifting.</p>
</div>
</div>

<input type="hidden" id="activityLevelInput" name="activityLevel" value="<?php echo isset($_POST['activityLevel']) ? $_POST['activityLevel'] : ''; ?>">
        </div>


</form>

    <button type="submit" class="btn btn-primary" id="updateButton" name="updateuserdetails">Update</button>

  </div>
  
        </div>
        
    </div>
   
    </div>
   
 
       

        <script>
   const activityLevelTabs = document.querySelectorAll('#activity-level .nav-link');
const activityLevelInput = document.getElementById('activityLevelInput');
const activityLevelDescriptions = document.querySelectorAll('#activity-level-content .tab-pane');

// Add event listener to each activity level tab
activityLevelTabs.forEach(tab => {
    tab.addEventListener('click', () => {
        // Remove 'active' class from all tabs
        activityLevelTabs.forEach(tab => {
            tab.classList.remove('active');
        });

        // Add 'active' class to clicked tab
        tab.classList.add('active');

        // Update the hidden input field with the selected activity level
        activityLevelInput.value = tab.getAttribute('aria-controls');

        // Update the description of each activity level
        activityLevelDescriptions.forEach(description => {
            description.classList.remove('show', 'active');
            if (description.getAttribute('id') === tab.getAttribute('aria-controls')) {
                description.classList.add('show', 'active');
            }
        });

        // Update progress bar to 100%
    });
});
</script>








    </div>
    

  </div>


</div>


      
            </div>
          </div>
        </div>
      </div>
      
    </div>
  </div>
</div>
     












	  <section class="hero-wrap js-fullheight" style="background-image: url('images/bg_3.jpg');" data-section="home" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
          <div class="col-md-6 pt-5 ftco-animate">
          	<div class="mt-5">
          		<span class="subheading">Welcome to Avicenne</span>
	            <h1 class="mb-4">We are here <br>for your Care</h1>
	            <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove.</p>
	            <p><a href="#" class="btn btn-primary py-3 px-4">Make an appointment</a></p>
            </div>
          </div>
        </div>
      </div>
    </section>
	<section class="ftco-section" id="doctor-section">
			<div class="container-fluid px-5">
				<div class="row justify-content-center mb-5 pb-2">
          <div class="col-md-8 text-center heading-section ftco-animate">
            <h2 class="mb-4">Our Qualified Doctors</h2>
            <p>Separated they live in. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country</p>
          </div>
        </div>	
		<div class="doctor-slideshow-wrapper">

		<div class="row" id="doctor-list" >
			
	<?php
	$doctors_per_page = 4;

	// Get the current page number from the URL query string
	$current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

	// Calculate the starting index for the current page
	$start_index = ($current_page - 1) * $doctors_per_page;

	// Slice the doctors array to get only the doctors for the current page
	$doctors_for_page = array_slice($doctors, $start_index, $doctors_per_page);

	// Check if there are more doctors to display on the next page
	$has_next_page = count($doctors) > $start_index + $doctors_per_page;
	$has_previous_page = $current_page > 1;
	

	foreach ($doctors_for_page as $doctor) {
    $doctorSchedule = $userC->getDoctorSchedule($doctor['id']);

		?>
		<div class="col-md-6 col-lg-3 ftco-animate">
			<div class="staff">
				<div class="img-wrap d-flex align-items-stretch">
					<div class="img align-self-stretch" style="background-image: url(<?php echo $doctor['profile_pic']; ?>);"></div>
				</div>
				<div class="text pt-3 text-center">
					<h3 class="mb-2"><?php echo $doctor['name']; ?></h3>
          <ul  class="doctor-schedule">
                        <?php foreach ($doctorSchedule as $schedule) { ?>
                            <li><?php echo $schedule->getDate() . ': ' . $schedule->getStartTime() . ' - ' . $schedule->getEndTime(); ?></li>
                        <?php } ?>
                    </ul>		

                    <style>


.doctor-schedule {
  list-style: none;
  margin: 0;
  padding: 0;
  color :#207dff;
}

.doctor-schedule li {
  border: 1px solid #fff;
  border-radius: 4px;
  margin-bottom: 10px;
  padding: 10px;
  background-color: #f8f8f8;
}

.doctor-schedule li:first-child {
  margin-top: 20px;
}

.doctor-schedule li:last-child {
  margin-bottom: 0;
}

.doctor-schedule li a {
  color: #333;
  text-decoration: none;
  font-weight: bold;
}

.doctor-schedule li a:hover {
  text-decoration: underline;
}
                    </style>
					<div class="faded">


 				<ul class="ftco-social text-center">
							<li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
							<li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
							<li class="ftco-animate"><a href="#"><span class="icon-google-plus"></span></a></li>
							<li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
						</ul>
						<p><a href="#" class="btn btn-primary">Book now</a></p>
					</div>
				</div>
			</div>
		</div>
	<?php
	}
	?>
	  <div class="arrow arrow-left" id="prev-doctor"><span class="icon-arrow-left"></span></div>
  <div class="arrow arrow-right" id="next-doctor"><span class="icon-arrow-right"></span></div>
  <style>
  
  .doctor-slideshow-wrapper {
	position: relative;
	overflow: hidden;
}

#doctor-list {
	display: flex;
	flex-wrap: wrap;
	transition: transform 0.5s ease-in-out;
}

.arrow {
	position: absolute;
	top: 50%;
	transform: translateY(-50%);
	font-size: 2rem;
	color: #ccc;
	cursor: pointer;
	transition: color 0.2s ease-in-out, transform 0.2s ease-in-out;
}

.arrow:hover {
	color: #333;
	transform: translateY(-50%) scale(1.2);
}

.arrow-left {
	left: 20px;
}

.arrow-right {
	right: 20px;
}


</style>
</div>
</div>






<!-- Add jQuery library -->

<script>
const nextArrow = document.querySelector('#next-doctor');
const prevArrow = document.querySelector('#prev-doctor');

// Get the number of doctors per page and the total number of pages
const doctorsPerPage = <?php echo $doctors_per_page; ?>;
const totalPages = Math.ceil(<?php echo count($doctors); ?> / doctorsPerPage);

// Parse the URL query string to get the current page number
const urlParams = new URLSearchParams(window.location.search);
let currentPage = parseInt(urlParams.get('page')) || 1;

// Add a click event listener to the next arrow
nextArrow.addEventListener('click', function() {
  // Increment the current page number
  currentPage++;

  // If we've reached the last page, loop back to the first page
  if (currentPage > totalPages) {
    currentPage = 1;
  }

  // Update the URL query string with the new page number
  const newUrl = window.location.pathname + '?page=' + currentPage;
  window.history.pushState({path: newUrl}, '', newUrl);

  // Reload the page to display the next set of doctors
  window.location.reload();
});

// Add a click event listener to the previous arrow
prevArrow.addEventListener('click', function() {
  // Decrement the current page number
  currentPage--;

  // If we've reached the first page, loop back to the last page
  if (currentPage < 1) {
    currentPage = totalPages;
  }

  // Log the current page and URL query string to the console
  console.log('Current page:', currentPage);
  console.log('URL query string:', window.location.search);

  // Update the URL query string with the new page number
  const newUrl = window.location.pathname + '?page=' + currentPage;
  window.history.pushState({path: newUrl}, '', newUrl);

  // Reload the page to display the previous set of doctors
  window.location.reload();
});






</script>


			
		</section>

		
		<section class="ftco-counter img ftco-section ftco-no-pt ftco-no-pb" id="about-section">
    	<div class="container">
    		<div class="row d-flex">
    			<div class="col-md-6 col-lg-5 d-flex">
    				<div class="img d-flex align-self-stretch align-items-center" style="background-image:url(images/about.jpg);">
    				</div>
    			</div>
    			<div class="col-md-6 col-lg-7 pl-lg-5 py-md-5">
    				<div class="py-md-5">
	    				<div class="row justify-content-start pb-3">
			          <div class="col-md-12 heading-section ftco-animate p-4 p-lg-5">
			            <h2 class="mb-4">We Are <span>Avicenna</span> A Medical Clinic</h2>
			            <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
			            <p><a href="#" class="btn btn-primary py-3 px-4">Make an appointment</a> <a href="#" class="btn btn-secondary py-3 px-4">Contact us</a></p>
			          </div>
			        </div>
		        </div>
	        </div>
        </div>
    	</div>
    </section>


		<section class="ftco-section ftco-no-pt ftco-no-pb ftco-services-2 bg-light">
			<div class="container">
        <div class="row d-flex">
	        <div class="col-md-7 py-5">
	        	<div class="py-lg-5">
		        	<div class="row justify-content-center pb-5">
			          <div class="col-md-12 heading-section ftco-animate">
			            <h2 class="mb-3">Our Services</h2>
			          </div>
			        </div>
			        <div class="row">
			        	<div class="col-md-6 d-flex align-self-stretch ftco-animate">
			            <div class="media block-6 services d-flex">
			              <div class="icon justify-content-center align-items-center d-flex"><span class="flaticon-ambulance"></span></div>
			              <div class="media-body pl-md-4">
			                <h3 class="heading mb-3">Emergency Services</h3>
			                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
			              </div>
			            </div>      
			          </div>
			          <div class="col-md-6 d-flex align-self-stretch ftco-animate">
			            <div class="media block-6 services d-flex">
			              <div class="icon justify-content-center align-items-center d-flex"><span class="flaticon-doctor"></span></div>
			              <div class="media-body pl-md-4">
			                <h3 class="heading mb-3">Qualified Doctors</h3>
			                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
			              </div>
			            </div>      
			          </div>
			          <div class="col-md-6 d-flex align-self-stretch ftco-animate">
			            <div class="media block-6 services d-flex">
			              <div class="icon justify-content-center align-items-center d-flex"><span class="flaticon-stethoscope"></span></div>
			              <div class="media-body pl-md-4">
			                <h3 class="heading mb-3">Outdoors Checkup</h3>
			                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
			              </div>
			            </div>      
			          </div>
			          <div class="col-md-6 d-flex align-self-stretch ftco-animate">
			            <div class="media block-6 services d-flex">
			              <div class="icon justify-content-center align-items-center d-flex"><span class="flaticon-24-hours"></span></div>
			              <div class="media-body pl-md-4">
			                <h3 class="heading mb-3">24 Hours Service</h3>
			                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
			              </div>
			            </div>      
			          </div>
			        </div>
			      </div>
		      </div>
		      <div class="col-md-5 d-flex">
	        	<div class="appointment-wrap bg-white p-4 p-md-5 d-flex align-items-center">
		        	<form action="#" class="appointment-form ftco-animate">
		        		<h3>Free Consultation</h3>
		    				<div class="">
			    				<div class="form-group">
			    					<input type="text" class="form-control" placeholder="First Name">
			    				</div>
			    				<div class="form-group">
			    					<input type="text" class="form-control" placeholder="Last Name">
			    				</div>
		    				</div>
		    				<div class="">
		    					<div class="form-group">
			    					<div class="form-field">
	          					<div class="select-wrap">
	                      <div class="icon"><span class="ion-ios-arrow-down"></span></div>
	                      <select name="" id="" class="form-control">
	                      	<option value="">Select Your Services</option>
	                        <option value="">Neurology</option>
	                        <option value="">Cardiology</option>
	                        <option value="">Dental</option>
	                        <option value="">Ophthalmology</option>
	                        <option value="">Other Services</option>
	                      </select>
	                    </div>
			              </div>
			    				</div>
		    					<div class="form-group">
			    					<input type="text" class="form-control" placeholder="Phone">
			    				</div>
		    				</div>
		    				<div class="">
			    				<div class="form-group">
			    					<div class="input-wrap">
			            		<div class="icon"><span class="ion-md-calendar"></span></div>
			            		<input type="text" class="form-control appointment_date" placeholder="Date">
		            		</div>
			    				</div>
			    				<div class="form-group">
			    					<div class="input-wrap">
			            		<div class="icon"><span class="ion-ios-clock"></span></div>
			            		<input type="text" class="form-control appointment_time" placeholder="Time">
		            		</div>
			    				</div>
		    				</div>
		    				<div class="">
		    					<div class="form-group">
			              <textarea name="" id="" cols="30" rows="2" class="form-control" placeholder="Message"></textarea>
			            </div>
			            <div class="form-group">
			              <input type="submit" value="Appointment" class="btn btn-secondary py-3 px-4">
			            </div>
		    				</div>
		    			</form>
		    		</div>
	        </div>
		    </div>
			</div>
		</section>

    <section class="ftco-intro img" style="background-image: url(images/bg_2.jpg);">
			<div class="overlay"></div>
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-md-9 text-center">
						<h2>Your Health is Our Priority</h2>
						<p>We can manage your dream building A small river named Duden flows by their place</p>
						<p class="mb-0"><a href="#" class="btn btn-white px-4 py-3">Search Places</a></p>
					</div>
				</div>
			</div>
		</section>

		<section class="ftco-section ftco-no-pt ftco-no-pb" id="department-section">
    	<div class="container-fluid px-0">
    		<div class="row no-gutters">
    			<div class="col-md-4 d-flex">
    				<div class="img img-dept align-self-stretch" style="background-image: url(images/dept-1.jpg);"></div>
    			</div>

    			<div class="col-md-8">
    				<div class="row no-gutters">
    					<div class="col-md-4">
    						<div class="department-wrap p-4 ftco-animate">
    							<div class="text p-2 text-center">
    								<div class="icon">
    									<span class="flaticon-stethoscope"></span>
    								</div>
    								<h3><a href="#">Neurology</a></h3>
    								<p>Far far away, behind the word mountains</p>
    							</div>
    						</div>
    						<div class="department-wrap p-4 ftco-animate">
    							<div class="text p-2 text-center">
    								<div class="icon">
    									<span class="flaticon-stethoscope"></span>
    								</div>
    								<h3><a href="#">Surgical</a></h3>
    								<p>Far far away, behind the word mountains</p>
    							</div>
    						</div>
    						<div class="department-wrap p-4 ftco-animate">
    							<div class="text p-2 text-center">
    								<div class="icon">
    									<span class="flaticon-stethoscope"></span>
    								</div>
    								<h3><a href="#">Dental</a></h3>
    								<p>Far far away, behind the word mountains</p>
    							</div>
    						</div>
    					</div>

    					<div class="col-md-4">
    						<div class="department-wrap p-4 ftco-animate">
    							<div class="text p-2 text-center">
    								<div class="icon">
    									<span class="flaticon-stethoscope"></span>
    								</div>
    								<h3><a href="#">Opthalmology</a></h3>
    								<p>Far far away, behind the word mountains</p>
    							</div>
    						</div>
    						<div class="department-wrap p-4 ftco-animate">
    							<div class="text p-2 text-center">
    								<div class="icon">
    									<span class="flaticon-stethoscope"></span>
    								</div>
    								<h3><a href="#">Cardiology</a></h3>
    								<p>Far far away, behind the word mountains</p>
    							</div>
    						</div>
    						<div class="department-wrap p-4 ftco-animate">
    							<div class="text p-2 text-center">
    								<div class="icon">
    									<span class="flaticon-stethoscope"></span>
    								</div>
    								<h3><a href="#">Traumatology</a></h3>
    								<p>Far far away, behind the word mountains</p>
    							</div>
    						</div>
    					</div>

    					<div class="col-md-4">
    						<div class="department-wrap p-4 ftco-animate">
    							<div class="text p-2 text-center">
    								<div class="icon">
    									<span class="flaticon-stethoscope"></span>
    								</div>
    								<h3><a href="#">Nuclear Magnetic</a></h3>
    								<p>Far far away, behind the word mountains</p>
    							</div>
    						</div>
    						<div class="department-wrap p-4 ftco-animate">
    							<div class="text p-2 text-center">
    								<div class="icon">
    									<span class="flaticon-stethoscope"></span>
    								</div>
    								<h3><a href="#">X-ray</a></h3>
    								<p>Far far away, behind the word mountains</p>
    							</div>
    						</div>
    						<div class="department-wrap p-4 ftco-animate">
    							<div class="text p-2 text-center">
    								<div class="icon">
    									<span class="flaticon-stethoscope"></span>
    								</div>
    								<h3><a href="#">Cardiology</a></h3>
    								<p>Far far away, behind the word mountains</p>
    							</div>
    						</div>
    					</div>
    				</div>
    			</div>
    		</div>
    	</div>
    </section>
		
	

		<section class="ftco-facts img ftco-counter" style="background-image: url(images/bg_3.jpg);">
			<div class="overlay"></div>
			<div class="container">
				<div class="row d-flex align-items-center">
					<div class="col-md-5 heading-section heading-section-white">
						<span class="subheading">Fun facts</span>
						<h2 class="mb-4">Over 5,100 patients trust us</h2>
						<p class="mb-0"><a href="#" class="btn btn-secondary px-4 py-3">Make an appointment</a></p>
					</div>
					<div class="col-md-7">
						<div class="row pt-4">
		          <div class="col-md-6 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18">
		              <div class="text">
		                <strong class="number" data-number="30">0</strong>
		                <span>Years of Experienced</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-6 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18">
		              <div class="text">
		                <strong class="number" data-number="4500">0</strong>
		                <span>Happy Patients</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-6 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18">
		              <div class="text">
		                <strong class="number" data-number="84">0</strong>
		                <span>Number of Doctors</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-6 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18">
		              <div class="text">
		                <strong class="number" data-number="300">0</strong>
		                <span>Number of Staffs</span>
		              </div>
		            </div>
		          </div>
	          </div>
					</div>
				</div>
			</div>
		</section>


    <section class="ftco-section bg-light" id="blog-section">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-5">
          <div class="col-md-10 heading-section text-center ftco-animate">
            <h2 class="mb-4">Gets Every Single Updates Here</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
          </div>
        </div>
        <div class="row d-flex">
          <div class="col-md-4 ftco-animate">
            <div class="blog-entry">
              <a href="blog-single.html" class="block-20" style="background-image: url('images/image_1.jpg');">
              </a>
              <div class="text d-block">
              	<div class="meta mb-3">
                  <div><a href="#">June 9, 2019</a></div>
                  <div><a href="#">Admin</a></div>
                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                </div>
                <h3 class="heading"><a href="#">Scary Thing That You Don’t Get Enough Sleep</a></h3>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                <p><a href="blog-single.html" class="btn btn-primary py-2 px-3">Read more</a></p>
              </div>
            </div>
        	</div>

        	<div class="col-md-4 ftco-animate">
            <div class="blog-entry">
              <a href="blog-single.html" class="block-20" style="background-image: url('images/image_2.jpg');">
              </a>
              <div class="text d-block">
              	<div class="meta mb-3">
                  <div><a href="#">June 9, 2019</a></div>
                  <div><a href="#">Admin</a></div>
                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                </div>
                <h3 class="heading"><a href="#">Scary Thing That You Don’t Get Enough Sleep</a></h3>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                <p><a href="blog-single.html" class="btn btn-primary py-2 px-3">Read more</a></p>
              </div>
            </div>
        	</div>

        	<div class="col-md-4 ftco-animate">
            <div class="blog-entry">
              <a href="blog-single.html" class="block-20" style="background-image: url('images/image_3.jpg');">
              </a>
              <div class="text d-block">
              	<div class="meta mb-3">
                  <div><a href="#">June 9, 2019</a></div>
                  <div><a href="#">Admin</a></div>
                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                </div>
                <h3 class="heading"><a href="#">Scary Thing That You Don’t Get Enough Sleep</a></h3>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                <p><a href="blog-single.html" class="btn btn-primary py-2 px-3">Read more</a></p>
              </div>
            </div>
        	</div>

        	<div class="col-md-4 ftco-animate">
            <div class="blog-entry">
              <a href="blog-single.html" class="block-20" style="background-image: url('images/image_4.jpg');">
              </a>
              <div class="text d-block">
              	<div class="meta mb-3">
                  <div><a href="#">June 9, 2019</a></div>
                  <div><a href="#">Admin</a></div>
                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                </div>
                <h3 class="heading"><a href="#">Scary Thing That You Don’t Get Enough Sleep</a></h3>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                <p><a href="blog-single.html" class="btn btn-primary py-2 px-3">Read more</a></p>
              </div>
            </div>
        	</div>

        	<div class="col-md-4 ftco-animate">
            <div class="blog-entry">
              <a href="blog-single.html" class="block-20" style="background-image: url('images/image_5.jpg');">
              </a>
              <div class="text d-block">
              	<div class="meta mb-3">
                  <div><a href="#">June 9, 2019</a></div>
                  <div><a href="#">Admin</a></div>
                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                </div>
                <h3 class="heading"><a href="#">Scary Thing That You Don’t Get Enough Sleep</a></h3>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                <p><a href="blog-single.html" class="btn btn-primary py-2 px-3">Read more</a></p>
              </div>
            </div>
        	</div>

        	<div class="col-md-4 ftco-animate">
            <div class="blog-entry">
              <a href="blog-single.html" class="block-20" style="background-image: url('images/image_6.jpg');">
              </a>
              <div class="text d-block">
              	<div class="meta mb-3">
                  <div><a href="#">June 9, 2019</a></div>
                  <div><a href="#">Admin</a></div>
                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                </div>
                <h3 class="heading"><a href="#">Scary Thing That You Don’t Get Enough Sleep</a></h3>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                <p><a href="blog-single.html" class="btn btn-primary py-2 px-3">Read more</a></p>
              </div>
            </div>
        	</div>
        </div>
      </div>
    </section>

    <section class="ftco-section testimony-section img" style="background-image: url(images/bg_3.jpg);">
    	<div class="overlay"></div>
      <div class="container">
        <div class="row justify-content-center pb-3">
          <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
          	<span class="subheading">Read testimonials</span>
            <h2 class="mb-4">Our Patient Says</h2>
          </div>
        </div>
        <div class="row ftco-animate justify-content-center">
          <div class="col-md-12">
            <div class="carousel-testimony owl-carousel ftco-owl">
              <div class="item">
                <div class="testimony-wrap text-center py-4 pb-5">
                  <div class="user-img" style="background-image: url(images/person_1.jpg)">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                  </div>
                  <div class="text px-4">
                    <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <p class="name">Jeff Freshman</p>
                    <span class="position">Patients</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap text-center py-4 pb-5">
                  <div class="user-img" style="background-image: url(images/person_2.jpg)">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                  </div>
                  <div class="text px-4">
                    <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <p class="name">Jeff Freshman</p>
                    <span class="position">Patients</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap text-center py-4 pb-5">
                  <div class="user-img" style="background-image: url(images/person_3.jpg)">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                  </div>
                  <div class="text px-4">
                    <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <p class="name">Jeff Freshman</p>
                    <span class="position">Patients</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap text-center py-4 pb-5">
                  <div class="user-img" style="background-image: url(images/person_1.jpg)">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                  </div>
                  <div class="text px-4">
                    <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <p class="name">Jeff Freshman</p>
                    <span class="position">Patients</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap text-center py-4 pb-5">
                  <div class="user-img" style="background-image: url(images/person_3.jpg)">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                  </div>
                  <div class="text px-4">
                    <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <p class="name">Jeff Freshman</p>
                    <span class="position">Patients</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section contact-section" id="contact-section">
      <div class="container">
      	<div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section text-center ftco-animate">
            <h2 class="mb-4">Contact Us</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
          </div>
        </div>
        <div class="row d-flex contact-info mb-5">
          <div class="col-md-6 col-lg-3 d-flex ftco-animate">
          	<div class="align-self-stretch box p-4 text-center bg-light">
          		<div class="icon d-flex align-items-center justify-content-center">
          			<span class="icon-map-signs"></span>
          		</div>
          		<h3 class="mb-4">Address</h3>
	            <p>198 West 21th Street, Suite 721 New York NY 10016</p>
	          </div>
          </div>
          <div class="col-md-6 col-lg-3 d-flex ftco-animate">
          	<div class="align-self-stretch box p-4 text-center bg-light">
          		<div class="icon d-flex align-items-center justify-content-center">
          			<span class="icon-phone2"></span>
          		</div>
          		<h3 class="mb-4">Contact Number</h3>
	            <p><a href="tel://1234567920">+ 1235 2355 98</a></p>
	          </div>
          </div>
          <div class="col-md-6 col-lg-3 d-flex ftco-animate">
          	<div class="align-self-stretch box p-4 text-center bg-light">
          		<div class="icon d-flex align-items-center justify-content-center">
          			<span class="icon-paper-plane"></span>
          		</div>
          		<h3 class="mb-4">Email Address</h3>
	            <p><a href="mailto:info@yoursite.com">info@yoursite.com</a></p>
	          </div>
          </div>
          <div class="col-md-6 col-lg-3 d-flex ftco-animate">
          	<div class="align-self-stretch box p-4 text-center bg-light">
          		<div class="icon d-flex align-items-center justify-content-center">
          			<span class="icon-globe"></span>
          		</div>
          		<h3 class="mb-4">Website</h3>
	            <p><a href="#">yoursite.com</a></p>
	          </div>
          </div>
        </div>
        <div class="row no-gutters block-9">
          <div class="col-md-6 order-md-last d-flex">
            <form action="#" class="bg-light p-5 contact-form">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Your Name">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Your Email">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Subject">
              </div>
              <div class="form-group">
                <textarea name="" id="" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
              </div>
              <div class="form-group">
                <input type="submit" value="Send Message" class="btn btn-secondary py-3 px-5">
              </div>
            </form>
          
          </div>

          <div class="col-md-6 d-flex">
          	<div id="map" class="bg-white"></div>
          </div>
        </div>
      </div>
    </section>

    <footer class="ftco-footer ftco-section img" style="background-image: url(images/footer-bg.jpg);">
    	<div class="overlay"></div>
      <div class="container-fluid px-md-5">
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Mediplus</h2>
              <p>Far far away, behind the word mountains, far from the countries.</p>
              <ul class="ftco-footer-social list-unstyled mt-5">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-4">
              <h2 class="ftco-heading-2">Departments</h2>
              <ul class="list-unstyled">
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Neurology</a></li>
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Opthalmology</a></li>
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Nuclear Magnetic</a></li>
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Surgical</a></li>
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Cardiology</a></li>
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Dental</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-4">
              <h2 class="ftco-heading-2">Links</h2>
              <ul class="list-unstyled">
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Home</a></li>
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>About</a></li>
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Departments</a></li>
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Doctors</a></li>
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Blog</a></li>
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Pricing</a></li>
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Contact</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Services</h2>
              <ul class="list-unstyled">
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Emergency Services</a></li>
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Qualified Doctors</a></li>
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Outdoors Checkup</a></li>
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>24 Hours Services</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Have a Questions?</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929 210</span></a></li>
	                <li><a href="#"><span class="icon icon-envelope pr-4"></span><span class="text">info@yourdomain.com</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">
	
            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  
  <script src="js/main.js"></script>
    
  </body>
</html>