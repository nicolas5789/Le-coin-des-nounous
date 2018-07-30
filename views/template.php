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
	<link rel="stylesheet" type="text/css" href="public/css/style.css">
	<title>Le coin des Nounous</title>
</head>
<body>

<section id="menu">
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
				<li class="nav-item">
					<a class="nav-link" href="index.php?action=newNounouForm">Inscription Nounou</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="index.php?action=newParentForm">Inscription Parent</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="index.php?action=login">Connexion</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Nous contacter</a>
				</li>
			</ul>
		</div>
	</nav>
</section>

<section id="bloc_center">
	<div>
		<?= $content ?> 
 	</div>
</section>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDZJA9lR171Aipsh0rO3KoASV6ywmwImPA"></script>

<script src="public/js/Carte.js"></script>
<script src="public/js/script.js" ></script>


</body>
</html>