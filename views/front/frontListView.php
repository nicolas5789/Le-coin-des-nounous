<?php ob_start(); ?>

<div id="frontlistview">
	<div class="dept" id="dept_list">
		<?php 
			if($_GET['idDept'] == "77"){echo '<img src="public/images/logo77.png">';} 
			elseif($_GET['idDept'] == "78"){echo '<img src="public/images/logo78.png">';} 
			elseif($_GET['idDept'] == "92"){echo '<img src="public/images/logo92.png">';} 
			elseif($_GET['idDept'] == "94"){echo '<img src="public/images/logo94.png">';} 
			elseif($_GET['idDept'] == "95"){echo '<img src="public/images/logo95.png">';} 
			elseif($_GET['idDept'] == "93"){echo '<img src="public/images/logo93.png">';} 
			elseif($_GET['idDept'] == "75"){echo '<img src="public/images/logo75.png">';} 
			elseif($_GET['idDept'] == "91"){echo '<img src="public/images/logo91.png">';} 
		?>
	</div>

	<h2>Liste des Nounou du département</h2>
	<p>Cliquez sur un pseudo pour découvrir le profil complet.</p>
	<table class="table_pag" id="table_nounous">
		<thead>
			<tr>
				<th>Pseudo</th>
				<th>Expérience</th>
				<th>Place(s) disponible(s)</th>
				<th>Ville de résidence</th>
				<th>Note moyenne</th>
				<!--<th>Profil</th>-->
			</tr>
		</thead>
		<tbody>
			<?php foreach ($nounous as $nounou): ?>
			<tr>
				
				<td><a href="index.php?action=showNounou&amp;idNounou= <?= $nounou->id(); ?>"><?= $nounou->pseudo(); ?></a></td>
				<!--<td><?= $nounou->pseudo(); ?></td>-->
				<td><?= $nounou->experience(); ?> an(s)</td>
				<td><?= $nounou->place_dispo(); ?></td>
				<td><?= $nounou->ville(); ?></td>
				<td><?= $nounou->note(); ?>/10</td>
				<!--<td><a href="index.php?action=showNounou&amp;idNounou= <?= $nounou->id(); ?>">Découvrir</a></td>-->
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>	
<?php $content = ob_get_clean(); ?>

<?php require("views/template.php"); ?>