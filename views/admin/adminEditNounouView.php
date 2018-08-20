<?php ob_start(); ?>

<div class="container">
    <div class="py-5 text-center">
        <div id="logo_form">
            <img src="public/images/parents.gif">  
        </div>
        <h2>Editer un profil NOUNOU</h2>
    </div>
</div>

<?php if(isset($_SESSION['editNounou_message'])) { echo $_SESSION['editNounou_message']; } ?>

<div class="formulaire_profil" id="formulaire_newParent" style="text-align: center;">
    <form action="index.php?action=adminUpdateNounou&amp;pseudo=<?= $nounou->pseudo(); ?>" method="POST">
        <table>
                <tr>
                    <td>
                        <label for="pseudo">Pseudo  : </label> 
                    </td>
                    <td>
                        <input class="form-control" type="text" name="pseudo" id="pseudo_nounou" value="<?= htmlspecialchars($nounou->pseudo()); ?>" required> 
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="nom">Nom  : </label> 
                    </td>
                    <td>
                        <input class="form-control" type="text" name="nom" id="nom" value="<?= htmlspecialchars($nounou->nom()); ?>" required> 
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="prenom">Prenom  : </label> 
                    </td>
                    <td>
                        <input class="form-control" type="text" name="prenom" id="prenom" value="<?= htmlspecialchars($nounou->prenom()); ?>" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="email">Adresse email  : </label> 
                    </td>
                    <td>
                        <input class="form-control" type="email" name="email" id="email" value="<?= htmlspecialchars($nounou->email()); ?>" required>
                    </td>
                </tr>
                <tr>
                    <td>
                       <label for="confirm_email">Confirmation adresse email  : </label> 
                    </td>
                    <td>
                        <input  class="form-control" type="email" name="confirm email" id="confirm email" value="<?= htmlspecialchars($nounou->email()); ?>" required>
                    </td>
                </tr>
                <tr>
                    <td>
                       <label for="experience">Année(s) d'expérience  : </label> 
                    </td>
                    <td>
                        <input class="form-control" type="number" name="experience" id="experience" value="<?= htmlspecialchars($nounou->experience()); ?>" required>
                    </td>
                </tr>
                <tr>
                    <td>
                       <label for="dispo">Place(s) disponible(s)  : </label> 
                    </td>
                    <td>
                        <input class="form-control" type="number" name="place_dispo" id="dispo" value="<?= htmlspecialchars($nounou->place_dispo()); ?>" required>
                    </td>
                </tr>
                <tr>
                    <td>
                       <label for="departement">Département  : </label> 
                    </td>
                    <td>
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
                    </td>
                </tr>
                <tr>
                    <td>
                       <label for="ville">Ville : </label> 
                    </td>
                    <td>
                        <select class="cityContainer" type="text" name="ville" id="ville" required> 
                            <option><?= htmlspecialchars($nounou->ville()); ?></option>
                        </select>
                    </td>
                </tr>
            </table>
        <input class="btn btn-primary" type="submit" value="Enregistrer"/>
    </form>
<hr>
    <div id="adminUpdatePassword">
        <?php if(isset($_SESSION['editPasswordNounou'])) {echo $_SESSION['editPasswordNounou'];} ?>
        <form action="index.php?action=updatePasswordNounou&amp;pseudo=<?= htmlspecialchars($nounou->pseudo()); ?>" method="POST">
            <label for="password"> Changer mot de passe : <input class="form-control" type="password" name="password" id="password" required> </label>  <br/> 
            <label for="confirm_password"> Confirmation mot de passe  : <input class="form-control" type="password" name="confirm password" id="confirm password" required> </label> <br/> 
            <input class="btn btn-primary" type="submit" value="Modifier le mot de passe" onclick="return confirm('Etes-vous sûr de vouloir modifier ce mot de passe ?');">  
        </form>
    </div>
    <a id="deleteProfil" class="btn btn-danger" href="index.php?action=adminDeleteNounou&amp;idNounou=<?= htmlspecialchars($nounou->id()); ?>" onclick="return confirm('Etes-vous sûr de vouloir supprimer ce profil ?');">Supprimer ce profil</a>
</div>

<div id="avis_nounou">
	<h2>Les avis des parents</h2>
	<table class="table_pag" id="table_avis">
		<thead>
            <tr>
    			<th class="respDesign">Pseudo</th>
    			<th>Commentaires</th>
    			<th class="respDesign">Notes</th>
    			<th class="respDesign">Signalement(s)</th>
    			<th>Valider</th>
    			<th>Supprimer</th>
    		</tr>
        </thead>
		<?php foreach($listingAvis as $avis): ?>
            <tbody>
    			<tr>
    				<form action="index.php?action=adminEditAvis&amp;idAvis=<?= htmlspecialchars($avis->id()); ?>&amp;idNounou=<?= htmlspecialchars($avis->id_nounou()); ?>" method="POST">
    					<td class="respDesign"><label for="pseudo"><input class="form-control" type="text" name="pseudo" id="pseudo" value="<?= $avis->pseudo_parent(); ?>" required> </label></td>
    					<td><label><textarea class="form-control" name="contenu" id="contenu" rows="2" cols="30" required><?= htmlspecialchars($avis->contenu()); ?></textarea> </label></td>
    					<td class="respDesign">
    						<label for="note"> 
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
    					<td class="respDesign"><?= htmlspecialchars($avis->signalement()); ?></td>
    					<td><input class="btn btn-primary" type="submit" value="Valider"/></td>  
    					<td><a class="btn btn-danger" href="index.php?action=adminDeleteAvis&amp;idAvis=<?= htmlspecialchars($avis->id()); ?>&amp;idNounou=<?= htmlspecialchars($avis->id_nounou()); ?>" onclick="return confirm('Etes-vous sûr de vouloir supprimer cet avis ?');">Supprimer</a></td>
    				</form>
    			</tr>
            </tbody>
		<?php endforeach ?>	
	</table>	
</div>

<h2><a class="btn btn-secondary" href="index.php?action=adminLogin">Revenir au Panel</a></h2>
	
<?php $content = ob_get_clean(); ?>

<?php require("views/template.php"); ?>