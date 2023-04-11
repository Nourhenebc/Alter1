<?php
    include'../config.php';
    class CategorieC {
        function afficherCategories(){
            $sql="SELECT * FROM categorie";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
        }
		
        function supprimerCategories($id_cat){
			$sql="DELETE FROM categorie WHERE id_cat=:id_cat";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':id_cat', $id_cat);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
		}
        function ajouterCategories($categorie){
			$sql="INSERT INTO categorie (libelle,description,imagecat) 
			VALUES (:libelle,:description,:imagecat)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
					'libelle' => $categorie->getLibelle(),
					'description' => $categorie->getdescription(),
					'imagecat' => $categorie->getimagecat(),
					
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
               
			}			
		}
		function recupererCategories($id_cat){
			$sql="SELECT * from categorie WHERE id_cat =$id_cat";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$categorie=$query->fetch();
				return $categorie;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		function modifierCategories($categorie, $id_cat){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					"UPDATE categorie SET 
						libelle= :libelle, 
						description= :description,
						imagecat= :imagecat 	
					WHERE id_cat= :id_cat"
				);
				$query->execute([
					'id_cat' =>intval($id_cat),
					'libelle' => $categorie->getLibelle(),
					'description' => $categorie->getdescription(),
					'imagecat' => $categorie->getimagecat()
					
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				die($e->getMessage());
			}
		} 

        public function listCategorie()
    {
        $sql = "SELECT * FROM categorie";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('listCategorie Error:' . $e->getMessage());
        }
    }

    function updateCategorie($Categorie, $id_cat)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE categorie SET 
                    libelle = :libelle,
                    description = :description,
					imagecat = :imagecat  
                WHERE id_cat= :id_cat'
            );
            $query->execute([
                'id_cat' => $id_cat,
                'libelle' => $Categorie->getLibelle(),
                'description' => $Categorie->getdescription(),
				'imagecat' => $Categorie->getimagecat()
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            echo 'updateCategorie Error: ' . $e->getMessage();
        }
    }


    function showCategorie($id)
    {
        $sql = "SELECT * from categorie where id_cat = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $Categorie = $query->fetch();
            return $Categorie;
        } catch (Exception $e) {
            die('showCategorie Error: ' . $e->getMessage());
        }
    }

    function deleteCategorie($id1)
    {
        $sql = "DELETE FROM categorie WHERE id_cat = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id1);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('deleteCategorie Error:' . $e->getMessage());
        }
    }
    }



?>