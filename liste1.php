<?php
include '../Controller/PrivilegeC.php';

$pc = new PrivilegeC();

$liste = $pc->listePrivilege();
?>


<script> console.log()</script>


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
              <li class="subList__item">Privilege</li>
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
 
   
          
          
          <div class="card__row">
            <div class="card">
              <div >
                <form action="https://forms.nicepagesrv.com/v2/form/process" class="u-clearfix u-form-horizontal u-form-spacing-10 u-inner-form" source="email" name="form" style="padding: 32px;">
                  <div class="u-form-email u-form-group u-label-none">
                    <label for="email-6796" class="u-label">Email</label>
                    <input type="email" placeholder="Search by Id" id="email-6796" name="email" class="u-grey-5 u-input u-input-rectangle u-radius-20" required="">
                  </div>
                  <div class="u-align-left u-form-group u-form-submit u-label-none">
                    <a href="#" class="u-border-none u-btn u-btn-round u-btn-submit u-button-style u-palette-2-base u-radius-20 u-btn-1">Search</a>
                    <input type="submit" value="submit" class="u-form-control-hidden">
                  </div>
                  
                <input type="hidden" name="npspec-referer" value="file:///C:/Users/Nourhene/Desktop/website%20project/back/dist/Contact.html"></form>
          </div>
            
            <div >
              
              
              
              <div class="u-table u-table-responsive u-table-1">
                <section id="ok">
                <table class="u-table-entity u-table-entity-1">
                  <colgroup>
                    <col width="19.7%">
                    <col width="20.2%">
                    <col width="18.3%">
                    <col width="19.8%">
                    <col width="22.000000000000004%">
                  </colgroup>
                  
                  <thead class="u-align-center u-grey-10 u-table-header u-table-header-1">
                    <tr style="height: 86px;">
                      <th class="u-border-2 u-border-palette-1-light-1 u-palette-2-light-1 u-table-cell u-table-cell-1">&nbsp;Id</th>
                      <th class="u-border-2 u-border-palette-1-light-1 u-palette-2-base u-table-cell u-table-cell-2">Type</th>
                      <th class="u-border-2 u-border-palette-1-light-1 u-palette-2-base u-table-cell u-table-cell-3">file</th>
                      <th  class="u-border-2 u-border-palette-1-light-1 u-palette-1-base u-table-cell u-table-cell-4">Description</th>
                      <th  class="u-border-2 u-border-palette-1-light-1 u-palette-1-base u-table-cell u-table-cell-4">Update</th>

                                      </tr>
                  </thead>
                  <tbody class="u-align-center u-grey-90 u-table-alt-grey-80 u-table-body u-table-body-1">
                  <?php
           foreach ($liste as $p) {
                  ?>
                    <tr style="height: 77px;">
                    
                      <td class="u-border-2 u-border-grey-75 u-table-cell u-table-cell-6"> <?= $p['id']; ?> </td>
                      <td class="u-border-2 u-border-grey-75 u-table-cell u-table-cell-7"><?= $p['Type']; ?>  </td>
                      <td class="u-border-2 u-border-grey-75 u-table-cell u-table-cell-8"><?php echo ($p['file']); ?></td>                     
                      <td class="u-border-2 u-border-grey-75 u-table-cell u-table-cell-8"><?php echo ($p['description']); ?></td>                     
                      <td action="update.php"class="u-border-2 u-border-grey-75 u-table-cell u-table-cell-10"> <a href="update.php?pk=<?= $p['id'];?>" class="u-border-none u-btn u-btn-round u-btn-submit u-button-style u-palette-2-base u-radius-20 u-btn-1">Update</a></td>

                    </tr>
                    <?php } ?>
              
                  </tbody>
                </table>
                </section>
              </div>
              
            </div>
            <div class="settings">
              
            </div>
          </div>
        
          
    </div> <!-- /.main-cards -->
  </main>

  <footer class="footer">
    <p><span class="footer__copyright">&copy;</span> Altair</p>
    <p>Crafted with <i class="fas fa-heart footer__icon"></i> by <a href="https://www.linkedin.com/in/matt-holland/" target="_blank" class="footer__signature">Altair</a></p>
  </footer>
</div>
<!-- partial -->
  <script src='https://code.jquery.com/jquery-3.3.1.min.js'></script>
<script src='https://www.amcharts.com/lib/3/amcharts.js'></script>
<script src='https://www.amcharts.com/lib/3/serial.js'></script>
<script src='https://www.amcharts.com/lib/3/themes/light.js'></script><script  src="./script.js"></script>

</body>
</html>
