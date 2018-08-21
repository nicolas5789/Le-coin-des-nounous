<?php ob_start(); ?>

<div class="container">
    <div class="py-5 text-center">
        <div id="logo_form">
            <img alt="logo_parents" src="public/images/parents.gif">  
        </div>
        <h2>Mon profil PARENT</h2>
        <p class="lead">Modifier les champs si besoin</p>
    </div>
</div>

<div class="formulaire_profil" id="formulaire_newParent" style="text-align: right;">
    <form action="index.php?action=editParent" method="POST">
        <table>
            <tr>
                <td>
                    <label for="pseudo"> Pseudo  :</label> 
                </td>
                <td>
                    <input class="form-control" type="text" name="pseudo" id="pseudo" required value="<?= htmlspecialchars($parent->pseudo()); ?>"> 
                </td>
            </tr>
            <tr>
                <td>
                    <label for="nom"> Nom  : </label> 
                </td>
                <td>
                    <input class="form-control" type="text" name="nom" id="nom" required value="<?= htmlspecialchars($parent->nom()); ?>"> 
                </td>
            </tr>
            <tr>
                <td>
                    <label for="prenom"> Prenom  : </label> 
                </td>
                <td>
                    <input class="form-control" type="text" name="prenom" id="prenom" required value="<?= htmlspecialchars($parent->prenom()); ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="email"> Mofifier mon Adresse email  : </label> 
                </td>
                <td>
                    <input class="form-control" type="email" name="email" id="email" required value="<?= htmlspecialchars($parent->email()); ?>">
                </td>
            </tr>
            <tr>
                <td>
                   <label for="confirm_email"> Confirmation adresse email  : </label> 
                </td>
                <td>
                    <input class="form-control" type="email" name="confirm email" id="confirm email" required value="<?= htmlspecialchars($parent->email()); ?>">
                </td>
            </tr>
            <tr>
                <td>
                   <label for="departement"> Département  : </label> 
                </td>
                <td>
                    <select class="deptSelect" required name="departement" id="departement">
                    <option <?php if($parent->departement()=="75"){echo "selected";} ?> value="75">Paris</option>
                    <option <?php if($parent->departement()=="78"){echo "selected";} ?> value="78">Yvelines</option>
                    <option <?php if($parent->departement()=="91"){echo "selected";} ?> value="91">Essonne</option>
                    <option <?php if($parent->departement()=="92"){echo "selected";} ?> value="92">Hauts de Seine</option>
                    <option <?php if($parent->departement()=="93"){echo "selected";} ?> value="93">Seine Saint Denis</option>
                    <option <?php if($parent->departement()=="94"){echo "selected";} ?> value="94">Val de Marne</option>
                    <option <?php if($parent->departement()=="95"){echo "selected";} ?> value="95">Val d'Oise</option>
                    <option <?php if($parent->departement()=="77"){echo "selected";} ?> value="77">Seine et Marne</option>
                </select> 
                </td>
            </tr>
            <tr>
                <td>
                   <label for="ville"> Ville : </label> 
                </td>
                <td>
                    <select class="cityContainer" type="text" name="ville" id="ville" required> 
                    <option><?= htmlspecialchars($parent->ville()); ?></option>
                </select>
                </td>
            </tr>
        </table>
        <input id="modifParentBouton" class="btn btn-primary" type="submit" value="Enregistrer"/>
    </form> 
    <?php if(isset($_SESSION['editParent_message'])) {echo $_SESSION['editParent_message'];} ?>
</div>

<hr>

<div class="formulaire_profil" id="updatePassword">
    <?php if(isset($_SESSION['editPasswordParent'])) {echo $_SESSION['editPasswordParent'];} ?>
    <form action="index.php?action=updatePasswordParent&amp;pseudo=<?= htmlspecialchars($parent->pseudo()); ?>" method="POST">
        <label for="password"> Définir mon mot de passe : <input class="form-control" type="password" name="password" id="password" required> </label>  <br/> 
        <label for="confirm_password"> Confirmation mot de passe  : <input class="form-control" type="password" name="confirm password" id="confirm password" required> </label> <br/> 
        <input class="btn btn-primary" type="submit" value="Modifier le mot de passe" onclick="return confirm('Etes-vous sûr de vouloir modifier votre mot de passe ?');">  
    </form>
    <a id="deleteProfil" class="btn btn-danger" href="index.php?action=deleteParent" onclick="return confirm('Etes-vous sûr de vouloir supprimer votre profil ?');">Supprimer mon profil</a> <br/>
</div>


<?php $content = ob_get_clean(); ?>

<?php require("views/template.php"); ?>