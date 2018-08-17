<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<meta name="description" content=""/>
	<meta name="keywords" content=""/>
	<meta name="twitter:card" content="summary"/>
	<meta name="twitter:url" content=""/>
	<meta name="site" content=""/>
	<meta property="og:title" content=""/>
	<meta property="og:description" content=""/>
	<meta property="og:type" content="website"/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<link rel="icon" type="image/png" href="" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
	<link rel="stylesheet" type="text/css" href="public/css/style.css">
	<title>Le coin des Nounous</title>
</head>
<body>

<div id="menu">
	<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
		<a class="navbar-brand" href="index.php">Accueil</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarCollapse">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item">
					<a class="nav-link" href="#">Comment ca marche ?</a>
				</li>
				<?php if(!isset($_SESSION['profil'])) { ?>
				<li class="nav-item">
					<a class="nav-link" href="index.php?action=newNounouForm">Inscription Nounou</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="index.php?action=newParentForm">Inscription Parent</a>
				</li>
				<!--<li class="nav-item">
					<a class="nav-link" href="index.php?action=login">Connexion</a>
				</li>-->
				<?php } ?>
				<li class="nav-item">
					<a class="nav-link" href="index.php?action=contactUs">Nous contacter</a>
				</li>
				<?php if(isset($_SESSION['pseudo'])) { ?>
				<li class="nav-item">
					<a class="nav-link" href="index.php?action=<?= $_SESSION['profil'] ?>Profil&amp;pseudo=<?= $_SESSION['pseudo']?>">Bonjour <?= $_SESSION['pseudo']; ?> (<?= $_SESSION['profil']; ?>)</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="index.php?action=logout">Déconnexion</a>
				</li>
				<?php } ?>


<!--
				<?php if(isset($_SESSION['profil']) && $_SESSION['profil'] == 'parent') { ?>
				<li class="nav-item">
					<a class="nav-link" href="index.php?action=parentProfil&amp;pseudo=<?= $_SESSION['pseudo']?>">Editer mon profil parent</a>	
				</li>
				<?php } elseif(isset($_SESSION['profil']) && $_SESSION['profil'] == 'nounou') {  ?>
				<li class="nav-item">
					<a class="nav-link" href="index.php?action=nounouProfil">Editer mon profil nounou</a>	
				</li>
				<?php } ?>
-->



			</ul>
		</div>
	</nav>
</div>

<section id="bloc_center">
	<div>
		<?= $content ?> 
 	</div>
</section>

<footer class="container-fluid" id="footer">
	
	<a class="nav-link" href="index.php?action=adminLogin">Admin</a>
	
</footer>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA51WQhNUScdgXw2n10l0xnPY4a5SpbMzE"></script>

<script src="public/js/listingCities.js"></script>
<script src="public/js/Carte.js"></script>
<script src="public/js/script.js" ></script>


</body>
</html>