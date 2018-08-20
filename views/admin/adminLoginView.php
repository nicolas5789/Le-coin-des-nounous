<?php ob_start(); ?>

<?php if(isset($_SESSION['profil']) && $_SESSION['profil'] == "admin") {
    header("Location: index.php?action=adminPanel");
} ?>

<div class="container">
    <div class="py-5 text-center">
        <div id="logo_form">
            <img src="public/images/parents.gif">  
        </div>
        <h2>Espace d'administration</h2>
        <p class="lead">Utilisez votre identifiant pour vous connecter.</p>
    </div>
</div>

<?php if(isset($_SESSION['adminConnect_message'])) { ?>
    <h2> <?= $_SESSION['adminConnect_message'] ?> </h2>
<?php } ?>

<div id="formulaire_connexionAdmin" style="text-align: center;">
    <form action="index.php?action=adminConnect" method="POST">
        <label for="pseudo"> Pseudo  : <input class="form-control" type="text" name="pseudo" id="pseudo" required> </label> <br/> 
        <label for="password"> Mot de passe : <input class="form-control" type="password" name="password" id="password" required> </label>  <br/> 
        <input class="btn btn-primary" type="submit" value="Me connecter"/>      
    </form>
</div>





<?php $content = ob_get_clean(); ?>

<?php require("views/template.php"); ?>