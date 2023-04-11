<?php
include '../controller/CategorieC.php';

$categorieC = new CategorieC();

$list = $categorieC->listCategorie();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Event - Tables</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

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
    
     
            
     <!-- DataTales Example -->
     <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="ajout_categorie.php" class="btn btn-success btn-icon-split">
                                <span class="text">Ajout categorie</span>
            </a>            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Id categorie</th>
                                <th>label categorie</th>
                                <th>description</th>
                                <th>image</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        
                      <tbody>
                       <?php
                       foreach ($list as $Categorie) {
                        ?>
                        <tr>
                            <td><?= $Categorie['id_cat']; ?></td>
                            <td><?= $Categorie['libelle']; ?></td>
                            <td><?= $Categorie['description']; ?></td>
                            <td> 
                 <img class="flex-shrink-0 img-fluid rounded" src="image/<?= $Categorie['imagecat'] ?>" alt="img"
                                                style="width: 80px;">
                                            
                                            </td>
                            <td align="center">

                                <form method="POST" action="updateCat.php">
                                    <input type="submit" name="update" value="Update" class="btn btn-success btn-icon-split" >

                                    <input type="hidden" value=<?PHP echo $Categorie['id_cat']; ?> name="id_cat" class="btn btn-success btn-icon-split">
                                </form>
                            </td>
                            <td align="center">
                               <a href="../view/supprimer_categorie.php?id_cat=<?php echo $Categorie['id_cat']; ?>" class="button-7">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                        
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
</div>
            
</div>
<!-- /.container-fluid -->


<!-- End of Main Content -->       

   


</body>
<!-- Footer -->
<footer class="footer">
    <p><span class="footer__copyright">&copy;</span> Altair</p>
    <p>Crafted with <i class="fas fa-heart footer__icon"></i> by <a href="https://www.linkedin.com/in/matt-holland/" target="_blank" class="footer__signature">Altair</a></p>
  </footer>
  <!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/datatables-demo.js"></script>

</html>