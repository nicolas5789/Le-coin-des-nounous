

<?php ob_start(); ?>

<h1>Hello there !</h1>
<div id="accueil">
	<div id="departements">
		<div id="dept_col">

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

		</div>
	</div>

	
	<div id="notice">
		<p>Hey !</p>
	</div>


	<div id="departements">
		<div id="dept_col">

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

		</div>
	</div>

</div>
<?php $content = ob_get_clean(); ?>

<?php require("views/template.php"); ?>