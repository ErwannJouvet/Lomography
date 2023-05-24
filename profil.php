<?php
	if(! isset($_SESSION['email']))
	{
		require("view/view_connexion.php");
	}
	else
	{	
		echo"
			<div class='autourBjr'>
				<p class='bjr'>Bonjour ".$_SESSION['prenom']." ! 👋</p>
			</div>
			<div class='autourInfosEtDeco'>
				<div class='autourInfos'>
					<p class='titreInfosPerso'>Vos information personnelles : </p>
					<p class='infosperso'>Nom : ".$_SESSION['nom']."</p>
					<p class='infosperso'>Prénom : ".$_SESSION['prenom']."</p>
					<p class='infosperso'>Adresse : ".$_SESSION['adresse']."</p>
					<p class='infosperso'>Email : ".$_SESSION['email']."</p>
					<p class='infosperso'>Mot de passe : ".$_SESSION['mdp']."</p>
				</div>
				<div class='seDeconnecter'>
					<p>Pour vous déconnecter, veuillez appuyez sur ce bouton : </p>
					<a href='index.php?pn=profil&action=deco'>
						<img src='images/deconnexion.png'>
					</a>
				</div>
			</div>
		";
		if (isset($_GET['action']))
		{
			$action = $_GET['action'];
			if($action=='deco')
		{
			unset($_SESSION); session_destroy(); header("Location: index.php");
		}
		}
	}

	if(isset($_POST['SeConnecter']))
	{
		$where = array(	"email"=>$_POST['email'],
						"mdp"=> $_POST['mdp']
					);
		$unControleur->setTable("user");
		$unUser = $unControleur->selectWhere($where);
		if(isset($unUser['email']))
		{
			$_SESSION['email'] = $unUser['email'];
			$_SESSION['droit'] = $unUser['droit'];
			$_SESSION['nom'] = $unUser['nom'];
			$_SESSION['prenom'] = $unUser['prenom'];
			$_SESSION['adresse'] = $unUser['adresse'];
			$_SESSION['mdp'] = $unUser['mdp'];
			header("Location: index.php?pn=profil");
		}
		else
		{
			echo "<br/> Veuillez vérifier vos identifiants";
		}
	}
?>