<p class="contentProduit">Voici la liste de tout nos objectifs</p>
<p class="contentProduit">Nous esperons que vous y trouvez votre bonheur !</p>

<hr>

<form class="rechercheProduit" method="post" action="">
	Rechercher un objectif : <input type="text" name="mot">
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
		<td>Photo</td><td>Nom</td><td>Quantité</td><td>Poids</td><td>Diamètre max</td><td>Moteur auto focus</td><td>Agrandissement</td><td id="colTab">Prix</td><td>Operation</td>
	</tr>

	<?php
		foreach ($lesObjectifs as $unObjectif)
		{
			echo
			"
				<tr>
					<td> <img class='imgProduit' src=".$unObjectif['img']."> </td>
					<td> ".$unObjectif['nom']."</td>
					<td> ".$unObjectif['quantite']."</td>
					<td> ".$unObjectif['poids']."</td>
					<td> ".$unObjectif['diametreMaxAndLongueur']."</td>
					<td> ".$unObjectif['moteurAutoFocus']."</td>
					<td> ".$unObjectif['agrandissement']."</td>
					<td id='colTab'> ".$unObjectif['prix']."</td>
					<td> 
						<form method ='post' action='' onsubmit='afficher()'>
							<input type ='hidden' name ='idproduit' value ='".$unObjectif['idproduit']."'>
							<input type='submit' value='Ajouter au panier' name='Ajouter'>
						</form>
					</td>
				</tr>
			";
		}
	?>
</table>