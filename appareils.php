<?php
	$unControleur->setTable("viewAppareil");
	/**************************************************Rechercher****************************************/
	if (isset($_POST['Rechercher']))
	{
		$tab = array("idproduit","img", "nom", "quantite", "prix", "formatPellicule", "nbPoses", "focale", "alimentation", "dimension"); 
		$mot = $_POST['mot']; 
		$lesAppareils = $unControleur->selectSearch($tab, $mot); 
	}
	else
	{
		$lesAppareils = $unControleur->selectAll();
	}
	/**************************************************Fin Rechercher****************************************/
	/**************************************************Ajouter au panier****************************************/
	if (isset($_POST['Ajouter']))
	{
		$idproduit = $_POST['idproduit'];
		if (isset($_SESSION['idpanier']))
		{
			//appeler une mise à jour de la quantite dans contenir ou creer une quantite dans contenir si le produit est commandé pour la premiere fois. 
			$unControleur->updateContenir($idproduit, $_SESSION['idpanier']);
		}
		else
		{ 
		$tab = array("idproduit"=>$idproduit);
		$unControleur->insertProc("insertPanier", $tab); 
		//recuperer l'id du panier et le mettre dans la session 
		}
	}
	/**************************************************Fin Ajouter au panier****************************************/
	require_once ("view/view_liste_appareils.php");
?>