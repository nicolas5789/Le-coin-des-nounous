<?php ob_start(); ?>

<div class="container">
    <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
        <h2>Mon profil PARENT</h2>
        <p class="lead">Modifier les champs si besoin</p>
    </div>
</div>

<div id="formulaire_newParent" style="text-align: right;">
    <form action="index.php?action=editParent" method="POST">
        <table>
            <tr>
                <td>
                    <label for="pseudo"> Pseudo  :</label> 
                </td>
                <td>
                    <input type="text" name="pseudo" id="pseudo" required value="<?= $parent->pseudo(); ?>"> 
                </td>
            </tr>
            <tr>
                <td>
                    <label for="nom"> Nom  : </label> 
                </td>
                <td>
                    <input type="text" name="nom" id="nom" required value="<?= $parent->nom(); ?>"> 
                </td>
            </tr>
            <tr>
                <td>
                    <label for="prenom"> Prenom  : </label> 
                </td>
                <td>
                    <input type="text" name="prenom" id="prenom" required value="<?= $parent->prenom(); ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="email"> Mofifier mon Adresse email  : </label> 
                </td>
                <td>
                    <input type="email" name="email" id="email" required value="<?= $parent->email(); ?>">
                </td>
            </tr>
            <tr>
                <td>
                   <label for="confirm_email"> Confirmation adresse email  : </label> 
                </td>
                <td>
                    <input type="email" name="confirm email" id="confirm email" required value="<?= $parent->email(); ?>">
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
                    <option><?= $parent->ville(); ?></option>
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
    <a href="index.php?action=deleteParent">Supprimer mon profil</a> <br/> 
    <?php if(isset($_SESSION['editParent_message'])) {
        echo $_SESSION['editParent_message'];
    } ?>
</div>

<?php $content = ob_get_clean(); ?>

<?php require("views/template.php"); ?>