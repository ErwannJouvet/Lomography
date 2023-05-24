<?php
    if(! isset($_SESSION['email']))
	{
		if(isset($_POST['Creer']))
		{
			$unControleur->setTable("user");
			$tab = array("nom"=>$_POST['nom'],
                        "prenom"=>$_POST['prenom'], 
						"adresse"=>$_POST['adresse'],
						"email"=>$_POST['email'],
						"mdp"=>$_POST['mdp']
						);
			$unControleur->creerCompte($tab);
		}
		require("view/view_creerUnCompte.php");
	}
	else
	{
		echo
		"
			<div class='divCreationImpossible'>
				<p class='creationImpossible'> Vous possédez déjà un compte ! </p>
			</div>
		";
	}
?>