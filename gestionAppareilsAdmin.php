<?php
/************************************************************************APPAREILS*****************************************************************************************/
	/*************************************************Debut Supp et Modif liste*************************/
    if(isset($_SESSION['email']) and $_SESSION['droit']=="admin")
	{ 	 
		$unControleur->setTable("viewAppareil");
		$lAppareil = null; 
		if (isset($_GET['action']) && isset($_GET['idproduit']))
		{
			$action = $_GET['action']; 
			$idproduit = $_GET['idproduit'];
            
			switch ($action)
			{
				case 'sup' : 
					$where = array("idproduit"=>$idproduit); 
					$unControleur->deleteProc("deleteAppareil", $where);
					break;

				case 'edit' : 
					$where = array("idproduit"=>$idproduit); 
					$lAppareil = $unControleur->selectWhere($where); 
					break; 
			} 
		}
    }
	include"view/view_insert_gestionAppareilsAdmin.php";

	if(isset($_POST['Modifier']))
	{
		$unControleur->setTable("viewAppareil");
		$tab = array("img"=>"images/".$_POST['img'],
					"nom"=>$_POST['nom'], 
					"quantite"=>$_POST['quantite'], 
					"prix"=>$_POST['prix'], 
					"formatPellicule"=>$_POST['formatPellicule'], 
					"nbPoses"=>$_POST['nbPoses'], 
					"focale"=>$_POST['focale'], 
					"alimentation"=>$_POST['alimentation'], 
					"dimension"=>$_POST['dimension']
					);
		$where = array("idproduit"=>$_GET['idproduit']);
		$unControleur->updateProc("updateAppareil", $where, $tab );
		header("Location: index.php?pn=gestionAppareilsAdmin");
	}

		if(isset($_POST['Valider']))
		{
			$unControleur->setTable("viewAppareil");
			$tab = array("img"=>"images/".$_POST['img'],
                        "nom"=>$_POST['nom'], 
						"quantite"=>$_POST['quantite'], 
						"prix"=>$_POST['prix'], 
						"formatPellicule"=>$_POST['formatPellicule'], 
						"nbPoses"=>$_POST['nbPoses'], 
						"focale"=>$_POST['focale'], 
						"alimentation"=>$_POST['alimentation'], 
						"dimension"=>$_POST['dimension']
						);
			$unControleur->insertProc("insertAppareil",$tab); 
		}
	/*************************************************FIN Supp et Modif liste*************************/
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
	/*************************************************Fin rechercher************************************/
	include"view/view_liste_gestionAppareilsAdmin.php";
?>