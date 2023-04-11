<?php
include "../../Controller/ReponseC.php";

$prod = new reponseC();

if (isset($_POST['idR'])) {
    $prod->supprimerReponse($_POST['idR']);
    header('Location:reponseListe.php');
} else {
    echo 'Erreur : try again';
    echo $_POST['idR'];

}
?>