<?php ob_start(); ?>

<div id="profil_nounou">
	<div id="infos_nounou">	
		<h1>Profil de <?= $nounou->pseudo(); ?></h1>

		<p>Expérience : <?= $nounou->experience(); ?> an(s)  </p>

		<p>Place(s) disponible(s) :  <?= $nounou->place_dispo(); ?>    </p>

		<p>Ville de résidence :  <span id="address"><?= $nounou->ville(); ?></span>   </p>

		<p>Département de résidence :  
			<?php if ($nounou->departement() == "77"){echo "Seine et Marne";} ?>   
			<?php if ($nounou->departement() == "78"){echo "Yvelines";} ?> 
			<?php if ($nounou->departement() == "91"){echo "Essonne";} ?> 
			<?php if ($nounou->departement() == "92"){echo "Hauts de Seine";} ?> 
			<?php if ($nounou->departement() == "93"){echo "Seine Saint Denis";} ?> 
			<?php if ($nounou->departement() == "94"){echo "Val de Marne";} ?> 
			<?php if ($nounou->departement() == "95"){echo "Val d'Oise";} ?> 
			<?php if ($nounou->departement() == "75"){echo "Paris";} ?> 
		</p>

		<p> Note moyenne de <?= $nounou->pseudo(); ?> : <?php echo $noteMoyenne['AVG(note)']; ?> </p>

		<p><a class="btn btn-info" href="index.php?action=reportNounou&amp;idNounou=<?= $nounou->id(); ?>">Signaler le profil</a></p>

	</div>

<div id="map"></div>

</div>

<hr>

<div id="avis_nounou">
	<h2>Les avis des parents</h2>

	<table class="table_pag" id="table_avis">
		<thead>
			<tr>
				<th>Pseudo</th>
				<th>Commentaires</th>
				<th>Notes</th>
				<th>Signaler</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($listingAvis as $avis): ?>
				<tr>
					<td> <?= $avis->pseudo_parent() ?></td>
					<td> <?= $avis->contenu() ?></td>
					<td> <?= $avis->note() ?>/10</td>
					<td><a class="btn btn-info" href="index.php?action=reportAvis&amp;idAvis=<?= $avis->id(); ?>&amp;idNounou=<?= $nounou->id(); ?>">Signaler cet avis</a></td>
				</tr>
			<?php endforeach ?>	
		</tbody>
	</table>
</div>

<hr>

<div id="contact_avis_nous">
	<?php if(isset($_SESSION['profil']) && $_SESSION['profil'] == "parent") { ?>
		

		<div id="avis_part">
			<div id="forms_avis">
				<?php if(isset($_SESSION['avis']) && $_SESSION['avis'] == "clear") { ?>
					<div id="set_avis_nounou">
						<h2>Notez votre nounou</h2>
						<div class="formulaire_avis">
							<?php if(isset($_SESSION['notice_avis'])){echo $_SESSION['notice_avis'];} ?>
			    			<form action="index.php?action=addAvis&amp;id=<?= $nounou->id(); ?>)" method="POST">
								<label for="departement"> Note  : 
									<select required name="note" id="note">
										<option>1</option>
										<option>2</option>
										<option>3</option>
										<option>4</option>
										<option>5</option>
										<option>6</option>
										<option>7</option>
										<option>8</option>
										<option>9</option>
										<option>10</option>
									</select> 
								</label> 
								<div class="form-group">
									<label> Commentaire : <textarea class="form-control" name="contenu" id="contenu" rows="2" cols="50" placeholder="Donnez votre avis ici..." required></textarea> </label>
								</div>
			        			<input class="btn btn-primary" type="submit" value="Envoyer"/>      
			    			</form>
						</div>
					</div>
				<?php } else { ?>
					<div>
						<h3>Votre avis :</h3>
						<div class="formulaire_avis" >
							<?php if(isset($_SESSION['notice_avis'])){echo $_SESSION['notice_avis'];} ?>
			    			<form action="index.php?action=updateAvis&amp;id=<?= $nounou->id(); ?>)" method="POST">
									<label for="departement"> Modifier ma note  : 
										<select required name="note" id="note">
											<option <?php if($avisOnFile->note()=="1"){echo "selected";} ?> >1</option>
											<option <?php if($avisOnFile->note()=="2"){echo "selected";} ?> >2</option>
											<option <?php if($avisOnFile->note()=="3"){echo "selected";} ?> >3</option>
											<option <?php if($avisOnFile->note()=="4"){echo "selected";} ?> >4</option>
											<option <?php if($avisOnFile->note()=="5"){echo "selected";} ?> >5</option>
											<option <?php if($avisOnFile->note()=="6"){echo "selected";} ?> >6</option>
											<option <?php if($avisOnFile->note()=="7"){echo "selected";} ?> >7</option>
											<option <?php if($avisOnFile->note()=="8"){echo "selected";} ?> >8</option>
											<option <?php if($avisOnFile->note()=="9"){echo "selected";} ?> >9</option>
											<option <?php if($avisOnFile->note()=="10"){echo "selected";} ?> >10</option>
										</select> 
									</label> 
								<div class="form-group">
									<label> Commentaire : <textarea class="form-control" name="contenu" id="contenu" rows="2" cols="50" required> <?= $avisOnFile->contenu() ?> </textarea> </label> <br/>
			        				<input class="btn btn-primary" type="submit" value="Modifier mon avis"/>  
			        				<a class="btn btn-danger" href="index.php?action=deleteAvis&amp;idAvis=<?= htmlspecialchars($avisOnFile->id()); ?>&amp;idNounou=<?= htmlspecialchars($avisOnFile->id_nounou()); ?>" onclick="return confirm('Etes-vous sûr de vouloir supprimer votre avis ?');">Supprimer mon avis</a>  
			        			</div>
			    			</form>
						</div>
					</div>
				<?php } ?>
			</div>

			<div id="text_advice_avis" >
				<p>	Rappel : <br/>
					Vous pouvez laisser une note et un commentaire cette nounou. Les avis doivent avant tout être utile et dans le respect de chacun. Si avis vous semble inaproprié, n'hésitez pas à le signaler.
				</p>
			</div>

		</div>

		<hr>

		<div id="form_mail_nounou">
		    <div class="form-area">  
		        <form action="index.php?action=mailToNounou&amp;idNounou=<?= $nounou->id(); ?>" method="POST">
                    <h3>Contacter la nounou</h3>
    				<div class="form-group">
						<label for="email_nounou">Email de <?= $nounou->pseudo(); ?> : <input class="form-control" type="text" name="email_nounou" value="<?= $nounou->email(); ?>" required readonly></label>
					</div>
					<div class="form-group">
						<label for="pseudo_parent">Votre Pseudo <input class="form-control" type="text" name="pseudo_parent" value="<?= $parent->pseudo(); ?>" required readonly></label>
					</div>
					<div class="form-group">
						<label for="email_parent">Votre Email <input class="form-control" type="text" name="email_parent" value="<?= $parent->email(); ?>" required readonly></label>
					</div>
                    <div class="form-group">
                    	<label for="message">Votre message : <textarea rows="7" class="form-control" type="text" name="message" placeholder="Tapez votre message ici" required></textarea></label>                 
                    </div>
                    <input class="btn btn-primary" type="submit" value="Envoyer votre message">
		        </form>
		        <?php if(isset($_SESSION['info_message'])){ echo $_SESSION['info_message']; } ?>
		    </div>
		</div>




	<?php } else { ?>
		<div id="invit_connect">
			<p>Rendez-vous à l'<a href="index.php?action=login">accueil</a> pour vous connecter et accèder à toutes les fonctionnalités.</p>
		</div>
	<?php } ?>

</div>


<div id="return_home">
	<a class="btn btn-primary" href="index.php?action=home">Retourner à l'accueil</a>
</div>




	

<?php $content = ob_get_clean(); ?>

<?php require("views/template.php"); ?>