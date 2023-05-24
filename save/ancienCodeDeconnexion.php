// if(isset($_SESSION['email']))
	// {
	// 	// echo'
				
	// 	// 		<a href="profil.php?page=5"><img src="images/deconnexion.png" height="100" width="100"></a>
	// 	// 	';
	// 	// echo "<br/><br/>Vous etes connecté sur le compte de : ".$_SESSION['nom']." ".$_SESSION['prenom'];

	// 	// if (isset($_GET['page'])) $page = $_GET['page']; 
	// 	// else $page = 0; 

	// 	// switch($page)
	// 	// {
	// 	// 	case 5 : unset($_SESSION); session_destroy(); header("Location: index.php");break;
	// 	// }
	// 	echo'
	// 		<a href="profil.php?page=5">
	// 			<img src="images/deconnexion.png" height="100" width="100">
	// 		</a>
	// 	';
	// 	echo "<br/><br/>Vous etes connecté sur le compte de : ".$_SESSION['nom']." ".$_SESSION['prenom'];
	// 	if (isset($_GET['page']))
	// 	{
	// 		$page = $_GET['page'];
	// 	}
	// 	else 
	// 	{
	// 		$page = 0;
	// 	}
	// 	if($page==5)
	// 	{
	// 		unset($_SESSION); session_destroy(); header("Location: index.php");
	// 	}
	// }