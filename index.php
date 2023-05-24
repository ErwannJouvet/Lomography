<?php
	session_start();
	require_once ("controller/controller.class.php"); 
	require_once("controller/config_bdd.php");
	$unControleur = new Controleur($serveur, $bdd, $user, $mdp);

	include("header.php");

	//monsite.com/index.php?pn=nomdemapage&idproduit=xxx...
	$pn = isset($_GET['pn'])?$_GET['pn']:'home'; //(=operateur ternaire)->comme si j'avais ecrit : if(isset($_GET['pn'])) {$pn=($_GET['pn'])} else {$pn='home'}
	include($pn.'.php');
	
	include("footer.php");
?>