<hr>

<h2 class="contentProduit"> Liste des utilisateurs </h2>

<form class="rechercheProduit" method="post" action="">
	Mot de recherche : <input type="text" name="mot">
	<input type="submit" name="Rechercher" value="Rechercher">
</form>
<br/>

<table class="styled-table">
		<tr id="ligneTab">
			<td> Id </td> <td> Nom </td> <td> Prenom </td> <td>Adresse</td> <td> Email </td> <td> Mot de passe </td> <td>Droit</td><td>Operations</td>
		</tr>

		<?php
			foreach ($lesUsers as $unUser) {
				echo "<tr>";

				echo "  <td> ".$unUser['iduser']."</td>
						<td> ".$unUser['nom']."</td>
						<td> ".$unUser['prenom']."</td>
						<td> ".$unUser['adresse']."</td>
						<td> ".$unUser['email']."</td>
						<td> ".$unUser['mdp']."</td>
						<td> ".$unUser['droit']."</td>
						 ";
						
				if(isset($_SESSION['email']) and $_SESSION['droit']=='admin')
				{
				echo "
				<td> 
					<a href='index.php?pn=gestionUsersAdmin&action=sup&iduser=".$unUser['iduser']."'><img src='images/supprimer.png'heigth='30' width='30'></a>
				 

					<a href='index.php?pn=gestionUsersAdmin&action=edit&iduser=".$unUser['iduser']."'><img src='images/edit.png' heigth='30' width='30'></a>
				</td>

					";
				}
				echo "</tr>";
			}
		?>

</table>