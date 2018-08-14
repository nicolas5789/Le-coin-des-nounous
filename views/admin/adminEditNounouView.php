<?php ob_start(); ?>

<div class="container">
    <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
        <h2>Editer un profil NOUNOU</h2>
    </div>
</div>

<?php if(isset($_SESSION['editNounou_message'])) {
        echo $_SESSION['editNounou_message'];
    } ?>

<div id="formulaire_newParent" style="text-align: center;">
    <form action="index.php?action=adminUpdateNounou&amp;pseudo=<?= $nounou->pseudo(); ?>" method="POST">

        <label for="pseudo"> Pseudo  : <input type="text" name="pseudo" id="pseudo" required value="<?= $nounou->pseudo(); ?>"> </label> <br/> 
        <label for="nom"> Nom  : <input type="text" name="nom" id="nom" required value="<?= $nounou->nom(); ?>"> </label> <br/> 
        <label for="prenom"> Prenom  : <input type="text" name="prenom" id="prenom" required value="<?= $nounou->prenom(); ?>"> </label> <br/> 
        <label for="email"> Mofifier mon Adresse email  : <input type="email" name="email" id="email" required value="<?= $nounou->email(); ?>"> </label> <br/> 
        <label for="confirm_email"> Confirmation adresse email  : <input type="email" name="confirm email" id="confirm email" required value="<?= $nounou->email(); ?>"> </label> <br/> 
        <label for="password"> Définir mon mot de passe : <input type="password" name="password" id="password" required> </label>  <br/> 
        <label for="confirm_password"> Confirmation mot de passe  : <input type="password" name="confirm password" id="confirm password" required> </label> <br/> 

        <label for="experience"> Expérience  : <input type="number" name="experience" id="experience" required value="<?= $nounou->experience(); ?>"> </label> <br/> 
        <label for="place_dispo"> Place(s) disponible(s)  : <input type="number" name="place_dispo" id="place_dispo" required value="<?= $nounou->place_dispo(); ?>"> </label> <br/> 

        <label for="departement"> Département  : 
            <select class="deptSelect" required name="departement" id="departement">
                <option <?php if($nounou->departement()=="75"){echo "selected";} ?> value="75">Paris</option>
                <option <?php if($nounou->departement()=="78"){echo "selected";} ?> value="78">Yvelines</option>
                <option <?php if($nounou->departement()=="91"){echo "selected";} ?> value="91">Essonne</option>
                <option <?php if($nounou->departement()=="92"){echo "selected";} ?> value="92">Hauts de Seine</option>
                <option <?php if($nounou->departement()=="93"){echo "selected";} ?> value="93">Seine Saint Denis</option>
                <option <?php if($nounou->departement()=="94"){echo "selected";} ?> value="94">Val de Marne</option>
                <option <?php if($nounou->departement()=="95"){echo "selected";} ?> value="95">Val d'Oise</option>
                <option <?php if($nounou->departement()=="77"){echo "selected";} ?> value="77">Seine et Marne</option>
            </select> 
        </label> <br/> 


        <label for="ville"> Ville : 
            <select class="cityContainer" type="text" name="ville" id="ville" required> 
                <option><?= $nounou->ville(); ?></option>
            </select>
        </label>  <br/> 
     
        <input type="submit" value="Envoyer"/>      

    </form>

        <a href="index.php?action=adminDeleteNounou&amp;idNounou=<?= $nounou->id(); ?>">Supprimer ce profil</a>
      

</div>


<div id="avis_nounou">
	<h2>Les avis des parents</h2>

	<table id="table_avis">
		<tr>
			<th>Pseudo</th>
			<th>Commentaires</th>
			<th>Notes</th>
			<th>Nb de signalement(s)</th>
			<th>Valider</th>
			<th>Supprimer</th>
		</tr>
		
		<?php foreach($listingAvis as $avis): ?>
			<tr>
				<form action="index.php?action=adminEditAvis&amp;idAvis=<?= $avis->id(); ?>&amp;idNounou=<?= $avis->id_nounou(); ?>" method="POST">
					<td><label for="pseudo"><input type="text" name="pseudo" id="pseudo" value="<?= $avis->pseudo_parent(); ?>" required> </label></td>
					<td><label for="contenu"><input type="text" name="contenu" id="contenu" value="<?= $avis->contenu(); ?>" required> </label></td>
					<td>
						<label for="departement"> 
							<select required name="note" id="note">
								<option value="" selected disabled hidden>Modifier la note ici</option>
								<option <?php if($avis->note()=="1"){echo "selected";} ?> >1</option>
								<option <?php if($avis->note()=="2"){echo "selected";} ?> >2</option>
								<option <?php if($avis->note()=="3"){echo "selected";} ?> >3</option>
								<option <?php if($avis->note()=="4"){echo "selected";} ?> >4</option>
								<option <?php if($avis->note()=="5"){echo "selected";} ?> >5</option>
								<option <?php if($avis->note()=="6"){echo "selected";} ?> >6</option>
								<option <?php if($avis->note()=="7"){echo "selected";} ?> >7</option>
								<option <?php if($avis->note()=="8"){echo "selected";} ?> >8</option>
								<option <?php if($avis->note()=="9"){echo "selected";} ?> >9</option>
								<option <?php if($avis->note()=="10"){echo "selected";} ?> >10</option>
							</select> 
						</label>
					</td>
					<td><?= $avis->signalement(); ?></td>
					<td><input type="submit" value="Valider"/></td>  
					<td><a href="index.php?action=adminDeleteAvis&amp;idAvis=<?= $avis->id(); ?>&amp;idNounou=<?= $avis->id_nounou(); ?>">Supprimer</a></td>
				</form>
			</tr>
		<?php endforeach ?>	

	</table>
	
</div>

<h2><a href="index.php?action=adminLogin">Revenir au Panel</a></h2>
	
<?php $content = ob_get_clean(); ?>

<?php require("views/template.php"); ?>