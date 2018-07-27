

<?php ob_start(); ?>

<h1>Hello there !</h1>
<div id="departements">
	<a href="index.php?action=listNounous&amp;idDept=95">Val d'Oise</a>
	<a href="index.php?action=listNounous&amp;idDept=78">Yvelines</a>
	<a href="index.php?action=listNounous&amp;idDept=92">Hauts de Seine</a>
	<a href="index.php?action=listNounous&amp;idDept=75">Paris</a>
	<a href="index.php?action=listNounous&amp;idDept=93">Seine Saint Denis</a>
	<a href="index.php?action=listNounous&amp;idDept=94">Val de Marne</a>
	<a href="index.php?action=listNounous&amp;idDept=77">Seine et Marne</a>
</div>

<?php $content = ob_get_clean(); ?>

<?php require("views/template.php"); ?>