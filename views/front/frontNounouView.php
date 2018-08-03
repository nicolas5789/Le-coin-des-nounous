<?php ob_start(); ?>

<div id="profil_nounou">
	<div id="infos_nounou">	
		<h1>Profil de la Nounou</h1>

		<p>Pseudo : <?= $nounou->pseudo(); ?> </p>

		<p>Nom :  <?= $nounou->nom(); ?>    </p>

		<p>Prénom : <?= $nounou->prenom(); ?>     </p>

		<p>Expérience : <?= $nounou->experience(); ?>  </p>

		<p>Place(s) disponible(s) :  <?= $nb = $nounou->place_dispo(); ?>    </p>

		<p>Ville de résidence :  <?= $nounou->ville(); ?>    </p>

		<p>Département de résidence :  <?= $nounou->departement(); ?>   </p>

	</div>

<div id="map"></div>

</div>


<div id="avis_nounou">
	<h2>Découvrir les avis</h2>
	
	<p> Note moyenne de <?= $nounou->pseudo(); ?> : <?php echo $noteMoyenne['AVG(note)']; ?> </p>
	<p>Listing des avis</p>

	<hr>

	<?php foreach($listingAvis as $avis): ?>

	<p> Pseudo du parent : <?= $avis->pseudo_parent() ?></p>

	<p> Note donné : <?= $avis->note() ?></p>

	<p> Commentaire : <?= $avis->contenu() ?></p>

	<hr>

	<?php endforeach ?>

</div>


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
						<p> Note actuelle : <?= $avisOnFile->note() ?> </p>
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
	    			</form>
				</div>
			</div>
		<?php } ?>

		<div id="contact_nounou">
			<h2>Contacter la nounou</h2>
			<span>Adresse mail de la nounou</span>
			<p> <?= $nounou->email(); ?> </p>
		</div>

	<?php } else { ?>
		<h2>Connectez-vous comme parent pour obtenir l'email de la nounou ou laisser un avis</h2>
		<a href="index.php?action=login">Page de connexion</a>
	<?php } ?>
</div>







	

<?php $content = ob_get_clean(); ?>

<?php require("views/template.php"); ?>