<?php ob_start(); ?>
<div id="bloc_haut_admin_panel">
	<h1>Administration</h1>
	<a class="btn btn-secondary" href="#ancreNounous">Gestion des nounous</a>
	<a class="btn btn-secondary"href="#ancreParents">Gestion des parents</a>
	<a class="btn btn-secondary"href="#ancreAvis">Gestion des avis</a>
</div>

<h2 id="ancreNounous">Liste des Nounous</h2>

<table class="table_pag" id="table_nounous">
	<thead>
		<tr>
			<th>Pseudo</th>
			<th class="respDesign">Expérience</th>
			<th class="respDesign">Place(s) disponible(s)</th>
			<th class="respDesign">Ville de résidence</th>
			<th>Nb signalements</th>
			<th>Profil</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($nounous as $nounou): ?>
			<tr>
				<td><?= htmlspecialchars($nounou->pseudo()); ?></td>
				<td class="respDesign"><?= htmlspecialchars($nounou->experience()); ?> an(s)</td>
				<td class="respDesign"><?= htmlspecialchars($nounou->place_dispo()); ?></td>
				<td class="respDesign"><?= htmlspecialchars($nounou->ville()); ?></td>
				<td><?= htmlspecialchars($nounou->signalement()); ?></td>
				<td><a class="btn btn-primary" href="index.php?action=adminEditNounou&amp;pseudo=<?= htmlspecialchars($nounou->pseudo()); ?>">Gérer</a></td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>

<hr>

<h2 id="ancreParents">Liste des Parents</h2>

<table class="table_pag" id="table_parents">
	<thead>
		<tr>
			<th>Pseudo</th>
			<th class="respDesign">Nom</th>
			<th class="respDesign">Prénom</th>
			<th>Ville de résidence</th>	
			<th>Gérer</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($parents as $parent): ?>
			<tr>
				<td><?= htmlspecialchars($parent->pseudo()); ?></td>
				<td class="respDesign"><?= htmlspecialchars($parent->nom()); ?></td>
				<td class="respDesign"><?= htmlspecialchars($parent->prenom()); ?></td>
				<td><?= htmlspecialchars($parent->ville()); ?></td>	
				<td><a class="btn btn-primary" href="index.php?action=adminEditParent&amp;pseudo=<?= htmlspecialchars($parent->pseudo()); ?>">Gérer</a></td>
			</tr>
		<?php endforeach; ?>
	</tbody>
	
</table>

<hr>

<h2 id="ancreAvis">Liste des Avis</h2>

<table class="table_pag" id="table_avis">
	<thead>
		<tr>
			<th>Pseudo de l'auteur</th>
			<th>Commentaire</th>
			<th class="respDesign">Note</th>
			<th class="respDesign">Signalement(s)</th>
			<th class="respDesign">Supprimer</th>
			<th>Gérer</th>	
		</tr>
	</thead>
	<tbody>
		<?php foreach ($listAvis as $avis): ?>
			<tr>
				<td><?= htmlspecialchars($avis->pseudo_parent()); ?></td>
				<td><?= htmlspecialchars($avis->contenu()); ?></td>
				<td class="respDesign"><?= htmlspecialchars($avis->note()); ?></td>
				<td class="respDesign"><?= htmlspecialchars($avis->signalement()); ?></td>
				<td class="respDesign"><a class="btn btn-danger" href="index.php?action=adminPanelDeleteAvis&amp;idAvis=<?= htmlspecialchars($avis->id()); ?>" onclick="return confirm('Etes-vous sûr de vouloir supprimer cet avis ?');">Supprimer</a></td>
				<td><a class="btn btn-primary" href="index.php?action=adminShowAvis&amp;idNounou=<?= htmlspecialchars($avis->id_nounou()); ?>#avis_nounou">Nounou liée</a></td>	
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>
		
<?php $content = ob_get_clean(); ?>

<?php require("views/template.php"); ?>