<?php
	session_start();
    include("header.php");
	require_once ("controller/controller.class.php"); 
	require_once("controller/config_bdd.php");
	//instanciation de la classe Controleur
	$unControleur = new Controleur($serveur, $bdd, $user, $mdp); 
?>
<?php
	if(! isset($_SESSION['email']))
	{
		require("view/view_connexion.php");
	}
	else
	{	
		echo"
			<p>Vous etes connecté sur le compte de : ".$_SESSION['nom']." ".$_SESSION['prenom']."</p>
		";
		echo
		'
			<div>
				<a href="profil.php?page=1">
					<img src="images/deconnexion.png">
				</a>
			</div>
		';
		if (isset($_GET['page']))
		{
			$page = $_GET['page']; 
		}
		else $page = 0; 

		if($page==1)
		{
			unset($_SESSION); session_destroy(); header("Location: index.php");
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
			$_SESSION['role'] = $unUser['role'];
			$_SESSION['nom'] = $unUser['nom'];
			$_SESSION['prenom'] = $unUser['prenom'];
			header("Location: index.php");
		}
		else
		{
			echo "<br/> Veuillez vérifier vos identifiants";
		}
	}
?>
<?php
    include("footer.php");
?>