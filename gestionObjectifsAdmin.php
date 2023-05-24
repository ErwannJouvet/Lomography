<?php
/************************************************************************PELLICULES****************************************************************************************/
	/*************************************************Debut Supp et Modif liste*************************/
    if(isset($_SESSION['email']) and $_SESSION['droit']=="admin")
	{ 	 
		$unControleur->setTable("viewObjectif");
		$lObjectif = null; 
		if (isset($_GET['action']) && isset($_GET['idproduit']))
		{
			$action = $_GET['action']; 
			$idproduit = $_GET['idproduit'];
            
			switch ($action)
			{
				case 'sup' : 
					$where = array("idproduit"=>$idproduit); 
					$unControleur->deleteProc("deleteObjectif", $where);
					break;

				case 'edit' : 
					$where = array("idproduit"=>$idproduit); 
					$lObjectif = $unControleur->selectWhere($where); 
					break; 
			} 
		}
    }
	include"view/view_insert_gestionObjectifsAdmin.php";

	if(isset($_POST['Modifier']))
	{
		$unControleur->setTable("viewObjectif");
		$tab = array("img"=>"images/".$_POST['img'],
                    "nom"=>$_POST['nom'], 
                    "quantite"=>$_POST['quantite'], 
                    "prix"=>$_POST['prix'], 
                    "poids"=>$_POST['poids'], 
                    "diametreMaxAndLongueur"=>$_POST['diametreMaxAndLongueur'], 
                    "diametreFiltre"=>$_POST['diametreFiltre'], 
                    "moteurAutoFocus"=>$_POST['moteurAutoFocus'],
                    "agrandissement"=>$_POST['agrandissement']
                    );
		$where = array("idproduit"=>$_GET['idproduit']);
		$unControleur->updateProc("updateObjectif", $where, $tab );
		header("Location: index.php?pn=gestionObjectifsAdmin");
	}

		if(isset($_POST['Valider']))
		{
			$unControleur->setTable("viewObjectif");
            $tab = array("img"=>"images/".$_POST['img'],
            "nom"=>$_POST['nom'], 
            "quantite"=>$_POST['quantite'], 
            "prix"=>$_POST['prix'], 
            "poids"=>$_POST['poids'], 
            "diametreMaxAndLongueur"=>$_POST['diametreMaxAndLongueur'], 
            "diametreFiltre"=>$_POST['diametreFiltre'], 
            "moteurAutoFocus"=>$_POST['moteurAutoFocus'],
            "agrandissement"=>$_POST['agrandissement']
            );
			$unControleur->insertProc("insertObjectif",$tab); 
		}
	/*************************************************FIN Supp et Modif liste*************************/
	/**************************************************Rechercher****************************************/
	if (isset($_POST['Rechercher']))
	{
		$tab = array("idproduit","img", "nom", "quantite", "prix", "poids", "diametreMaxAndLongueur", "diametreFiltre", "moteurAutoFocus","agrandissement");
		$mot = $_POST['mot'];
		$lesObjectifs = $unControleur->selectSearch($tab, $mot);
	}
	else
	{
		$lesObjectifs = $unControleur->selectAll();
	}
	/*************************************************Fin rechercher************************************/
	include"view/view_liste_gestionObjectifsAdmin.php";
?>