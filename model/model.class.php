<?php
	class Modele 
	{
		private $unPdo , $uneTable; 

		public function __construct ($serveur, $bdd, $user, $mdp)
		{
			$this->unPdo=null; 
			try
			{
				$this->unPdo =new PDO ("mysql:host=".$serveur.";dbname=".$bdd, $user, $mdp);
			}
			catch (PDOException $exp)
			{
				echo "Erreur de connexion : " . $exp->getMessage(); 
			}
		}
		
		public function setTable ($uneTable)
		{
			$this->uneTable = $uneTable; 
		}
		public function getTable ()
		{
			return $this->uneTable; 
		}

		public function selectAll ()
		{
			$requete ="select * from " . $this->uneTable . ";"; 
			$select = $this->unPdo->prepare ($requete);
			$select->execute (); 
			return $select->fetchAll (); 
		}
		
		public function insert ($tab)
		{
			$champs = array(); 
			$donnees = array(); 
			foreach ($tab as $cle => $valeur) {
				 $champs[] = ":".$cle;
				 $donnees[":".$cle] = $valeur; 
			}
			$chaineChamps = implode(",", $champs); 

			$requete ="insert into ". $this->uneTable ." values (null,".$chaineChamps.");" ;
			 
			$select = $this->unPdo->prepare ($requete);
			$select->execute ($donnees);
		}
		public function insertProc ($procedure, $tab)
		{
			$champs = array(); 
			$donnees = array(); 
			foreach ($tab as $cle => $valeur) {
				 $champs[] = ":".$cle;
				 $donnees[":".$cle] = $valeur; 
			}
			$chaineChamps = implode(",", $champs); 

			$requete ="call ".$procedure." (".$chaineChamps.");";
			 
			$select = $this->unPdo->prepare ($requete);
			$select->execute ($donnees);
		}
		public function creerCompte ($tab)
		{
			$champs = array(); 
			$donnees = array(); 
			foreach ($tab as $cle => $valeur) {
				 $champs[] = ":".$cle;
				 $donnees[":".$cle] = $valeur; 
			}
			$chaineChamps = implode(",", $champs); 

			$requete ="insert into ". $this->uneTable ." values (null,".$chaineChamps.",'user');" ;
			 
			$select = $this->unPdo->prepare ($requete);
			$select->execute ($donnees);
		}

		public function updateContenir($idproduit, $idpanier)
		{
			$requete = "call updateContenir (".$idproduit.",".$idpanier.");";
			$select = $this->unPdo->prepare ($requete);
			$select->execute ();
		}

		public function delete ($where)
		{
			$champs = array(); 
			$donnees = array(); 
			foreach ($where as $cle => $valeur) {
				$champs[] = $cle ." = :".$cle;
				$donnees [":".$cle] = $valeur;  
			}
			$chaineWhere = implode (" and ", $champs); 

			$requete = "delete from  ".$this->uneTable."  where ".$chaineWhere;
			$delete = $this->unPdo->prepare ($requete);
			$delete->execute ($donnees);
		}
		public function deleteProc ($procedure, $where)
		{
			$champs = array(); 
			$donnees = array(); 
			foreach ($where as $cle => $valeur) {
				// $champs[] = $cle ." = :".$cle;
				$champs[] = ":".$cle;
				$donnees [":".$cle] = $valeur;  
			}
			$chaineChamps = implode (",", $champs); 

			$requete ="call ".$procedure." (".$chaineChamps.");";
			$delete = $this->unPdo->prepare ($requete);
			$delete->execute ($donnees);
		}
		public function selectWhere ($where)
		{
			$champs = array(); 
			$donnees = array(); 
			foreach ($where as $cle => $valeur) {
				$champs[] = $cle ." = :".$cle;
				$donnees [":".$cle] = $valeur;  
			}
			$chaineWhere = implode (" and ", $champs); 

			$requete = "select * from  ".$this->uneTable."  where ".$chaineWhere;
			 
			$select = $this->unPdo->prepare ($requete);
			$select->execute ($donnees);
			return $select->fetch (); 
		}

		public function update ($tab, $where)
		{
			$champs = array(); 
			$donnees = array(); 
			foreach ($where as $cle => $valeur) {
				$champs[] = $cle ." = :".$cle;
				$donnees [":".$cle] = $valeur;  
			}
			$chaineWhere = implode (" and ", $champs); 

			$champs2 =array();
			foreach ($tab as $cle => $valeur) {
				$champs2[] = $cle ." = :".$cle;
				$donnees [":".$cle] = $valeur;
			}
			$chaineChamps=implode(", ", $champs2);

			$requete = "update  ".$this->uneTable." set ".$chaineChamps." where ".$chaineWhere;
			 
			$update = $this->unPdo->prepare ($requete);
			$update->execute ($donnees);
		}

		public function updateProc ($procedure, $where, $tab)
		{
			$champs = array();
			$donnees = array();
			foreach ($where as $cle => $valeur) {
				$champs[] = ":".$cle;
				$donnees [":".$cle] = $valeur;  
			}
			$chaineWhere=implode(", ", $champs);
			$champs2 =array();
			foreach ($tab as $cle => $valeur) {
				$champs2[] = ":".$cle;
				$donnees [":".$cle] = $valeur;
			}
			$chaineChamps=implode(", ", $champs2);

			$requete = "call ".$procedure."(".$chaineWhere.", ".$chaineChamps.");";
			// echo $requete;
			// echo "<br/>".$chaineChamps;
			// echo "<br/>".$chaineWhere;
			 
			$update = $this->unPdo->prepare ($requete);
			$update->execute ($donnees);
		}

		public function selectSearch($tab, $mot)
		{
			$champs = array(); 
			$donnees = array(":mot"=>"%".$mot."%"); 
			foreach ($tab as $cle) {
				$champs [] = $cle ." like :mot";
			}
			$chaineWhere = implode("  or  " , $champs); 
			$requete = "select * from ".$this->uneTable."  where ".$chaineWhere; 
			$select = $this->unPdo->prepare ($requete);
			$select->execute ($donnees);
			return $select->fetchAll(); 
		}
		public function sumPanier($where)
		{
			$champs = array(); 
			$donnees = array(); 
			foreach ($where as $cle => $valeur) {
				$champs[] = $cle ." = :".$cle;
				$donnees [":".$cle] = $valeur;  
			}
			$chaineWhere = implode (" and ", $champs); 

			$requete = "select sum(idpanier)  ".$this->uneTable."  where ".$chaineWhere;
			 
			$select = $this->unPdo->prepare ($requete);
			$select->execute ($donnees);
			return $select->fetch ();
		}
	}
?>