<?php
include'../controller/PrivilegeC.php';
include'../model/Privilege.php';
$pc=new PrivilegeC();
$pc->deletePrivilege($_GET['pk']);
header('Location:view.php');
?>