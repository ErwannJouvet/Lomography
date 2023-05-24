<hr>

<h2 class="contentProduit"> Liste pellicules photo </h2>

<form class="rechercheProduit" method="post" action="">
	Rechercher un produit : <input type="text" name="mot">
	<input type="submit" name="Rechercher" value="Rechercher">
</form>
<br/>

<table class="styled-table">
    <tr id="ligneTab">
		<td>ID PRODUIT</td><td>Photo</td> <td>Nom</td><td>Quantité</td><td>Type de film</td><td>Développement</td><td>Sensibilité</td><td>Format</td><td id="colTab">Prix</td><td>Operation</td>
	</tr>

	<?php
		foreach ($lesPellicules as $unePellicule)
		{
			echo
			"
				<tr>
				    <td> ".$unePellicule['idproduit']."</td>
					<td> <img class='imgProduit' src=".$unePellicule['img']."> </td>
					<td> ".$unePellicule['nom']."</td>
					<td> ".$unePellicule['quantite']."</td>
					<td> ".$unePellicule['typeFilm']."</td>
					<td> ".$unePellicule['developpement']."</td>
					<td> ".$unePellicule['sensibilite']."</td>
					<td> ".$unePellicule['format']."</td>
					<td id='colTab'> ".$unePellicule['prix']."</td>
					<td>
            ";
            if(isset($_SESSION['email']) and $_SESSION['droit']=="admin")
            {
                echo
                "
                        <a href='index.php?pn=gestionPelliculesAdmin&action=sup&idproduit=".$unePellicule['idproduit']."'><img src='images/supprimer.png' heigth='30' width='30'></a>
                        <a href='index.php?pn=gestionPelliculesAdmin&action=edit&idproduit=".$unePellicule['idproduit']."'><img src='images/edit.png' heigth='30' width='30'></a>
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