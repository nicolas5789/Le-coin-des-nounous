

<?php ob_start(); ?>

<div id="profil_nounou">
	<div id="infos_nounou">	
		<h1>Profil de la Nounou</h1>

		<p>Id :  <?= $nounou->id(); ?>   </p>

		<p>Pseudo : <?= $nounou->pseudo(); ?> </p>

		<p>Nom :  <?= $nounou->nom(); ?>    </p>

		<p>Prénom : <?= $nounou->prenom(); ?>     </p>

		<p>Email :  <?= $nounou->email(); ?>      </p>

		<p>Mot de passe : <?= $nounou->password(); ?>     </p>

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

<div id="contact_nounou">
	<h2>Contacter la nounou</h2>
	<span>Formulaire de contact à venir</span>
</div>





	

<?php $content = ob_get_clean(); ?>

<?php require("views/template.php"); ?>