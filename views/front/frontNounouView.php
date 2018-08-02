

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
	<?php if(isset($_SESSION['profil']) && $_SESSION['profil'] = "parent") { ?>
		
		<div id="contact_nounou">
			<h2>Contacter la nounou</h2>
			<span>Formulaire de contact à venir</span>
		</div>

		<div id="set_avis_nounou">
			<div id="formulaire_avis">
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
		<h2>Connectez-vous pour contacter la nounou ou laisser un avis</h2>
		<a href="index.php?action=login">Page de connexion</a>
	<?php } ?>
</div>







	

<?php $content = ob_get_clean(); ?>

<?php require("views/template.php"); ?>