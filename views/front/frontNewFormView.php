<?php ob_start(); ?>

<div class="container">
    <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
        <h2>Formulaire d'inscription</h2>
        <p class="lead">Remplissez les champs ci dessous pour vous inscire</p>
    </div>
</div>

<div id="formulaire" style="text-align: center;">
    <form >

        <label for="pseudo"> Pseudo </label> : <input type="text" name="pseudo" id="pseudo" required> <br/> 
        <label for="pseudo"> Nom </label> : <input type="text" name="nom" id="nom" required> <br/> 
        <label for="pseudo"> Prénom </label> : <input type="text" name="prénom" id="prénom" required> <br/> 
        <label for="pseudo"> Adresse email </label> : <input type="email" name="email" id="email" required> <br/> 
        <label for="pseudo"> Confirmation adresse email </label> : <input type="email" name="confirm email" id="confirm email" required> <br/> 
        <label for="pseudo"> Mot de passe </label> : <input type="password" name="password" id="password" required> <br/> 
        <label for="pseudo"> Confirmation mot de passe </label> : <input type="password" name="confirm password" id="confirm password" required> <br/> 
        <label for="pseudo"> Expérience </label> : <input type="text" name="experience" id="experience" required> <br/> 
        <label for="pseudo"> Place disponible </label> : <input type="text" name="dispo" id="dispo" required> <br/> 
        <label for="pseudo"> Ville </label> : <input type="text" name="ville" id="ville" required> <br/> 
        <label for="pseudo"> Département </label> : <input type="text" name="departement" id="departement" required> <br/> 
     
        <input type="submit" value="Envoyer"/>      

    </form>
</div>



<?php $content = ob_get_clean(); ?>

<?php require("views/template.php"); ?>