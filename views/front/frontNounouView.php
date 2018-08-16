<?php ob_start(); ?>

<div id="profil_nounou">
	<div id="infos_nounou">	
		<h1>Profil de <?= $nounou->pseudo(); ?></h1>

		<p>Expérience : <?= $nounou->experience(); ?> an(s)  </p>

		<p>Place(s) disponible(s) :  <?= $nounou->place_dispo(); ?>    </p>

		<p>Ville de résidence :  <span id="address"><?= $nounou->ville(); ?></span>   </p>

		<p>Département de résidence :  <?= $nounou->departement(); ?>   </p>

		<p> Note moyenne de <?= $nounou->pseudo(); ?> : <?php echo $noteMoyenne['AVG(note)']; ?> </p>

		<p><a href="index.php?action=reportNounou&amp;idNounou=<?= $nounou->id(); ?>">Signaler le profil</a></p>

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
					<td><a href="index.php?action=reportAvis&amp;idAvis=<?= $avis->id(); ?>&amp;idNounou=<?= $nounou->id(); ?>">Signaler cet avis</a></td>
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
			       				<label for="pseudo"> Votre pseudo  : <input type="text" name="pseudo" id="pseudo" value="<?= $_SESSION['pseudo']; ?>" disabled="disabled"> </label> <br/> 
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
								</label> <br/>
								<label> Commentaire : <textarea name="contenu" id="contenu" rows="2" cols="50" placeholder="Donnez votre avis ici..." required></textarea> </label> <br/>
			        			<input type="submit" value="Envoyer"/>      
			    			</form>
						</div>
					</div>
				<?php } else { ?>
					<div>

						<h3>Votre avis :</h3>
						<div class="formulaire_avis">
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
								</label> <br/>
								<label> Commentaire : <textarea name="contenu" id="contenu" required> <?= $avisOnFile->contenu() ?> </textarea> </label> <br/>
			        			<input type="submit" value="Modifier mon avis"/>  
			        			<a href="index.php?action=deleteAvis&amp;idAvis=<?= htmlspecialchars($avisOnFile->id()); ?>&amp;idNounou=<?= htmlspecialchars($avisOnFile->id_nounou()); ?>" onclick="return confirm('Etes-vous sûr de vouloir supprimer votre avis ?');">Supprimer mon avis</a>    
			    			</form>
						</div>
					</div>
				<?php } ?>
			</div>

			<div id="text_advice_avis">
				<p>
					Vous pouvez laisser une note et un commentaire cette nounou. Les avis doivent avant tout être utile et dans le respect de chacun. Si avis vous semble inaproprié, n'hésitez pas à le signaler.
				</p>
			</div>
			
		</div>



		<hr>

		<div id="contact_nounou">
	
<!--
			<h2>Contacter la nounou</h2>
			
			<form action="index.php?action=mailToNounou&amp;idNounou=<?= $nounou->id(); ?>" method="POST">
				<label for="email_nounou">Email de <?= $nounou->pseudo(); ?> : <input class="form-control" type="text" name="email_nounou" value="<?= $nounou->email(); ?>" required readonly></label>
				<label for="pseudo_parent">Votre Pseudo <input class="form-control" type="text" name="pseudo_parent" value="<?= $parent->pseudo(); ?>" required readonly></label>
				<label for="email_parent">Votre Email <input class="form-control" type="text" name="email_parent" value="<?= $parent->email(); ?>" required readonly></label>
				<label for="message">Votre message : <textarea class="form-control" type="text" name="message" placeholder="Tapez votre message ici" required></textarea></label>
				<input type="submit" value="Envoyer votre message">
			</form>

			<?php if(isset($_SESSION['info_message'])){ echo $_SESSION['info_message']; } ?>

		</div>
-->

		<div id="form_mail_nounou">
			    <div class="form-area">  
			        <form role="form">
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
	                    <input type="submit" value="Envoyer votre message">
			        </form>
			    </div>
			</div>
		</div>














	<?php } else { ?>
		<div id="invit_connect">
			<p><a href="index.php?action=login">Connectez-vous</a> comme parent pour obtenir les coordonnées de la nounou ou laisser un avis</p>
		</div>
	<?php } ?>
</div>







	

<?php $content = ob_get_clean(); ?>

<?php require("views/template.php"); ?>