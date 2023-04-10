<?php
include'../config.php';

class PrivilegeC {
    public function getPrivilege($id)
    {

        $db=config::getConnexion();
        try{
            $req =$db->prepare('SELECT * FROM privilege WHERE id=:id');
            $req->execute(['id' => $id]);
           // r
            $p=$req->fetch();
            //var_dump($p);
            return $p;

        } catch(Exception $e) { 
            die('Error: ' .$e->getMessage());

        }

    }

    public function listePrivilege()
    {

        $db=config::getConnexion();
        try{
            $liste =$db->query('SELECT * FROM privilege');
            return $liste;

        } catch(Exception $e) { 
            die('Error: ' .$e->getMessage());

        }

    }



public function addPrivilege($privilege)
{
    $db=config::getConnexion();
    try{
        $req = $db->prepare('
        INSERT INTO privilege VALUES (:id, :n, :p, :a)
        ');
        $req->execute([
            'id'=>$privilege->getId(),
            'n'=> $privilege->getType(),
            'p'=> $privilege->getFile(),
            'a' =>$privilege->getDescription(),
        ]);
    } catch (Exception $e) {
        die('Error: ' . $e->getMessage());
    }
}

public function deletePrivilege($id)
{
    $db = config::getConnexion();

    try {
         // Get the ID of the person object
        $req = $db->prepare('DELETE FROM privilege WHERE id = ?'); // Use a parameterized query to avoid SQL injection
        $req->execute([$id]); // Bind the ID as a parameter and execute the query
        //echo "Person deleted successfully";
    } catch (Exception $e) {
        die('Error: ' . $e->getMessage());
    }
}
public function updatePrivilege($id,$privilege)
{
    $db = config::getConnexion();
    try {

        $req = $db->prepare('
        UPDATE `privilege` SET `file`=:n,`Type`=:p,`description`=:a WHERE id = :id
        ');
        $req->execute([
            'id' =>$privilege->getId(),
            'n' => $privilege->getType(),
            'p' => $privilege->getFile(),
            'a' => $privilege->getDescription() ,
        ]);
    } catch (Exception $e) {
        die('Error: ' . $e->getMessage());
    }
}


public function searchPrivilege($id)
{
    $db = config::getConnexion();
    try {
        $req = $db->prepare('SELECT * FROM privilege WHERE id=?');
        $req->execute([$id]);
        $liste = $req->fetchAll();
        return $liste;
    } catch(Exception $e) { 
        die('Error: ' . $e->getMessage());
    }
}










}