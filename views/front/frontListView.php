<?php ob_start(); ?>

<h1>Liste des Nounou du département</h1>
	<?php foreach ($nounous as $nounou): ?>
	
		<table>
			<tr>
				<td>
					<p>Pseudo : <?= $nounou->pseudo(); ?> </p>
				</td>
				<td>
					<p>Expérience : <?= $nounou->experience(); ?>  </p>
				</td>
				<td>
					<p>Place(s) disponible(s) :  <?= $nb = $nounou->place_dispo(); ?>    </p>
				</td>
				<td>
					<p>Ville de résidence :  <?= $nounou->ville(); ?>    </p>
				</td>
				<td>
					<a href="index.php?action=showNounou&amp;idNounou= <?= $nounou->id(); ?>">Voir le profil</a>
				</td>
			</tr>

			
		</table>

		<hr>

	<?php endforeach; ?>

<?php $content = ob_get_clean(); ?>

<?php require("views/template.php"); ?>