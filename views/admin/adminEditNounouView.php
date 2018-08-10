<?php ob_start(); ?>

<div class="container">
    <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
        <h2>Editer un profil NOUNOU</h2>
    </div>
</div>

<?php if(isset($_SESSION['editNounou_message'])) {
        echo $_SESSION['editNounou_message'];
    } ?>

<div id="formulaire_newParent" style="text-align: center;">
    <form action="index.php?action=adminUpdateNounou&amp;pseudo=<?= $nounou->pseudo(); ?>" method="POST">

        <label for="pseudo"> Pseudo  : <input type="text" name="pseudo" id="pseudo" required value="<?= $nounou->pseudo(); ?>"> </label> <br/> 
        <label for="nom"> Nom  : <input type="text" name="nom" id="nom" required value="<?= $nounou->nom(); ?>"> </label> <br/> 
        <label for="prenom"> Prenom  : <input type="text" name="prenom" id="prenom" required value="<?= $nounou->prenom(); ?>"> </label> <br/> 
        <label for="email"> Mofifier mon Adresse email  : <input type="email" name="email" id="email" required value="<?= $nounou->email(); ?>"> </label> <br/> 
        <label for="confirm_email"> Confirmation adresse email  : <input type="email" name="confirm email" id="confirm email" required value="<?= $nounou->email(); ?>"> </label> <br/> 
        <label for="password"> Définir mon mot de passe : <input type="password" name="password" id="password" required> </label>  <br/> 
        <label for="confirm_password"> Confirmation mot de passe  : <input type="password" name="confirm password" id="confirm password" required> </label> <br/> 

        <label for="experience"> Expérience  : <input type="text" name="experience" id="experience" required value="<?= $nounou->experience(); ?>"> </label> <br/> 
        <label for="place_dispo"> Place(s) disponible(s)  : <input type="text" name="place_dispo" id="place_dispo" required value="<?= $nounou->place_dispo(); ?>"> </label> <br/> 

        <label for="ville"> Ville : <input type="text" name="ville" id="ville" required value="<?= $nounou->ville(); ?>"> </label>  <br/> 
        <p>Département enregistré : <?= $nounou->departement(); ?></p>
        <label for="departement"> Mofifier le département  : 
            <select required name="departement" id="departement">
                <option value="75">Paris</option> 
                <option value="78">Yvelines</option>
                <option value="92">Hauts de Seine</option>
                <option value="93">Seine Saint Denis</option>
                <option value="94">Val de Marne</option>
                <option value="95">Val d'Oise</option>
                <option value="77">Seine et Marne</option>
            </select> 
        </label> <br/> 
     
        <input type="submit" value="Envoyer"/>      

    </form>

        <a href="index.php?action=adminDeleteNounou&amp;pseudo=<?= $nounou->id(); ?>">Supprimer ce profil</a>

</div>


<div id="avis_nounou">
	<h2>Les avis des parents</h2>

	<table id="table_avis">
		<tr>
			<th>Pseudo</th>
			<th>Commentaires</th>
			<th>Notes</th>
			<th>Nb de signalement(s)</th>
			<th>Valider</th>
			<th>Supprimer</th>
		</tr>
		
		<?php foreach($listingAvis as $avis): ?>
			<tr>
				<form action="index.php?action=adminEditAvis&amp;idAvis=<?= $avis->id(); ?>&amp;idNounou=<?= $avis->id_nounou(); ?>" method="POST">
					<td><label for="pseudo"><input type="text" name="pseudo" id="pseudo" value="<?= $avis->pseudo_parent(); ?>" required> </label></td>
					<td><label for="contenu"><input type="text" name="contenu" id="contenu" value="<?= $avis->contenu(); ?>" required> </label></td>
					<td>
						<span>Note actuelle : <?= $avis->note(); ?></span>
						<label for="departement"> 
							<select required name="note" id="note">
								<option value="" selected disabled hidden>Modifier la note ici</option>
								<option>1</option>
								<option>2</option>
								<option>3</option>
								<option>4</option>
								<option>5</option>
								<option>6</option>
								<option>7</option>
								<option>8</option>
								<option>9</option>
								<option>10</option>
							</select> 
						</label>
					</td>
					<td><?= $avis->signalement(); ?></td>
					<td><input type="submit" value="Valider"/></td>  
					<td><a href="index.php?action=adminDeleteAvis&amp;idAvis=<?= $avis->id(); ?>&amp;idNounou=<?= $avis->id_nounou(); ?>">Supprimer</a></td>
				</form>
			</tr>
		<?php endforeach ?>	

	</table>
	
</div>

<h2><a href="index.php?action=adminLogin">Revenir au Panel</a></h2>

<!--

<div id="contact_avis_nous">
	<?php if(isset($_SESSION['profil']) && $_SESSION['profil'] == "parent") { ?>
		
		<?php if(isset($_SESSION['avis']) && $_SESSION['avis'] == "clear") { ?>
			<div id="set_avis_nounou">
				<h2>Notez votre nounou</h2>
				<div class="formulaire_avis">
	    			<form action="index.php?action=addAvis&amp;id=<?= $nounou->id(); ?>)" method="POST">
	       				<label for="pseudo"> Pseudo  : <input type="text" name="pseudo" id="pseudo" value="<?= $_SESSION['pseudo']; ?>" disabled="disabled"> </label> <br/> 
						<label for="departement"> Note  : 
							<select required name="note" id="note">
								<option>1</option>
								<option>2</option>
								<option>3</option>
								<option>4</option>
								<option>5</option>
								<option>6</option>
								<option>7</option>
								<option>8</option>
								<option>9</option>
								<option>10</option>
							</select> 
						</label> <br/>
						<label for="contenu"> Commentaire : <input type="text" name="contenu" id="contenu" required> </label>
	        			<input type="submit" value="Envoyer"/>      
	    			</form>
				</div>
			</div>
		<?php } else { ?>
			<div>

				<h3>Votre avis :</h3>
				<div class="formulaire_avis">
	    			<form action="index.php?action=updateAvis&amp;id=<?= $nounou->id(); ?>)" method="POST">
						<label for="departement"> Changer la note  : 
							<select required name="note" id="note">
								<option>1</option>
								<option>2</option>
								<option>3</option>
								<option>4</option>
								<option>5</option>
								<option>6</option>
								<option>7</option>
								<option>8</option>
								<option>9</option>
								<option>10</option>
							</select> 
						</label> <br/>
						<label for="contenu"> Commentaire : <input type="text" name="contenu" id="contenu" value="<?= $avisOnFile->contenu() ?>" required> </label>
	        			<input type="submit" value="Modifier mon avis"/>  
	        			<a href="index.php?action=deleteAvis&amp;idAvis=<?= htmlspecialchars($avisOnFile->id()); ?>&amp;idNounou=<?= htmlspecialchars($avisOnFile->id_nounou()); ?>" onclick="return confirm('Etes-vous sûr de vouloir supprimer votre avis ?');">Supprimer mon avis</a>    
	    			</form>
				</div>
			</div>
		<?php } ?>

		<div id="contact_nounou">
			<h2>Contacter la nounou</h2>
			<p>Nom : <?= $nounou->nom(); ?></p>
			<p>Prénom : <?= $nounou->prenom(); ?></p>
			<p>Adresse email : <?= $nounou->email(); ?></p>
			<p><a href="mailto:<?= $nounou->email(); ?>">Envoyer un email</a></p>
		</div>

	<?php } else { ?>
		<h2><a href="index.php?action=login">Connectez-vous</a> comme parent pour obtenir les coordonnées de la nounou ou laisser un avis</h2>
	<?php } ?>
</div>

-->





	

<?php $content = ob_get_clean(); ?>

<?php require("views/template.php"); ?>