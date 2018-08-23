<?php ob_start(); ?>

<div id="frontlistview">
	<div class="dept" id="dept_list">
		<?php 
			if(isset($_GET['idDept'])){echo '<img alt="logo du département'.$_GET['idDept'].'" id="logo'.$_GET['idDept'].'" src="public/images/logo'.$_GET['idDept'].'.png">' ;} 
		?>
	</div>

	<h2>Liste des Nounou du département</h2>
	<p>Cliquez sur un pseudo pour découvrir le profil complet.</p>
	<table class="table_pag" id="table_nounous">
		<thead>
			<tr>
				<th>Pseudo</th>
				<th class="xp_table">Expérience</th>
				<th class="xp_table">Place(s) disponible(s)</th>
				<th>Ville de résidence</th>
				<th>Note moyenne</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($nounous as $nounou): ?>
			<tr>
				<td><a href="index.php?action=showNounou&amp;idNounou= <?= htmlspecialchars($nounou->id()); ?>"><?= htmlspecialchars($nounou->pseudo()); ?></a></td>
				<td class="xp_table"><?= htmlspecialchars($nounou->experience()); ?> an(s)</td>
				<td class="xp_table"><?= htmlspecialchars($nounou->place_dispo()); ?></td>
				<td><?= htmlspecialchars($nounou->ville()); ?></td>
				<td>
					<?php if($nounou->note() == 0) {echo "Aucune note";} else {echo htmlspecialchars(round($nounou->note()))."/10";} ?>
				</td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>	
<?php $content = ob_get_clean(); ?>

<?php require("views/template.php"); ?>