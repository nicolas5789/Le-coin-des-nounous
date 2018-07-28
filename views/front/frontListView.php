

<?php ob_start(); ?>

	<?php foreach ($nounous as $nounou): ?>
	
		<table>
			<tr>
				<td>
					<p>Id :  <?= $nounou->id(); ?>   </p>
				</td>
				<td>
					<p>Pseudo : <?= $nounou->pseudo(); ?> </p>
				</td>
				<td>
					<p>Nom :  <?= $nounou->nom(); ?>    </p>
				</td>
				<td>
					<p>Prénom : <?= $nounou->prenom(); ?>     </p>
				</td>
				<td>
					<p>Email :  <?= $nounou->email(); ?>      </p>
				</td>
				<td>
					<p>Mot de passe : <?= $nounou->password(); ?>     </p>
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
					<p>Département de résidence :  <?= $nounou->departement(); ?>   </p>
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