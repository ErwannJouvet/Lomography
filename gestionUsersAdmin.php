<h2 class="contentProduit"> Gestion des utilisateurs </h2>

<?php
    $unControleur->setTable("user"); 
    if (isset($_POST['Rechercher']))
    {
        $tab = array("iduser","nom", "prenom", "adresse", "email", "mdp", "droit"); 
        $mot = $_POST['mot']; 
        $lesUsers = $unControleur->selectSearch($tab, $mot); 
    }
    else
    {
        $lesUsers = $unControleur->selectAll();
    }

	if(isset($_SESSION['email']) && $_SESSION['droit']=="admin")
	{
		// $unControleur->setTable("intervention"); 
		// $lesInterventions = $unControleur->selectAll ();
        $unControleur->setTable("user"); 
		$leUser = null; 

		if (isset($_GET['action']) && isset($_GET['iduser']))
		{
			$action = $_GET['action']; 
			$iduser = $_GET['iduser'];

			switch ($action)
			{
				case "sup" : 
					$where = array("iduser"=>$iduser);
					$unControleur->delete ($where); 
					break;
				case "edit" : 
					$where = array("iduser"=>$iduser);
					$leUser = $unControleur->selectWhere($where); 
					
					break; 
			} 
		}

		include"view/view_insert_gestionUsersAdmin.php";
		if(isset($_POST['Modifier']))
		{
			$unControleur->setTable("user");
			$tab = array("nom"=>$_POST['nom'],
                        "prenom"=>$_POST['prenom'],
                        "adresse"=>$_POST['adresse'],
						"email"=>$_POST['email'],
                        "mdp"=>$_POST['mdp'],
						"droit"=>$_POST['droit']
						);
			$where = array("iduser"=>$_GET['iduser']);
			$unControleur->update($tab, $where); 
			header("Location:index.php?pn=gestionUsersAdmin"); 
		}

		if(isset($_POST['Valider']))
		{
			$unControleur->setTable("user");
			$tab = array("nom"=>$_POST['nom'],
                        "prenom"=>$_POST['prenom'],
                        "adresse"=>$_POST['adresse'],
						"email"=>$_POST['email'],
                        "mdp"=>$_POST['mdp'],
						"droit"=>$_POST['droit']
						);
			$unControleur->insert($tab); 
		}
	}
	 
	require_once ("view/view_liste_gestionUsersAdmin.php"); 
?>