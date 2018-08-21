<?php ob_start(); ?>

<div id="frontlistview">
	<div class="dept" id="dept_list">
		<?php 
			if($_GET['idDept'] == "77"){echo '<img alt="seine et marne" id="logo77" src="public/images/logo77.png">';} 
			elseif($_GET['idDept'] == "78"){echo '<img alt="yvelines" id="logo78" src="public/images/logo78.png">';} 
			elseif($_GET['idDept'] == "92"){echo '<img alt="hauts de seine" id="logo92" src="public/images/logo92.png">';} 
			elseif($_GET['idDept'] == "94"){echo '<img alt="val de marne" id="logo94" src="public/images/logo94.png">';} 
			elseif($_GET['idDept'] == "95"){echo '<img alt="val d\'oise" id="logo95" src="public/images/logo95.png">';} 
			elseif($_GET['idDept'] == "93"){echo '<img alt="seine saint denis" id="logo93" src="public/images/logo93.png">';} 
			elseif($_GET['idDept'] == "75"){echo '<img alt="paris" id="logo75" src="public/images/logo75.png">';} 
			elseif($_GET['idDept'] == "91"){echo '<img alt="essonne" id="logo91" src="public/images/logo91.png">';} 
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
				<td><?= htmlspecialchars(round($nounou->note())); ?>/10</td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>	
<?php $content = ob_get_clean(); ?>

<?php require("views/template.php"); ?>