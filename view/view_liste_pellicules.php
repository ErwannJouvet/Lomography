<p class="contentProduit">Voici la liste de toutes nos pellicules</p>
<p class="contentProduit">Nous esperons que vous y trouvez votre bonheur !</p>

<hr>

<form class="rechercheProduit" method="post" action="">
	Rechercher un produit : <input type="text" name="mot">
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
		<td>Produit</td> <td>Nom</td><td>Quantité</td><td>Type de film</td><td>Développement</td><td>Sensibilité</td><td>Format</td><td id="colTab">Prix</td><td>Operation</td>
	</tr>

	<?php
		foreach ($lesPellicules as $unePellicule)
		{
			echo
			"
				<tr>
					<td> <img class='imgProduit' src=".$unePellicule['img']."> </td>
					<td> ".$unePellicule['nom']."</td>
					<td> ".$unePellicule['quantite']."</td>
					<td> ".$unePellicule['typeFilm']."</td>
					<td> ".$unePellicule['developpement']."</td>
					<td> ".$unePellicule['sensibilite']."</td>
					<td> ".$unePellicule['format']."</td>
					<td id='colTab'> ".$unePellicule['prix']."</td>
					<td> 
						<form method ='post' action='' onsubmit='afficher()'>
							<input type ='hidden' name ='idproduit' value ='".$unePellicule['idproduit']."'>
							<input type='submit' value='Ajouter au panier' name='Ajouter'>
						</form>
					</td>
				</tr>
			";
		}
	?>
</table>
</body>
</html>

