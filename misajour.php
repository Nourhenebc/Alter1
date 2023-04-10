<?php
include'../controller/PrivilegeC.php';
include'../Model/Privilege.php';
$pc=new PrivilegeC();

if(isset($_GET['id'])&& isset($_GET['type'])&& isset($_GET['file'])&& isset($_GET['description']))
{if (!empty($_POST['id'])&&!empty($_POST['type'])&&!empty($_POST['file'])&&!empty($_POST['descrption']))
{   
    $privilege=new privilege($_POST['id'],$_POST['type'], $_POST['file'], $_POST['description']);
    $pc=client->updatePrivilege($_POST['id'],$privilege);
    header('Location:liste1.php');

}}
?>