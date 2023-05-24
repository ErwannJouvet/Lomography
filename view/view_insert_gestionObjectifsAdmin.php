<h2 class="contentProduit"> Insertion d'un Objectif</h2>
<form class="rechercheProduit" method="post" action="">
	<table class="styled-tableInsert"> 

		<tr id="ligneTab">
			<td> <label for="img">Image</label> </td> 
			<td> <input type="file" name="img" value="<?php if($lObjectif!=null) echo $lObjectif['img'];?>"></td>
		</tr>
		<tr id="ligneTab">
			<td> Nom </td> 
			<td> <input type="text" name="nom" value ="<?php if($lObjectif!=null) echo $lObjectif['nom'];?>"></td>
		</tr>

		<tr id="ligneTab">
			<td> Quantité en stock</td> 
			<td> <input type="text" name="quantite" value ="<?php if($lObjectif!=null) echo $lObjectif['quantite'];?>"></td>
		</tr>

		<tr id="ligneTab">
			<td> Poids </td> 
			<td> <input type="text" name="poids" value ="<?php if($lObjectif!=null) echo $lObjectif['poids'];?>"></td>
		</tr>
        <tr id="ligneTab">
			<td> Diamètres max </td> 
			<td> <input type="text" name="diametreMaxAndLongueur" value ="<?php if($lObjectif!=null) echo $lObjectif['diametreMaxAndLongueur'];?>"></td>
		</tr>
        <tr id="ligneTab">
			<td> Diamètre du filtre </td> 
			<td> <input type="text" name="diametreFiltre" value ="<?php if($lObjectif!=null) echo $lObjectif['diametreFiltre'];?>"></td>
		</tr>
        <tr id="ligneTab">
			<td> Moteur auto-focus </td> 
			<td> <input type="text" name="moteurAutoFocus" value ="<?php if($lObjectif!=null) echo $lObjectif['moteurAutoFocus'];?>"></td>
		</tr>
        <tr id="ligneTab">
			<td> Agrandissement </td> 
			<td> <input type="text" name="agrandissement" value ="<?php if($lObjectif!=null) echo $lObjectif['agrandissement'];?>"></td>
		</tr>

		<tr id="ligneTab">
			<td> Prix</td> 
			<td> <input type="text" name="prix" value ="<?php if($lObjectif!=null) echo $lObjectif['prix'];?>"></td>
		</tr>

		<tr id="ligneTab">
			<td> <input type="reset" name="Annuler" value="Annuler"> </td> 
			<td> <input type="submit" 

				<?php if($lObjectif!=null) echo ' name="Modifier" value="Modifier"';
				else echo ' name="Valider" value="Valider"'; ?>/>
                </td>
		</tr>
	</table>
</form>