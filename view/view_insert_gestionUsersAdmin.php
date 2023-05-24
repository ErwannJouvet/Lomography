<h2 class="contentProduit"> Insertion d'un utilisateur</h2>
<form class="rechercheProduit" method="post" action="">
	<table class="styled-tableInsert">
         
		<tr id="ligneTab">
			<td> Nom </td> 
			<td> <input type="text" name="nom" value ="<?php if($leUser!=null) echo $leUser['nom'];?>"></td>
		</tr>

        <tr id="ligneTab">
			<td> Prenom </td> 
			<td> <input type="text" name="prenom" value ="<?php if($leUser!=null) echo $leUser['prenom'];?>"></td>
		</tr>

        <tr id="ligneTab">
			<td> Adresse </td> 
			<td> <input type="text" name="adresse" value ="<?php if($leUser!=null) echo $leUser['adresse'];?>"></td>
		</tr>

        <tr id="ligneTab">
			<td> Email </td> 
			<td> <input type="text" name="email" value ="<?php if($leUser!=null) echo $leUser['email'];?>"></td>
		</tr>

        <tr id="ligneTab">
			<td> Mot de passe </td> 
			<td> <input type="text" name="mdp" value ="<?php if($leUser!=null) echo $leUser['mdp'];?>"></td>
		</tr>
		
		<tr id="ligneTab">
			<td> Droits </td> 
			<td> 
					<select name = "droit"> 
						<?php
						foreach ($lesUsers as $unUser)
						{
                            // echo "<option value ='".$unUser['droit']."'>".$unUser['droit']."</option>"; 
							echo "<option>".$unUser['droit']."</option>"; 
						}
						?>
					</select>
			</td>
		</tr>

		<tr id="ligneTab">
			<td> <input type="reset" name="Annuler" value="Annuler"> </td> 
			<td> <input type="submit"
				<?php 
                    if($leUser!=null) echo ' name="Modifier" value="Modifier"';
				    else echo ' name="Valider" value="Valider"'; 
                ?> 
                >
			</td>
		</tr>
	</table>
</form>