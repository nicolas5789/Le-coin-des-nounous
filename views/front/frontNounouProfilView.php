<?php ob_start(); ?>

<div class="container">
    <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
        <h2>Mon profil NOUNOU</h2>
        <p class="lead">Modifier les champs si besoin</p>
    </div>
</div>

<div id="formulaire_newNounou" style="text-align: center;">
    <form action="index.php?action=editNounou" method="POST">

        <label for="pseudo"> Pseudo  : <input type="text" name="pseudo" id="pseudo" required value="<?= $nounou->pseudo(); ?>"> </label> <br/> 
        <label for="nom"> Nom  : <input type="text" name="nom" id="nom" required value="<?= $nounou->nom(); ?>"> </label> <br/> 
        <label for="prenom"> Prenom  : <input type="text" name="prenom" id="prenom" required value="<?= $nounou->prenom(); ?>"> </label> <br/> 
        <label for="email"> Mofifier mon Adresse email  : <input type="email" name="email" id="email" required value="<?= $nounou->email(); ?>"> </label> <br/> 
        <label for="confirm_email"> Confirmation adresse email  : <input type="email" name="confirm email" id="confirm email" required value="<?= $nounou->email(); ?>"> </label> <br/> 
        <label for="password"> Définir mon mot de passe : <input type="password" name="password" id="password" required> </label>  <br/> 
        <label for="confirm_password"> Confirmation mot de passe  : <input type="password" name="confirm password" id="confirm password" required> </label> <br/> 
        <label for="experience"> Expérience  : <input type="text" name="experience" id="experience" required value="<?= $nounou->experience(); ?>"> </label> <br/> 
        <label for="dispo"> Place disponible  : <input type="text" name="dispo" id="dispo" required value="<?= $nounou->place_dispo(); ?>"> </label> <br/> 
        <label for="ville"> Ville : <input type="text" name="ville" id="ville" required value="<?= $nounou->ville(); ?>"> </label>  <br/> 
        <p>Département enregistré : <?= $nounou->departement(); ?></p>
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

        <a href="index.php?action=deleteNounou">Supprimer mon profil</a>

    <?php if(isset($_SESSION['editNounou_message'])) {
        echo $_SESSION['editNounou_message'];
    } ?>
</div>

<?php $content = ob_get_clean(); ?>

<?php require("views/template.php"); ?>