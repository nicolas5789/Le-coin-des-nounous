

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

		<p>Note des avis :  <?= $nounou->note_avis(); ?>  </p>
	</div>

<div id="map"></div>

</div>


<div id="avis_nounou">
	<h2>Découvrir les avis</h2>
	<p>Listing des avis</p>
</div>

<div id="contact_nounou">
	<h2>Contacter la nounou</h2>
	<span>Formulaire de contact à venir</span>
</div>





	

<?php $content = ob_get_clean(); ?>

<?php require("views/template.php"); ?>