<?php
	include('conn.php');
	$id=$_GET['id'];
    $description=$_POST['description'];
	$Type=$_POST['Type'];
	$file=$_POST['file'];
 
	mysqli_query($conn,"update `privilege` set file='$file', Type='$Type',description='$description' where id='$id'");
	header('location:view.php');
?>