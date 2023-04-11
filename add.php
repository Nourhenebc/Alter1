
<?php
   include '../controller/CategorieC.php';
   include '../model/Categorie.php';
	$pc=new CategorieC();
    $p=new Categorie($_POST["libelle"],$_POST["description"],$_POST["imagecat"]);
	$pc->ajouterCategories($p);
	header('Location:tabel_cat.php');
?>
