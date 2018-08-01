<?php ob_start(); ?>

<div class="container">
    <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
        <h2>Page de connexion</h2>
        <p class="lead">Utilisez vos identifiants pour vous connecter.</p>
    </div>
</div>

<?php if(isset($_SESSION['connect_message'])) { ?>
    <h2> <?= $_SESSION['connect_message'] ?> </h2>
<?php } ?>

<div id="formulaire_connexion" style="text-align: center;">
    <form action="index.php?action=connect" method="POST">
        <label for="pseudo"> Pseudo  : <input type="text" name="pseudo" id="pseudo" required> </label> <br/> 
        <label for="password"> Mot de passe : <input type="password" name="password" id="password" required> </label>  <br/> 
        <input type="submit" value="Envoyer"/>      
    </form>
</div>





<?php $content = ob_get_clean(); ?>

<?php require("views/template.php"); ?>