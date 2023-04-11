<?php
   include '../controller/CategorieC.php';
	$CategorieC=new CategorieC();
	$CategorieC->deleteCategorie($_GET["id_cat"]);
	header('Location:tabel_cat.php');
?>