<?php ob_start(); ?>

<div class="container">
    <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
        <h2>Formulaire d'inscription</h2>
        <p class="lead">Remplissez les champs ci dessous pour vous inscire</p>
    </div>
</div>

<div id="formulaire" style="text-align: center;">
    <form action="index.php?action=addNounou" method="POST">

        <label for="pseudo"> Pseudo  : <input type="text" name="pseudo" id="pseudo" required> </label> <br/> 
        <label for="nom"> Nom  : <input type="text" name="nom" id="nom" required> </label> <br/> 
        <label for="prenom"> Prenom  : <input type="text" name="prenom" id="prenom" required> </label> <br/> 
        <label for="email"> Adresse email  : <input type="email" name="email" id="email" required> </label> <br/> 
        <label for="confirm_email"> Confirmation adresse email  : <input type="email" name="confirm email" id="confirm email" required> </label> <br/> 
        <label for="password"> Mot de passe : <input type="password" name="password" id="password" required> </label>  <br/> 
        <label for="confirm_password"> Confirmation mot de passe  : <input type="password" name="confirm password" id="confirm password" required> </label> <br/> 
        <label for="experience"> Expérience  : <input type="text" name="experience" id="experience" required> </label> <br/> 
        <label for="dispo"> Place disponible  : <input type="text" name="dispo" id="dispo" required> </label> <br/> 
        <label for="ville"> Ville : <input type="text" name="ville" id="ville" required> </label>  <br/> 
        <label for="departement"> Département  : 
            <select required name="departement" id="departement">
                <option>75</option>
                <option>78</option>
                <option>92</option>
                <option>93</option>
                <option>94</option>
                <option>95</option>
                <option>77</option>
            </select> 
        </label> <br/> 
     
        <input type="submit" value="Envoyer"/>      

    </form>

    <?php if(isset($_SESSION['form_error'])) {
        echo $_SESSION['form_error'];
    } ?>
</div>



<?php $content = ob_get_clean(); ?>

<?php require("views/template.php"); ?>