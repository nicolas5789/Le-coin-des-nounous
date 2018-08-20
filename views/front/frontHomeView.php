<?php ob_start(); ?>

<div id="accueil">
	<div id="presentation">
		<h1>Le coin des Nounous</h1>
		<div id="carouselPresentation" class="carousel slide" data-ride="carousel">
			<ol class="carousel-indicators">
				<li data-target="#carouselPresentation" data-slide-to="0" class="active"></li>
				<li data-target="#carouselPresentation" data-slide-to="1"></li>
				<li data-target="#carouselPresentation" data-slide-to="2"></li>
			</ol>
			<div class="carousel-inner">
				<div class="carousel-item active">
					<img class="d-block w-100" src="public/images/slide1.jpg" alt="First slide">
				</div>
				<div class="carousel-item">
					<img class="d-block w-100" src="public/images/slide2.png" alt="Second slide">
				</div>
				<div class="carousel-item">
					<img class="d-block w-100" src="public/images/slide3.png" alt="Third slide">
				</div>
			</div>
			<a class="carousel-control-prev" href="#carouselPresentation" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next" href="#carouselPresentation" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
	</div>

	<div id="notice">
			<div class="notice-type" id="notice_head">
				<h1>Le coin des Nounous</h1>
				<p>Bienvenue, vous cherchez à faire garder votre enfant...Mais comment trouver la nounou idéale ?</p>
				<div id="img_accueil">
					<img src="public/images/mainsEnfants.jpg">
				</div>
				<p>Afin de découvrir les nounous qui vous correspondent, connectez-vous, ou inscrivez-vous, puis cliquez votre département.</p>
			</div>
			<div id="ancreConnect"></div>
			<div id="connectHomeRight">
				<div class="notice-type" id="formulaire_connexion" style="text-align: center;">
					<h2>Connexion</h2>
				    <form action="index.php?action=connect" method="POST">
				    	<div class="form-group">
				        	<label for="pseudo"> Pseudo  :  </label>
				        	<input class="form-control" type="text" name="pseudo" id="pseudo" required> 
				        </div>
				        <div class="form-group">
				        	<label for="password"> Mot de passe :  </label>
				        	<input class="form-control" type="password" name="password" id="password" required>  
				        </div> 
				        <div class="form-group">
				        	<input class="btn btn-primary" type="submit" value="M'identifier"/> 
				        	<a class="btn btn-primary" href="index.php?action=logout">Me déconnecter</a>  
				        </div>   
				    </form>

				    <?php if(isset($_SESSION['connect_message'])) { ?>
				    	<div class="notice-type" id="connectHome_message">
				    		<p> <?= $_SESSION['connect_message'] ?> </p>
				    	</div>
					<?php } ?>
				</div>

				<div class="notice-type" id="inscriptions">
					<h2>Pas encore inscrit ?</h2>
					<p>Choisissez votre profil et créez votre compte.</p>
				    <a class="btn btn-primary" href="index.php?action=newParentForm">Créer un compte Parent</a> <br/>
				    <a class="btn btn-primary" href="index.php?action=newNounouForm">Créer un compte Nounou</a> 	
				</div>
			</div>
		</div>

	<div id="dept_login">
		<div class="notice-type" id="dept_choice">
			<p>Choisissez un département</p>
		</div>
		<div class="departements" id="dept_col1">
			<a class="dept" href="index.php?action=listNounous&amp;idDept=95">
				<img id="logo95" src="public/images/logo95.png">	
			</a>
			<a class="dept" href="index.php?action=listNounous&amp;idDept=78">
				<img id="logo78" src="public/images/logo78.png">	
			</a>
			<a class="dept" href="index.php?action=listNounous&amp;idDept=92">
				<img id="logo92" src="public/images/logo92.png">	
			</a>
			<a class="dept" href="index.php?action=listNounous&amp;idDept=75">
				<img id="logo75" src="public/images/logo75.png">	
			</a>
		</div>

		<div class="departements" id="dept_col2">
			<a class="dept" href="index.php?action=listNounous&amp;idDept=93">
				<img id="logo93" src="public/images/logo93.png">	
			</a>
			<a class="dept" href="index.php?action=listNounous&amp;idDept=94">
				<img id="logo94" src="public/images/logo94.png">	
			</a>
			<a class="dept" href="index.php?action=listNounous&amp;idDept=77">
				<img id="logo77" src="public/images/logo77.png">	
			</a>
			<a class="dept" href="index.php?action=listNounous&amp;idDept=91">
				<img id="logo91" src="public/images/logo91.png">	
			</a>
		</div>	
	</div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require("views/template.php"); ?>