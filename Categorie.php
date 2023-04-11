<?php


class Categorie{

    private $id_cat=null;
    private $libelle=null;
    private $description=null;
    private $imagecat=null;




    function __construct($libelle ,$description,$imagecat)
    {
        
        $this->libelle=$libelle;
        $this->description=$description;
        $this->imagecat=$imagecat;
    }
    function getid_cat(){
        return $this->id_cat;
    }
    function getLibelle(){
        return $this->libelle;
    }
    function getdescription(){
        return $this->description;
    }
    
    function getimagecat(){
        return $this->imagecat;
    }


    
    function setLibelle(string $libelle){
        $this->libelle=$libelle;
    }
    function setdescription(string $description){
        $this->description=$description;
    }

    function setimagecat(string $imagecat){
        $this->imagecat=$imagecat;
    }
}


?>