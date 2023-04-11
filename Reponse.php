<?PHP
	class Reponse{
		private  $idR  = null;
		private  $dateR = null;
		private  $commentaire = null;

		function __construct($dateR, $commentaire){
			

			$this->dateR=$dateR;
			$this->commentaire=$commentaire;
			
		}
		
		function getidR(){
			return $this->idR;
		}
		function getdateR(){
			return $this->dateR;
		}
		function getcommentaire() {
			return $this->commentaire;
		}


		function setidR($idR){
			$this->idR=$idR;
		}
		function setdateR($dateR){
			$this->dateR=$dateR;
		}
		function setcommentaire($commentaire){
			$this->commentaire=$commentaire;
		}

		
	}
?>