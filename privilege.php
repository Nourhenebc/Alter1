<?php
include '../Controller/PrivilegeC.php';

$pc = new PrivilegeC();

$liste = $pc->listePrivilege();

?>
<!DOCTYPE html>

<html lang="en" >
<head>

  <meta charset="UTF-8">
  <title>CodePen - CSS Grid Modern Responsive Dashboard</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">
    <link rel="shortcut icon" type="image/png" href="#"><link rel="stylesheet" href="./style.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">
    <link rel="shortcut icon" type="image/png" href="#"><link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="nicepage.css" media="screen">
<link rel="stylesheet" href="Page-1.css" media="screen">
    <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 5.7.9, nicepage.com">
    <meta name="referrer" content="origin">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style> 
 body {
  background-color: #f2f2f2;
  font-family: Arial, sans-serif;
}

.container {
  max-width: 1200px;
  margin: 0 auto;
  padding: 20px;
}

h1 {
  font-size: 36px;
  text-align: center;
  margin-bottom: 30px;
}

form {
  background: linear-gradient(-45deg, #E0FFFF, #F0FFFF, #E0FFFF, #F0FFFF, #E0FFFF, #F0FFFF);
  background-size: 400% 400%;
  border-radius: 5px;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
  padding: 20px;
  animation: gradient 15s ease infinite;
}

@keyframes gradient {
  0% {
    background-position: 0% 50%;
  }
  50% {
    background-position: 100% 50%;
  }
  100% {
    background-position: 0% 50%;
  }
}

label {
  display: block;
  font-size: 16px;
  font-weight: bold;
  margin-bottom: 10px;
  color: #000;
  animation: label-color 3s ease infinite;
}

@keyframes label-color {
  0% {
    color: #000;
  }
  50% {
    color: #ff0066;
  }
  100% {
    color: #000;
  }
}

input[type="text"], textarea {
  width: 100%;
  padding: 10px;
  font-size: 16px;
  border: 1px solid #ccc;
  border-radius: 3px;
  margin-bottom: 20px;
  box-sizing: border-box;
  animation: input-color 3s ease infinite;
}

@keyframes input-color {
  0% {
    border-color: #ccc;
  }
  50% {
    border-color: #ff0066;
  }
  100% {
    border-color: #ccc;
  }
}

input[type="text"]::placeholder, textarea::placeholder {
  color: #ccc;
  animation: placeholder-color 3s ease infinite;
}

@keyframes placeholder-color {
  0% {
    color: #ccc;
  }
  50% {
    color: #ff0066;
  }
  100% {
    color: #ccc;
  }
}

input[type="number"], textarea {
  width: 100%;
  padding: 10px;
  font-size: 16px;
  border: 1px solid #ccc;
  border-radius: 3px;
  margin-bottom: 20px;
  box-sizing: border-box;
  animation: input-color 3s ease infinite;
}

@keyframes input-color {
  0% {
    border-color: #ccc;
  }
  50% {
    border-color: #ff0066;
  }
  100% {
    border-color: #ccc;
  }
}

input[type="number"]::placeholder, textarea::placeholder {
  color: #ccc;
  animation: placeholder-color 3s ease infinite;
}

@keyframes placeholder-color {
  0% {
    color: #ccc;
  }
  50% {
    color: #ff0066;
  }
  100% {
    color: #ccc;
  }
}






input[type="submit"], a {
	display: inline-block;
	padding: 10px 20px;
	background-color: #333;
	color: #fff;
	border: none;
	border-radius: 5px;
	font-size: 16px;
	cursor: pointer;
	margin-right: 10px;
	position: relative;
	animation: move 2s ease-in-out infinite, color-change 2s ease-in-out infinite;
}



@keyframes color-change {
	50% { background-color: #FFDAB9; }
	50% { background-color: #ADD8E6 }
	
}
</style>

    
    <script type="application/ld+json">{
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": ""
}</script>

</head>
<body>
<!-- partial:index.partial.html -->
<div class="grid">
  <header class="header">
    <i class="fas fa-bars header__menu"></i>
    <div class="header__search">
      <input class="header__input" placeholder="Search..." />
    </div>
    <div class="header__avatar">
      <div class="dropdown">
        <ul class="dropdown__list">
          <li class="dropdown__list-item">
            <span class="dropdown__icon"><i class="far fa-user"></i></span>
            <span class="dropdown__title">my profile</span>
          </li>
          <li class="dropdown__list-item">
            <span class="dropdown__icon"><i class="fas fa-clipboard-list"></i></span>
            <span class="dropdown__title">my account</span>
          </li>
          <li class="dropdown__list-item">
            <span class="dropdown__icon"><i class="fas fa-sign-out-alt"></i></span>
            <span class="dropdown__title">log out</span>
          </li>
        </ul>
      </div>
    </div>
  </header>

  <aside class="sidenav">
    <div class="sidenav__brand">
      <i class="fas fa-industry sidenav__brand-icon"></i>
      <a class="sidenav__brand-link" href="#">Avicenna<span class="text-light"></span></a>
      <i class="fas fa-times sidenav__brand-close"></i>
    </div>
    <div class="sidenav__profile">
      <div class="sidenav__profile-avatar"></div>
      <div class="sidenav__profile-title text-light">ines00</div>
    </div>
    <div class="row row--align-v-center row--align-h-center">
      <ul class="navList">
        
          <div class="navList__subheading row row--align-v-center">
            
            <span class="navList__subheading-title">Dashboard</span>
          </div>
          
        
        <li class="navList__heading">acount managment<i class="fas fa-unlock"></i></li>
        <li>
          <div class="navList__subheading row row--align-v-center">
            <span class="navList__subheading-icon"><i class="fas fa-envelope"></i></span>
            <span class="navList__subheading-title">admin</span>

          </div>
          
        
          <div class="navList__subheading row row--align-v-center">
            <span class="navList__subheading-icon"><i class="fas fa-eye"></i></span>
            <span class="navList__subheading-title">client</span>
          </div>
          
        
          
          

        <li class="navList__heading">feedback and rating <i class="fas fa-volume-up"></i></li>
        <li>
          
          
        <li>
          <div class="navList__subheading row row--align-v-center">
            <span class="navList__subheading-icon"><i class="fas fa-music"></i></span>
            <span class="navList__subheading-title">feedback</span>
          </div>
          <ul class="subList subList--hidden">
            
            
          </ul>
        </li>
        <li>
          
            
            
         
          <ul class="subList subList--hidden">
           
        
            
          </ul>
        </li>

        <li class="navList__heading">teletherapy<i class="fas fa-user-clock"></i></li>
        <li>
          <div class="navList__subheading row row--align-v-center">
            <span class="navList__subheading-icon"><i class="fas fa-calendar-alt"></i></span>
            <span class="navList__subheading-title">appointments</span>
          </div>
          
        </li>
 
        <li>
          
          <div class="navList__subheading row row--align-v-center">
            <span class="navList__subheading-icon"><i class="fas fa-plane"></i></span>
            <span class="navList__subheading-title">therapist</span>
          </div>
          
        </li>
        <li class="navList__heading">nutrition <i class="far fa-image"></i></li>
        <li>
          
          
        <li>
          <div class="navList__subheading row row--align-v-center">
            <span class="navList__subheading-icon"><i class="fas fa-wine-glass-alt"></i></span>
            <span class="navList__subheading-title">nutrition</span>
          </div>
          <ul class="subList subList--hidden">
            
            
          </ul>
        </li>
        <li>
          <li class="navList__heading">subscription and payments <i class="far fa-image"></i></li>
        <li>
          
          
        <li>
          <div class="navList__subheading row row--align-v-center">
            <span class="navList__subheading-icon"><i class="fas fa-wine-glass-alt"></i></span>
            <span class="navList__subheading-title">subscription and paymentss</span>
          </div>
          <ul class="subList subList--hidden">
            <ul class="subList">
              <li class="subList__item"><a href="privilege.php">Privilege</a></li>
              <li class="subList__item">Type</li>
              <li class="subList__item"><a href="https://www.google.com/search?q=google+traduction&oq=&aqs=chrome.1.69i59l2j69i57j69i65j69i60l2j69i65l2.1901j0j7&sourceid=chrome&ie=UTF-8">Purchases</a></li>

            </ul> 
            
            
          </ul>
        </li>
        <li>
        <li class="navList__heading">Events<i class="fas fa-calendar-alt"></i></li>
        <li>
          
           
            
         
          
        </li>
        
        
        <li>
              <div class="navList__subheading row row--align-v-center">
                <span class="navList__subheading-icon"><i class="fas fa-users"></i></span>
                <span class="navList__subheading-title">events</span>
              </div>
              <ul class="subList subList--hidden">
               
                
               
                
              </ul>
            </li>
      </ul>
      
    </div>
    
  </aside>

  <main class="main">
    <div class="main-header">
      <div class="main-header__intro-wrapper">
        <div class="main-header__welcome">
          <div class="main-header__welcome-title text-light">Welcome, <strong>Ines</strong></div>
          <div class="main-header__welcome-subtitle text-light">How are you today?</div>
        </div>
        <div class="quickview">
          <div class="quickview__item">
            <div class="quickview__item-total">41</div>
            <div class="quickview__item-description">
              <i class="far fa-calendar-alt"></i>
              <span class="text-light">Events</span>
            </div>
          </div>
          <div class="quickview__item">
            <div class="quickview__item-total">64</div>
            <div class="quickview__item-description">
              <i class="far fa-comment"></i>
              <span class="text-light">Messages</span>
            </div>
          </div>
          <div class="quickview__item">
            <div class="quickview__item-total">27&deg;</div>
            <div class="quickview__item-description">
              <i class="fas fa-map-marker-alt"></i>
              <span class="text-light">Tunis</span>
            </div>
          </div>
        </div>
      </div>
    </div>
    
     <!-- /.main__overview -->
    <div class="main__cards">
      <div class="card">
        <div class="card__header">
          <div class="card__header-title text-light">Privilege <strong>Managment</strong>
          </div>
          <div class="settings">
            <div class="settings__block"><i class="fas fa-edit"></i></div>
            <div class="settings__block"><i class="fas fa-cog"></i></div>
          </div>
        </div>
        <div >
      



          <form  action="ajout.php" method="POST"  name="form" style="padding: 23px; margin-bottom: 222;">
            <h4 class="u-align-center u-form-group u-form-text u-text u-text-1"> Add Privilege <span style="text-decoration: underline !important;"></span>
            </h4>
            <div class="u-form-group u-form-name">
              <label for="name-4c18" class="u-label">Id</label> 

              <input class="form-container" type="number"  name="id" placeholder="Id" id="id"  >   <span class="error" id="errorid"></span>
           

            </div>
            <div class="u-form-group u-form-name">
              <label for="name-4c18" class="u-label">Type
              <input type="text"  name="type" placeholder="Type" id="Type"  class="u-border-2 u-border-grey-10 u-grey-10 u-input u-input-rectangle u-radius-10" >
              <span class="error"> </span>  </label>   </div>
            <div class="u-form-email u-form-group">
              <label for="email-4c18" class="u-label">File</label>
              <input type="text" name="file" placeholder="file" id="email-4c18"  class="u-border-2 u-border-grey-10 u-grey-10 u-input u-input-rectangle u-radius-10" >
              <span class="error"> </span>
            </div>
            <div class="u-form-group u-form-group-4">
              <label for="text-8936" class="u-label">Description </label>
              <input name="description" type="text" placeholder="Description" id="text-8936"  class="u-border-2 u-border-grey-10 u-grey-10 u-input u-input-rectangle u-radius-10">
              <span class="error" > </span></div>
            
            <div>
              <br> 
              <a href="view.php" class="card__header-link text-bold" >View All</a>

              <input type="submit" ></input>

</div>
            </div>
                   
        
          </form>
        </div>
          <div class="card__row">
            <div class="card">
              
            
            <div >
              
            
    </script><!-- /.main-cards -->
  </main>

  <footer class="footer">
    <p><span class="footer__copyright">&copy;</span> Altair</p>
    <p>Crafted with <i class="fas fa-heart footer__icon"></i> by <a href="https://www.linkedin.com/in/matt-holland/" target="_blank" class="footer__signature">Altair</a></p>
  </footer>
</div>
<!-- partial -->
<script src="ctrl.js"></script>

  <script src='https://code.jquery.com/jquery-3.3.1.min.js'></script>
<script src='https://www.amcharts.com/lib/3/amcharts.js'></script>
<script src='https://www.amcharts.com/lib/3/serial.js'></script>
<script src='https://www.amcharts.com/lib/3/themes/light.js'></script><script  src="./script.js"></script>

</body>
</html>
