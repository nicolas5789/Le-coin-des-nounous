<?php ob_start(); ?>

<div id="profil_nounou">
	<div id="infos_nounou">	
		<h1>Profil de la Nounou</h1>

		<p>Pseudo : <?= $nounou->pseudo(); ?> </p>

		<p>Expérience : <?= $nounou->experience(); ?> an(s)  </p>

		<p>Place(s) disponible(s) :  <?= $nb = $nounou->place_dispo(); ?>    </p>

		<p>Ville de résidence :  <?= $nounou->ville(); ?>    </p>

		<p>Département de résidence :  <?= $nounou->departement(); ?>   </p>

		<p> Note moyenne de <?= $nounou->pseudo(); ?> : <?php echo $noteMoyenne['AVG(note)']; ?> </p>

		<p><a href="index.php?action=reportNounou&amp;idNounou=<?= $nounou->id(); ?>">Signaler le profil</a></p>

	</div>

<div id="map"></div>

</div>


<div id="avis_nounou">
	<h2>Les avis des parents</h2>

	<table id="table_avis">
		<tr>
			<th>Pseudo</th>
			<th>Commentaires</th>
			<th>Notes</th>
			<th>Signaler</th>
		</tr>
		
		<?php foreach($listingAvis as $avis): ?>
			<tr>
				<td> <?= $avis->pseudo_parent() ?></td>
				<td> <?= $avis->contenu() ?></td>
				<td> <?= $avis->note() ?>/10</td>
				<td><a href="index.php?action=reportAvis&amp;idAvis=<?= $avis->id(); ?>&amp;idNounou=<?= $nounou->id(); ?>">Signaler cet avis</a></td>
			</tr>
		<?php endforeach ?>	

	</table>
	
	<p>Note moyenne de <?= $nounou->pseudo(); ?> : <?php echo $noteMoyenne['AVG(note)']; ?></p>
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


			<form>
				<label for="email_nounou">Email de <?= $nounou->pseudo(); ?> : <input type="text" name="email_nounou" value="<?= $nounou->email(); ?>" required readonly></label>
				<label for="message">Votre message : <input type="text" name="message" placeholder="Tapez votre message ici" required ></label>
				<input type="submit" value="Envoyer votre message">
			</form>

		</div>

	<?php } else { ?>
		<h2><a href="index.php?action=login">Connectez-vous</a> comme parent pour obtenir les coordonnées de la nounou ou laisser un avis</h2>
	<?php } ?>
</div>







	

<?php $content = ob_get_clean(); ?>

<?php require("views/template.php"); ?>