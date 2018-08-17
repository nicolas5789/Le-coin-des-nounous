<?php ob_start(); ?>

<div class="container">
    <div class="py-5 text-center">
        <div id="logo_form">
            <img src="public/images/parents.gif">  
        </div>
        <h2>Formulaire d'inscription PARENTS</h2>
        <p class="lead">Remplissez les champs ci dessous pour vous inscrire</p>
    </div>
</div>

<div id="formulaire_newParent" style="text-align: center;">
    <form action="index.php?action=addParent" method="POST">
        <table>
            <tr>
                <td>
                    <label for="pseudo"> Pseudo  :</label> 
                </td>
                <td>
                    <input type="text" name="pseudo" id="pseudo" required> 
                </td>
            </tr>
            <tr>
                <td>
                    <label for="nom"> Nom  : </label> 
                </td>
                <td>
                    <input type="text" name="nom" id="nom" required> 
                </td>
            </tr>
            <tr>
                <td>
                    <label for="prenom"> Prenom  : </label> 
                </td>
                <td>
                    <input type="text" name="prenom" id="prenom" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="email"> Mofifier mon Adresse email  : </label> 
                </td>
                <td>
                    <input type="email" name="email" id="email" required>
                </td>
            </tr>
            <tr>
                <td>
                   <label for="confirm_email"> Confirmation adresse email  : </label> 
                </td>
                <td>
                    <input type="email" name="confirm email" id="confirm email" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="password"> Définir mon mot de passe : </label> 
                </td>
                <td>
                    <input type="password" name="password" id="password" required> </label>
                </td>
            </tr>
            <tr>
                <td>
                   <label for="confirm_password"> Confirmation mot de passe  : </label> 
                </td>
                <td>
                    <input type="password" name="confirm password" id="confirm password" required>
                </td>
            </tr>
            <tr>
                <td>
                   <label for="departement"> Département  : </label> 
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
                   <label for="ville"> Ville : </label> 
                </td>
                <td>
                    <select class="cityContainer" type="text" name="ville" id="ville" required> 
                </select>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" value="Envoyer"/>   
                </td>
            </tr>
        </table>
    </form>

    <?php if(isset($_SESSION['form_message'])) {
        echo $_SESSION['form_message'];
    } ?>
</div>

<?php $content = ob_get_clean(); ?>

<?php require("views/template.php"); ?>