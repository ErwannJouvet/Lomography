<hr>

<h2 class="contentProduit"> Liste appareils photo </h2>

<form class="rechercheProduit" method="post" action="">
	Rechercher un produit : <input type="text" name="mot">
	<input type="submit" name="Rechercher" value="Rechercher">
</form>
<br/>

<table class="styled-table">
	<tr id="ligneTab">
		<td>ID PRODUIT</td><td>Photo</td> <td>Nom</td><td>Quantité</td><td>Format Pellicule</td><td>Nombre de poses</td><td>Focale</td><td>Alimentation</td><td>Dimensions</td><td id="colTab">Prix</td><td>Operation</td>
	</tr>

	<?php
		foreach ($lesAppareils as $unAppareil)
		{
			echo
			"
				<tr>
				    <td> ".$unAppareil['idproduit']."</td>
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
            ";
            if(isset($_SESSION['email']) and $_SESSION['droit']=="admin")
            {
                echo
                "
                        <a href='index.php?pn=gestionAppareilsAdmin&action=sup&idproduit=".$unAppareil['idproduit']."'><img src='images/supprimer.png' heigth='30' width='30'></a>
                        <a href='index.php?pn=gestionAppareilsAdmin&action=edit&idproduit=".$unAppareil['idproduit']."'><img src='images/edit.png' heigth='30' width='30'></a>
                    </td>
                </tr>
                ";
            }
            else
            {
                echo
                "
                    </td>
                </tr>
                ";
            }
		}
		?>
</table>