<?PHP
	include "C:/Users/MSI/Desktop/xamp/htdocs/Projet_Amal/Projet_Amal/config.php";
	require_once 'C:/Users/MSI/Desktop/xamp/htdocs/Projet_Amal/Projet_Amal/Model/Reponse.php';

	class ReponseC {
		
		function ajouterReponse($Reponse){
			$sql="INSERT INTO Reponse (dateR,commentaire) 
			VALUES (:dateR,:commentaire)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
			
				$query->execute([

					'dateR' => $Reponse->getdateR(),
					'commentaire' => $Reponse->getcommentaire()
					 
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		
		function afficherReponse(){
			
			$sql="SELECT * FROM Reponse";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}	
		}

		function supprimerReponse($idR){
			$sql="DELETE FROM Reponse WHERE idR= :idR";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':idR',$idR);
			try{
				$req->execute();
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		function modifierReponse($Reponse, $idR){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE Reponse SET 
						dateR = :dateR,
						commentaire = :commentaire
					WHERE idR = :idR');

				$query->execute([
					
					'dateR' => $Reponse->getDateR(),
					'commentaire' => $Reponse->getcommentaire(),			
					'idR' => $idR
				]);
				echo $query->rowCount()." records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}			


	/*	function modifierReponse($Reponse, $idR){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE reponse SET 
							dateR = :dateR,
						commentaire = :commentaire
					
						
					WHERE idR = :idR'
				);
				
				$query->bindValue(':dateR',$Reponse->getdateR());
				$query->bindValue(':commentaire',$Reponse->getcommentaire());
				$query->execute();
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}		*/


		function recupererReponse($idR){
			$sql="SELECT * from Reponse where idR=$idR";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$user=$query->fetch();
				return $user;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}

		function recupererReponse1($idR){
			$sql="SELECT * from Reponse where idR=$idR";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();
				
				$user = $query->fetch(PDO::FETCH_OBJ);
				return $user;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}


	/*	function trierReponse()
		{
			$sql = "SELECT * from Reponse ORDER BY TitreB DESC";
			$db = config::getConnexion();
			try {
				$req = $db->query($sql);
				return $req;
			} 
			catch (Exception $e)
			 {
				die('Erreur: ' . $e->getMessage());
			}
		}

		function affichage_par_id($idB){
			$sql="SELECT DescriptionB FROM Reponse WHERE idB= :idB";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':idB',$idB);
			try{
				$req->execute();
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}           */


		
	}

?>