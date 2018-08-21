<?php ob_start(); ?>

<div class="container">
    <div class="py-5 text-center">
        <div id="logo_form">
            <img alt="logo_parent" src="public/images/parents.gif">  
        </div>
        <h2>Editer un profil PARENT</h2>
    </div>
</div>

<?php if(isset($_SESSION['editParent_message'])) {
        echo $_SESSION['editParent_message'];
    } ?>

<div style="text-align: center;">
    <div class="formulaire_profil" id="adminEditParentForm">
        <form action="index.php?action=adminUpdateParent&amp;pseudo=<?= htmlspecialchars($parent->pseudo()); ?>" method="POST">
            <label for="pseudo"> Pseudo  : <input type="text" name="pseudo" id="pseudo" required value="<?= htmlspecialchars($parent->pseudo()); ?>"> </label> <br/> 
            <label for="nom"> Nom  : <input type="text" name="nom" id="nom" required value="<?= htmlspecialchars($parent->nom()); ?>"> </label> <br/> 
            <label for="prenom"> Prenom  : <input type="text" name="prenom" id="prenom" required value="<?= htmlspecialchars($parent->prenom()); ?>"> </label> <br/> 
            <label for="email"> Modifier l'adresse email  : <input type="email" name="email" id="email" required value="<?= htmlspecialchars($parent->email()); ?>"> </label> <br/> 
            <label for="confirm_email"> Confirmation adresse email  : <input type="email" name="confirm email" id="confirm_email" required value="<?= htmlspecialchars($parent->email()); ?>"> </label> <br/> 
            <label for="departement"> Département  : 
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
            </label> <br/> 
            <label for="ville"> Ville : 
                <select class="cityContainer" name="ville" id="ville" required> 
                    <option><?= htmlspecialchars($parent->ville()); ?></option>
                </select>
            </label>  <br/> 
            <input class="btn btn-primary" type="submit" value="Envoyer"/>      
        </form>
    </div>
    <hr>
    <div class="formulaire_profil" id="adminUpdatePassword">
        <?php if(isset($_SESSION['editPasswordParent'])) {echo $_SESSION['editPasswordParent'];} ?>
        <h2>Modifier le mot de passe du profil</h2>
        <form action="index.php?action=updatePasswordParent&amp;pseudo=<?= htmlspecialchars($parent->pseudo()); ?>" method="POST">
            <label for="password"> Changer le mot de passe : <input class="form-control" type="password" name="password" id="password" required> </label>  <br/> 
            <label for="confirm_password"> Confirmation mot de passe  : <input class="form-control" type="password" name="confirm password" id="confirm_password" required> </label> <br/> 
            <input class="btn btn-primary" type="submit" value="Modifier le mot de passe" onclick="return confirm('Etes-vous sûr de vouloir modifier ce mot de passe ?');">  
        </form>
    </div>
    <a id="deleteProfil" class="btn btn-danger" href="index.php?action=adminDeleteParent&amp;pseudo=<?= htmlspecialchars($parent->pseudo()); ?>" onclick="return confirm('Etes-vous sûr de vouloir supprimer ce profil ?');">Supprimer ce profil</a>  
</div>

<?php $content = ob_get_clean(); ?>

<?php require("views/template.php"); ?>