<h2 class="contentProduit"> Insertion d'une Pellicule</h2>
<form class="rechercheProduit" method="post" action="">
	<table class="styled-tableInsert"> 

		<tr id="ligneTab">
			<td> <label for="img">Image</label> </td> 
			<td> <input type="file" name="img" value="<?php if($laPellicule!=null) echo $laPellicule['img'];?>"></td>
		</tr>
		<tr id="ligneTab">
			<td> Nom </td> 
			<td> <input type="text" name="nom" value ="<?php if($laPellicule!=null) echo $laPellicule['nom'];?>"></td>
		</tr>

		<tr id="ligneTab">
			<td> Quantité en stock</td> 
			<td> <input type="text" name="quantite" value ="<?php if($laPellicule!=null) echo $laPellicule['quantite'];?>"></td>
		</tr>

		<tr id="ligneTab">
			<td> Prix </td> 
			<td> <input type="text" name="prix" value ="<?php if($laPellicule!=null) echo $laPellicule['prix'];?>"></td>
		</tr>
        <tr id="ligneTab">
			<td> Type de film </td> 
			<td> <input type="text" name="typeFilm" value ="<?php if($laPellicule!=null) echo $laPellicule['typeFilm'];?>"></td>
		</tr>
        <tr id="ligneTab">
			<td> Developpement </td> 
			<td> <input type="text" name="developpement" value ="<?php if($laPellicule!=null) echo $laPellicule['developpement'];?>"></td>
		</tr>
        <tr id="ligneTab">
			<td> Sensibilité </td> 
			<td> <input type="text" name="sensibilite" value ="<?php if($laPellicule!=null) echo $laPellicule['sensibilite'];?>"></td>
		</tr>
        <tr id="ligneTab">
			<td> Format </td> 
			<td> <input type="text" name="format" value ="<?php if($laPellicule!=null) echo $laPellicule['format'];?>"></td>
		</tr>

		<tr id="ligneTab">
			<td> <input type="reset" name="Annuler" value="Annuler"> </td> 
			<td> <input type="submit" 

				<?php if($laPellicule!=null) echo ' name="Modifier" value="Modifier"';
				else echo ' name="Valider" value="Valider"'; ?>/>
                </td>
		</tr>
	</table>
</form>