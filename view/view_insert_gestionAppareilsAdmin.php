<h2 class="contentProduit"> Insertion d'un appareil</h2>
<form class="rechercheProduit" method="post" action="">
	<table class="styled-tableInsert"> 

		<tr id="ligneTab">
			<td> <label for="img">Image</label> </td> 
			<td> <input type="file" name="img" value="<?php if($lAppareil!=null) echo $lAppareil['img'];?>"></td>
		</tr>
		<tr id="ligneTab">
			<td> Nom </td> 
			<td> <input type="text" name="nom" value ="<?php if($lAppareil!=null) echo $lAppareil['nom'];?>"></td>
		</tr>

		<tr id="ligneTab">
			<td> Quantité en stock</td> 
			<td> <input type="text" name="quantite" value ="<?php if($lAppareil!=null) echo $lAppareil['quantite'];?>"></td>
		</tr>

        <tr id="ligneTab">
			<td> Format Pellicule </td> 
			<td> <input type="text" name="formatPellicule" value ="<?php if($lAppareil!=null) echo $lAppareil['formatPellicule'];?>"></td>
		</tr>
        <tr id="ligneTab">
			<td> Nombre de poses </td> 
			<td> <input type="text" name="nbPoses" value ="<?php if($lAppareil!=null) echo $lAppareil['nbPoses'];?>"></td>
		</tr>
        <tr id="ligneTab">
			<td> Focale </td> 
			<td> <input type="text" name="focale" value ="<?php if($lAppareil!=null) echo $lAppareil['focale'];?>"></td>
		</tr>
        <tr id="ligneTab">
			<td> Alimentation </td> 
			<td> <input type="text" name="alimentation" value ="<?php if($lAppareil!=null) echo $lAppareil['alimentation'];?>"></td>
		</tr>
        <tr id="ligneTab">
			<td> Dimension </td> 
			<td> <input type="text" name="dimension" value ="<?php if($lAppareil!=null) echo $lAppareil['dimension'];?>"></td>
		</tr>

		<tr id="ligneTab">
			<td> Prix </td> 
			<td> <input type="text" name="prix" value ="<?php if($lAppareil!=null) echo $lAppareil['prix'];?>"></td>
		</tr>

		<tr id="ligneTab">
			<td> <input type="reset" name="Annuler" value="Annuler"> </td> 
			<td> <input type="submit" 

				<?php if($lAppareil!=null) echo ' name="Modifier" value="Modifier"';
				else echo ' name="Valider" value="Valider"'; ?>/>
                </td>
		</tr>
	</table>
</form>