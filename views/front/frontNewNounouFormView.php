<?php ob_start(); ?>

<div class="container">
    <div class="py-5 text-center">
        <div id="logo_form">
            <img src="public/images/parents.gif">  
        </div>
        <h2>Formulaire d'inscription NOUNOU</h2>
    </div>
</div>
<!--
<div id="formulaire_newNounou" style="text-align: center;">
    <form action="index.php?action=addNounou" method="POST">
        <div class="form-group">
            <label for="pseudo"> Pseudo  : <input class="form-control" type="text" name="pseudo" id="pseudo" required> </label> 
        </div>
        <div class="form-group">
            <label for="nom"> Nom  : <input class="form-control" type="text" name="nom" id="nom" required> </label> 
        </div>
        <div class="form-group">
            <label for="prenom"> Prenom  : <input class="form-control" type="text" name="prenom" id="prenom" required> </label> 
        </div>
        <div class="form-group">
            <label for="email"> Adresse email  : <input class="form-control" type="email" name="email" id="email" required> </label>
        </div>
        <div class="form-group">
            <label for="confirm_email"> Confirmation adresse email  : <input class="form-control" type="email" name="confirm email" id="confirm email" required> </label>
        </div>
        <div class="form-group">
            <label for="password"> Mot de passe : <input class="form-control" type="password" name="password" id="password" required> </label>
        </div>
        <div class="form-group">
            <label for="confirm_password"> Confirmation mot de passe  : <input class="form-control" type="password" name="confirm password" id="confirm password" required> </label>
        </div>
        <div class="form-group">
            <label for="experience"> Expérience : <input class="form-control" type="number" name="experience" id="experience" required> an(s) </label>
        </div>
        <div class="form-group"> 
            <label for="dispo"> Place disponible  : <input class="form-control" type="number" name="dispo" id="dispo" required> </label>
        </div>
        <label for="departement"> Département  : 
            <select class="deptSelect" required name="departement" id="departement">
                <option value="75">Paris</option>
                <option value="78">Yvelines</option>
                <option value="91">Essonne</option>
                <option value="92">Hauts de Seine</option>
                <option value="93">Seine Saint Denis</option>
                <option value="94">Val de Marne</option>
                <option value="95">Val d'Oise</option>
                <option value="77">Seine et Marne</option>
            </select> 
        </label> 
        <label for="ville"> Ville : 
            <select class="cityContainer" type="text" name="ville" id="ville" required> 
            </select>
        </label>  <br/> 
        <input type="submit" value="Envoyer"/>      

    </form>

    <?php if(isset($_SESSION['form_message'])) {
        echo $_SESSION['form_message'];
    } ?>
</div>
-->
<div class="formulaire_profil" style="text-align: center;">
    <p>Remplissez les champs ci dessous pour vous inscrire</p>
    <form action="index.php?action=addParent" method="POST">
        <table>
            <tr>
                <td>
                    <label for="pseudo">Pseudo  : </label> 
                </td>
                <td>
                    <input class="form-control" type="text" name="pseudo" id="pseudo" required> 
                </td>
            </tr>
            <tr>
                <td>
                    <label for="nom">Nom  : </label> 
                </td>
                <td>
                    <input class="form-control" type="text" name="nom" id="nom" required> 
                </td>
            </tr>
            <tr>
                <td>
                    <label for="prenom">Prenom  : </label> 
                </td>
                <td>
                    <input class="form-control" type="text" name="prenom" id="prenom" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="email">Adresse email  : </label> 
                </td>
                <td>
                    <input class="form-control" type="email" name="email" id="email" required>
                </td>
            </tr>
            <tr>
                <td>
                   <label for="confirm_email">Confirmation adresse email  : </label> 
                </td>
                <td>
                    <input  class="form-control" type="email" name="confirm email" id="confirm email" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="password">Mot de passe : </label> 
                </td>
                <td>
                    <input class="form-control" type="password" name="password" id="password" required> </label>
                </td>
            </tr>
            <tr>
                <td>
                   <label for="confirm_password">Confirmation mot de passe  : </label> 
                </td>
                <td>
                    <input class="form-control" type="password" name="confirm password" id="confirm password" required>
                </td>
            </tr>

            <tr>
                <td>
                   <label for="experience">Année(s) d'expérience  : </label> 
                </td>
                <td>
                    <input class="form-control" type="number" name="experience" id="experience" required>
                </td>
            </tr>

            <tr>
                <td>
                   <label for="dispo">Place(s) disponible(s)  : </label> 
                </td>
                <td>
                    <input class="form-control" type="number" name="dispo" id="dispo" required>
                </td>
            </tr>

            <tr>
                <td>
                   <label for="departement">Département  : </label> 
                </td>
                <td>
                    <select class="deptSelect" required name="departement" id="departement">
                    <option  value="75">Paris</option>
                    <option  value="78">Yvelines</option>
                    <option  value="91">Essonne</option>
                    <option  value="92">Hauts de Seine</option>
                    <option  value="93">Seine Saint Denis</option>
                    <option  value="94">Val de Marne</option>
                    <option  value="95">Val d'Oise</option>
                    <option  value="77">Seine et Marne</option>
                </select> 
                </td>
            </tr>
            <tr>
                <td>
                   <label for="ville">Ville : </label> 
                </td>
                <td>
                    <select class="cityContainer" type="text" name="ville" id="ville" required> 
                </select>
                </td>
            </tr>
        </table>
        <input class="btn btn-primary" type="submit" value="M'inscrire"/>
    </form>

    <?php if(isset($_SESSION['form_message'])) {
        echo $_SESSION['form_message'];
    } ?>
</div>


<?php $content = ob_get_clean(); ?>

<?php require("views/template.php"); ?>