<p class="contentProduit">Que vous soyez débutant ou expert, nous avons une large sélection d'appareils parmi lesquels vous trouverez votre bonheur.</p>
<p class="contentProduit">Nous esperons que vous y trouvez votre bonheur !</p>

<hr>

<form class="rechercheProduit" method="post" action="">
	Rechercher un appareil : <input type="text" name="mot">
	<input type="submit" name="Rechercher" value="Rechercher">
</form>

<script>
	function afficher()
	{
		alert("Produit ajouté dans le panier");
	}
</script>

<table class="styled-table">
	<tr id="ligneTab">
		<td>Photo</td> <td>Nom</td><td>Quantité</td> <td>Format Pellicule</td><td>Nombre de poses</td><td>Focale</td><td>Alimentation</td><td>Dimensions</td><td id="colTab">Prix</td><td>Operation</td>
	</tr>

	<?php
		foreach ($lesAppareils as $unAppareil)
		{
			echo
			"
				<tr>
					<td> <img class='imgProduit' src=".$unAppareil['img']."> </td>
					<td> ".$unAppareil['nom']."</td>
					<td> ".$unAppareil['quantite']."</td>
					<td> ".$unAppareil['formatPellicule']."</td>
					<td> ".$unAppareil['nbPoses']."</td>
					<td> ".$unAppareil['focale']."</td>
					<td> ".$unAppareil['alimentation']."</td>
					<td> ".$unAppareil['dimension']."</td>
					<td id='colTab'> ".$unAppareil['prix']."</td>
					<td> 
						<form method ='post' action='' onsubmit='afficher()'>
							<input type ='hidden' name ='idproduit' value ='".$unAppareil['idproduit']."'>
							<input type='submit' value='Ajouter au panier' name='Ajouter'>
						</form>
					</td>
				</tr>
			";
		}
	?>
</table>