<?php
	require_once ("model/model.class.php"); 
	class Controleur 
	{
		private $unModele ; 

		public function  __construct ($serveur, $bdd, $user, $mdp)
		{
			$this->unModele =new Modele ($serveur, $bdd, $user, $mdp);
		}

		public function setTable ($uneTable)
		{
			$this->unModele->setTable($uneTable); 
		}
		public function getTable ()
		{
			return $this->unModele->getTable (); 
		}

		public function selectAll (){
			return $this->unModele->selectAll ();
		}
		public function insert ($tab)
		{
			//on controle ici les donnees du formulaire
			$this->unModele->insert($tab);
		}
		public function creerCompte ($tab)
		{
			$this->unModele->creerCompte($tab);
		}
		public function insertProc ($procedure, $tab)
		{
			$this->unModele->insertProc ($procedure, $tab);
		}
		public function delete ($where)
		{
			$this->unModele->delete ($where); 
		}
		public function deleteProc ($procedure, $where)
		{
			$this->unModele->deleteProc($procedure, $where);
		}
		public function selectWhere ($where)
		{
			return $this->unModele->selectWhere ($where); 
		}
		public function update ($tab, $where)
		{
			 $this->unModele->update ($tab, $where); 
		}
		public function updateProc ($procedure, $where, $tab)
		{
			 $this->unModele->updateProc ($procedure, $where, $tab); 
		}
		public function updateContenir($idproduit, $idpanier)
		{
			return $this->unModele->updateContenir($idproduit, $idpanier);
			
		}
		public function selectSearch($tab, $mot)
		{
			return $this->unModele->selectSearch($tab, $mot); 
		}
	}
?>