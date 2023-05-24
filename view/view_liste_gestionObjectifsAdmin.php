<hr>

<h2 class="contentProduit"> Liste objectifs </h2>

<form class="rechercheProduit" method="post" action="">
	Rechercher un produit : <input type="text" name="mot">
	<input type="submit" name="Rechercher" value="Rechercher">
</form>
<br/>

<table class="styled-table">
    <tr id="ligneTab">
		<td>ID PRODUIT</td><td>Photo</td> <td>Nom</td><td>Quantité</td><td>Poids</td><td>Diamètre max</td><td>Diamètre du filtre</td><td>Moteur auto-focus</td><td>Agrandissement</td><td id="colTab">Prix</td><td>Operation</td>
	</tr>

	<?php
		foreach ($lesObjectifs as $unObjectif)
		{
			echo
			"
				<tr>
				    <td> ".$unObjectif['idproduit']."</td>
					<td> <img class='imgProduit' src=".$unObjectif['img']."> </td>
					<td> ".$unObjectif['nom']."</td>
					<td> ".$unObjectif['quantite']."</td>
					<td> ".$unObjectif['poids']."</td>
					<td> ".$unObjectif['diametreMaxAndLongueur']."</td>
					<td> ".$unObjectif['diametreFiltre']."</td>
					<td> ".$unObjectif['moteurAutoFocus']."</td>,
                    <td> ".$unObjectif['agrandissement']."</td>
					<td id='colTab'> ".$unObjectif['prix']."</td>
					<td>
            ";
            if(isset($_SESSION['email']) and $_SESSION['droit']=="admin")
            {
                echo
                "
                        <a href='index.php?pn=gestionObjectifsAdmin&action=sup&idproduit=".$unObjectif['idproduit']."'><img src='images/supprimer.png' heigth='30' width='30'></a>
                        <a href='index.php?pn=gestionObjectifsAdmin&action=edit&idproduit=".$unObjectif['idproduit']."'><img src='images/edit.png' heigth='30' width='30'></a>
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