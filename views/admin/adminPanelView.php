<?php ob_start(); ?>

<h2>Liste des Nounous</h2>

<table id="table_nounous">
	<tr>
		<th>Etat</th>
		<th>Pseudo</th>
		<th>Expérience</th>
		<th>Place(s) disponible(s)</th>
		<th>Ville de résidence</th>
		<th>Nb signalements</th>
		<th>Profil</th>
	</tr>
	<?php foreach ($nounous as $nounou): ?>
	<tr>
		<td></td>
		<td><?= $nounou->pseudo(); ?></td>
		<td><?= $nounou->experience(); ?> an(s)</td>
		<td><?= $nb = $nounou->place_dispo(); ?></td>
		<td><?= $nounou->ville(); ?></td>
		<td><?= $nounou->signalement(); ?></td>
		<td><a href="index.php?action=adminEditNounou&amp;idNounou=<?= $nounou->id(); ?>">Découvrir</a></td>
	</tr>
	<?php endforeach; ?>
</table>

<h2>Liste des Parents</h2>

<table id="table_parents">
	<tr>
		<th>Pseudo</th>
		<th>Nom</th>
		<th>Prénom</th>
		<th>Ville de résidence</th>	
		<th>Gérer</th>
	</tr>
	<?php foreach ($parents as $parent): ?>
	<tr>
		<td><?= $parent->pseudo(); ?></td>
		<td><?= $parent->nom(); ?></td>
		<td><?= $parent->prenom(); ?></td>
		<td><?= $parent->ville(); ?></td>	
		<td><a href="index.php?action=adminEditParent&amp;pseudo=<?= $parent->pseudo(); ?>">Gérer ce profil</a></td>
	</tr>
	<?php endforeach; ?>
</table>

<h2>Liste des Avis</h2>

<table id="table_parents">
	<tr>
		<th>Pseudo de l'auteur</th>
		<th>Commentaire</th>
		<th>Note</th>
		<th>Profil de la nounou notée</th>	
	</tr>
	<?php foreach ($listAvis as $avis): ?>
	<tr>
		<td><?= $avis->pseudo_parent(); ?></td>
		<td><?= $avis->contenu(); ?></td>
		<td><?= $avis->note(); ?></td>
		<td><a href="index.php?action=adminEditAvis&amp;idAvis=<?= $avis->id_nounou(); ?>">Nounou liée</a></td>	
	</tr>
	<?php endforeach; ?>
</table>
		
<?php $content = ob_get_clean(); ?>

<?php require("views/template.php"); ?>