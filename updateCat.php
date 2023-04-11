<?php

include '../controller/CategorieC.php';
include '../model/Categorie.php';

$error = "";

// create client
$categorie = null;

// create an instance of the controller
$CategorieC = new CategorieC();
if (
   // isset($_POST["id_cat"]) &&
    isset($_POST["libelle"])&&
    isset($_POST["description"])&&
    isset($_POST["imagecat"])

) {
    if (
        !empty($_POST["id_cat"]) &&
        !empty($_POST['libelle']) &&
        !empty($_POST['imagecat']) 
    ) {
        $categorie = new Categorie(
           // $_POST['id_cat'],
            $_POST['libelle'],
            $_POST['description'],
            $_POST['imagecat'],
        );
        $CategorieC->modifierCategories($categorie, $_POST["id_cat"]);
        header('Location:tabel_cat.php');
    } 
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title></title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">

</head>

<body >

   <!-- Page Wrapper -->
  

        

        
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
          
            

           

           

                   
                   
                            
                       

                        
                            
 

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading 
    <h1 class="h3 mb-2 text-gray-800">Update categorie</h1>-->

    <!-- DataTales Example -->
               <div class="card">
                 <div class="card-body">
                 <!--<button class="btn btn-light" href="event.html"><-</button>-->
                   <!--<h4 class="card-title">Ajouter Categorie</h4>-->
                   <p class="card-description"></p>
    <div class="card shadow mb-4">
        <div class="card-header py-3">

<div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['id_cat'])) {
        $Categorie = $CategorieC->showCategorie($_POST['id_cat']);

    ?>

        <form action="" method="POST">
        <div class="form-group">
            
                
                    
                        <label for="id_cat">Id categorie:
                        </label>
                    
                    <input type="number" name="id_cat" class="form-control" id="id_cat" value="<?php echo $Categorie['id_cat']; ?>" >
                
                    
                        <label for="libelle">intitule categorie:
                        </label>
                    
                    <input type="text" name="libelle" class="form-control" id="libelle" value="<?php echo $Categorie['libelle']; ?>" maxlength="100" pattern="[A-Za-z\s]+">
                
                    
                        <label for="description">description:
                        </label>
                    
                    <input type="text" name="description"class="form-control" id="description" value="<?php echo $Categorie['description']; ?>" maxlength="255" >
                

                
                    
                        <label for="imagecat">imagecat:
                        </label>
                    
                  <input type="text" name="imagecat" class="form-control" id="imagecat" value="<?php echo $Categorie['imagecat']; ?>" maxlength="100" >
            
                    
                    
                    
                
                
                  <button class="btn btn-light" href="" type="submit"  class="btn btn-success btn-icon-split" onclick=""> Update </button>
                     <button class="btn btn-light" href="tabel_cat.php"  class="btn btn-success btn-icon-split">Cancel</button>
                   
                
           
        </form>
    <?php
    }
    ?>

        </div>
        <div class="card-body">

        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>


    

</body>

</body>

</html>