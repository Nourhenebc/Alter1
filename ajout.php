<?php
include'../Controller/PrivilegeC.php';
include'../Model/Privilege.php';
$pc=new PrivilegeC();
$p=new privilege($_POST['id'],$_POST['type'], $_POST['file'], $_POST['description']);
$pc->addPrivilege($p);
header('Location:view.php');
?>
