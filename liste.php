<?php
include '../Controller/PrivilegeC.php';

$pc = new PrivilegeC();

$liste = $pc->listePrivilege();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
<h1>liste personne </h1>

    <table >
        <ul > 
        <li> Id </li>
        <li> Nom </li>
        <li> Prenom </li>
        <li> Adress </li>
        <li> Date of Birth </li> </ul>

        
        <?php
        foreach ($liste as $p) {
        ?>
            <ul>  <li>
            <?= $p['id']; ?>  </li>
            <li>  <?= $p['Type']; ?> </li>
            <li><?php echo ($p['file']); ?></li>
            <li> <?= $p['description']; ?> </li>
    <a href="supp.php?pk=<?= $p['id'];?>" >Delete  </a>
    <form action="update.php" >
        <input type="hidden"  name ="id" value="<?=$p['id'];?>">
        <input type="submit" value="update">
        </form>
        </ul>
        <?php } ?>
    </ul>


</body>

</html>