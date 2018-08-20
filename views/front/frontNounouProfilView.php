<?php ob_start(); ?>

<div class="container">
    <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
        <h2>Mon profil NOUNOU</h2>
    </div>
</div>

<div class="formulaire_profil" id="formulaire_newNounou" style="text-align: center;">
    <p class="lead">Modifier les champs si besoin</p>
    <form action="index.php?action=editNounou" method="POST">
        <table>
                <tr>
                    <td>
                        <label for="pseudo">Pseudo  : </label> 
                    </td>
                    <td>
                        <input class="form-control" type="text" name="pseudo" id="pseudo" value="<?= $nounou->pseudo(); ?>" required> 
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="nom">Nom  : </label> 
                    </td>
                    <td>
                        <input class="form-control" type="text" name="nom" id="nom" value="<?= $nounou->nom(); ?>" required> 
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="prenom">Prenom  : </label> 
                    </td>
                    <td>
                        <input class="form-control" type="text" name="prenom" id="prenom" value="<?= $nounou->prenom(); ?>" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="email">Adresse email  : </label> 
                    </td>
                    <td>
                        <input class="form-control" type="email" name="email" id="email" value="<?= $nounou->email(); ?>" required>
                    </td>
                </tr>
                <tr>
                    <td>
                       <label for="confirm_email">Confirmation adresse email  : </label> 
                    </td>
                    <td>
                        <input  class="form-control" type="email" name="confirm email" id="confirm email" value="<?= $nounou->email(); ?>" required>
                    </td>
                </tr>
                <tr>
                    <td>
                       <label for="experience">Année(s) d'expérience  : </label> 
                    </td>
                    <td>
                        <input class="form-control" type="number" name="experience" id="experience" value="<?= $nounou->experience(); ?>" required>
                    </td>
                </tr>

                <tr>
                    <td>
                       <label for="dispo">Place(s) disponible(s)  : </label> 
                    </td>
                    <td>
                        <input class="form-control" type="number" name="place_dispo" id="dispo" value="<?= $nounou->place_dispo(); ?>" required>
                    </td>
                </tr>

                <tr>
                    <td>
                       <label for="departement">Département  : </label> 
                    </td>
                    <td>
                        <select class="deptSelect" required name="departement" id="departement">
                            <option <?php if($nounou->departement()=="75"){echo "selected";} ?> value="75">Paris</option>
                            <option <?php if($nounou->departement()=="78"){echo "selected";} ?> value="78">Yvelines</option>
                            <option <?php if($nounou->departement()=="91"){echo "selected";} ?> value="91">Essonne</option>
                            <option <?php if($nounou->departement()=="92"){echo "selected";} ?> value="92">Hauts de Seine</option>
                            <option <?php if($nounou->departement()=="93"){echo "selected";} ?> value="93">Seine Saint Denis</option>
                            <option <?php if($nounou->departement()=="94"){echo "selected";} ?> value="94">Val de Marne</option>
                            <option <?php if($nounou->departement()=="95"){echo "selected";} ?> value="95">Val d'Oise</option>
                            <option <?php if($nounou->departement()=="77"){echo "selected";} ?> value="77">Seine et Marne</option>
                        </select> 
                    </td>
                </tr>
                <tr>
                    <td>
                       <label for="ville">Ville : </label> 
                    </td>
                    <td>
                        <select class="cityContainer" type="text" name="ville" id="ville" required> 
                            <option><?= $nounou->ville(); ?></option>
                        </select>
                    </td>
                </tr>
            </table>
        <input class="btn btn-primary" type="submit" value="Enregistrer"/>
    </form>



    <?php if(isset($_SESSION['editNounou_message'])) {
        echo $_SESSION['editNounou_message'];
    } ?>
</div>

<hr>

<div class="formulaire_profil" id="updatePassword">
    <p class="lead">Changer de mot de passe</p>
    <?php if(isset($_SESSION['editPasswordNounou'])) {echo $_SESSION['editPasswordNounou'];} ?>


    <form action="index.php?action=updatePasswordNounou&amp;pseudo=<?= $nounou->pseudo(); ?>" method="POST">
        <label for="password"> Définir mon mot de passe : <input class="form-control" type="password" name="password" id="password" required> </label>  <br/> 
        <label for="confirm_password"> Confirmation mot de passe  : <input class="form-control" type="password" name="confirm password" id="confirm password" required> </label> <br/> 
        <input class="btn btn-primary"  type="submit" value="Modifier le mot de passe">  <br>
        <a id="deleteProfil" class="btn btn-danger" href="index.php?action=deleteNounou&amp;idNounou=<?= $nounou->id(); ?>">Supprimer mon profil</a>
    </form>
</div>



<?php $content = ob_get_clean(); ?>

<?php require("views/template.php"); ?>