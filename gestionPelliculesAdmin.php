<?php
/************************************************************************PELLICULES****************************************************************************************/
	/*************************************************Debut Supp et Modif liste*************************/
    if(isset($_SESSION['email']) and $_SESSION['droit']=="admin")
	{ 	 
		$unControleur->setTable("viewPellicule");
		$laPellicule = null; 
		if (isset($_GET['action']) && isset($_GET['idproduit']))
		{
			$action = $_GET['action']; 
			$idproduit = $_GET['idproduit'];
            
			switch ($action)
			{
				case 'sup' : 
					$where = array("idproduit"=>$idproduit); 
					$unControleur->deleteProc("deletePellicule", $where);
					break;

				case 'edit' : 
					$where = array("idproduit"=>$idproduit); 
					$laPellicule = $unControleur->selectWhere($where); 
					break; 
			} 
		}
    }
	include"view/view_insert_gestionPelliculesAdmin.php";

	if(isset($_POST['Modifier']))
	{
		$unControleur->setTable("viewPellicule");
		$tab = array("img"=>"images/".$_POST['img'],
                    "nom"=>$_POST['nom'], 
                    "quantite"=>$_POST['quantite'], 
                    "prix"=>$_POST['prix'], 
                    "typeFilm"=>$_POST['typeFilm'], 
                    "developpement"=>$_POST['developpement'], 
                    "sensibilite"=>$_POST['sensibilite'], 
                    "format"=>$_POST['format']
                    );
		$where = array("idproduit"=>$_GET['idproduit']);
		$unControleur->updateProc("updatePellicule", $where, $tab );
		header("Location: index.php?pn=gestionPelliculesAdmin");
	}

		if(isset($_POST['Valider']))
		{
			$unControleur->setTable("viewPellicule");
			$tab = array("img"=>"images/".$_POST['img'],
                        "nom"=>$_POST['nom'], 
                        "quantite"=>$_POST['quantite'], 
                        "prix"=>$_POST['prix'], 
                        "typeFilm"=>$_POST['typeFilm'], 
                        "developpement"=>$_POST['developpement'], 
                        "sensibilite"=>$_POST['sensibilite'], 
                        "format"=>$_POST['format']
                        );
			$unControleur->insertProc("insertPellicule",$tab); 
		}
	/*************************************************FIN Supp et Modif liste*************************/
	/**************************************************Rechercher****************************************/
	if (isset($_POST['Rechercher']))
	{
		$tab = array("idproduit","img", "nom", "quantite", "prix", "typeFilm", "developpement", "sensibilite", "format");
		$mot = $_POST['mot'];
		$lesPellicules = $unControleur->selectSearch($tab, $mot);
	}
	else
	{
		$lesPellicules = $unControleur->selectAll();
	}
	/*************************************************Fin rechercher************************************/
	include"view/view_liste_gestionPelliculesAdmin.php";
?>