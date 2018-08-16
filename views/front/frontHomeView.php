

<?php ob_start(); ?>

<div id="accueil">

	<div class="departements" id="dept_col1">
		<div class="dept" id="dept95">
			<a href="index.php?action=listNounous&amp;idDept=95">
				<span>Val d'Oise</span>
				<div class="logo_dept">
					<img src="public/images/logo95.png">
				</div>			
			</a>
		</div>
		<div class="dept" id="dept78">
			<a href="index.php?action=listNounous&amp;idDept=78">
				<span>Yvelines</span>
				<div class="logo_dept">
					<img src="public/images/logo78.png">
				</div>		
			</a>
		</div>
		<div class="dept" id="dept92">
			<a href="index.php?action=listNounous&amp;idDept=92">
				<span>Hauts de Seine</span>
				<div class="logo_dept">
					<img src="public/images/logo92.png">
				</div>
				
			</a>
		</div>
		<div class="dept" id="dept75">
			<a href="index.php?action=listNounous&amp;idDept=75">
				<span>Paris</span>
				<div class="logo_dept">
					<img src="public/images/logo75.png">
				</div>	
			</a>
		</div>
	</div>



	<div id="notice">
		<h1>Le coin des nounous</h1>
		<p>Bienvenue, vous cherchez à faire garder votre enfant...Mais comment trouver la nounou idéale ?</p>
		<div id="img_accueil">
			<img src="public/images/mainsEnfants.jpg">
		</div>
		<p>Afin de découvrir les nounous qui vous correspondent, connectez-vous, ou inscrivez-vous, puis cliquez votre département.</p>

		<div id="formulaire_connexion" style="text-align: center;">
			
		    <form action="index.php?action=connect" method="POST">
		        <label for="pseudo"> Pseudo  : <input type="text" name="pseudo" id="pseudo" required> </label> <br/> 
		        <label for="password"> Mot de passe : <input type="password" name="password" id="password" required> </label>  <br/> 
		        <input type="submit" value="M'identifier"/> 
		        <a href="index.php?action=logout">Me déconnecter</a>     
		    </form>

		    <div id="connectHome_message">
			    <?php if(isset($_SESSION['connect_message'])) { ?>
			    	<p> <?= $_SESSION['connect_message'] ?> </p>
				<?php } ?>
			</div>

		</div>
	</div>



	<div class="departements" id="dept_col2">
		<div class="dept" id="dept93">
			<a href="index.php?action=listNounous&amp;idDept=93">
				<span>Seine Saint Denis</span>
				<div class="logo_dept">
					<img src="public/images/logo93.png">
				</div>	
			</a>
		</div>
		<div class="dept" id="dept94">
			<a href="index.php?action=listNounous&amp;idDept=94">
				<span>Val de Marne</span>
				<div class="logo_dept">
					<img src="public/images/logo94.png">
				</div>		
			</a>
		</div>
		<div class="dept" id="dept77">
			<a href="index.php?action=listNounous&amp;idDept=77">
				<span>Seine et Marne</span>
				<div class="logo_dept">
					<img src="public/images/logo77.png">
				</div>	
			</a>
		</div>
		<div class="dept" id="dept91">
			<a href="index.php?action=listNounous&amp;idDept=91">
				<span>Seine et Marne</span>
				<div class="logo_dept">
					<img src="public/images/logo91.png">
				</div>	
			</a>
		</div>
	</div>
	

</div>
<?php $content = ob_get_clean(); ?>

<?php require("views/template.php"); ?>