<?php ob_start(); ?>

<h2>Liste des Nounou du département</h2>

<table id="table_nounous">
	<tr>
		<th>Etat</th>
		<th>Pseudo</th>
		<th>Expérience</th>
		<th>Place(s) disponible(s)</th>
		<th>Ville de résidence</th>
		<th>Profil</th>
	</tr>
	<?php foreach ($nounous as $nounou): ?>
	<tr>
		<td></td>
		<td><?= $nounou->pseudo(); ?></td>
		<td><?= $nounou->experience(); ?> an(s)</td>
		<td><?= $nounou->place_dispo(); ?></td>
		<td><?= $nounou->ville(); ?></td>
		<td><a href="index.php?action=showNounou&amp;idNounou= <?= $nounou->id(); ?>">Découvrir</a></td>
	</tr>
	<?php endforeach; ?>
</table>
		
<?php $content = ob_get_clean(); ?>

<?php require("views/template.php"); ?>