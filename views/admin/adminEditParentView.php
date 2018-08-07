<?php ob_start(); ?>

<div class="container">
    <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
        <h2>Editer un profil PARENT</h2>
    </div>
</div>

<div id="formulaire_newParent" style="text-align: center;">
    <form action="index.php?action=adminUpdateParent&amp;pseudo=<?= $parent->pseudo(); ?>" method="POST">

        <label for="pseudo"> Pseudo  : <input type="text" name="pseudo" id="pseudo" required value="<?= $parent->pseudo(); ?>"> </label> <br/> 
        <label for="nom"> Nom  : <input type="text" name="nom" id="nom" required value="<?= $parent->nom(); ?>"> </label> <br/> 
        <label for="prenom"> Prenom  : <input type="text" name="prenom" id="prenom" required value="<?= $parent->prenom(); ?>"> </label> <br/> 
        <label for="email"> Mofifier mon Adresse email  : <input type="email" name="email" id="email" required value="<?= $parent->email(); ?>"> </label> <br/> 
        <label for="confirm_email"> Confirmation adresse email  : <input type="email" name="confirm email" id="confirm email" required value="<?= $parent->email(); ?>"> </label> <br/> 
        <label for="password"> Définir mon mot de passe : <input type="password" name="password" id="password" required> </label>  <br/> 
        <label for="confirm_password"> Confirmation mot de passe  : <input type="password" name="confirm password" id="confirm password" required> </label> <br/> 
        <label for="ville"> Ville : <input type="text" name="ville" id="ville" required value="<?= $parent->ville(); ?>"> </label>  <br/> 
        <p>Département enregistré : <?= $parent->departement(); ?></p>
        <label for="departement"> Mofifier le département  : 
            <select required name="departement" id="departement">
                <option value="75">Paris</option>
                <option value="78">Yvelines</option>
                <option value="92">Hauts de Seine</option>
                <option value="93">Seine Saint Denis</option>
                <option value="94">Val de Marne</option>
                <option value="95">Val d'Oise</option>
                <option value="77">Seine et Marne</option>
            </select> 
        </label> <br/> 
     
        <input type="submit" value="Envoyer"/>      

    </form>

        <a href="index.php?action=adminDeleteParent&amp;pseudo=<?= $parent->pseudo(); ?>">Supprimer ce profil</a>

    <?php if(isset($_SESSION['editParent_message'])) {
        echo $_SESSION['editParent_message'];
    } ?>
</div>

<?php $content = ob_get_clean(); ?>

<?php require("views/template.php"); ?>