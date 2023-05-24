<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Boutique Lomography</title>
	<link rel="stylesheet" type="text/css" href="style/style.css"/>
</head>
<body>
	<header class="header">

		<nav class="navHeader">
			<div class="headerGauche">
				<a href="index.php?pn=appareils">Appareils</a>
				<a href="index.php?pn=pellicules">Pellicules</a>
				<a href="index.php?pn=objectifs">Objectifs</a>
			</div>

			<div class="logoLomography">
				<a href="index.php">
					<img src="images/lomography_logo.png">
				</a>
			</div>

			<div class="headerDroit">
				<a href="index.php?pn=profil">Profil</a>
				<a href="index.php?pn=creerUnCompte">Créer un compte</a>
				<a href="index.php?pn=panier">
					<img src="images/panierrouge.png" alt="">
				</a>
			</div>
		</nav>
		<?php
			if(isset($_SESSION['email']) && $_SESSION['droit']=="admin")
			{
				include'headerAdmin.php';
			}
		?>