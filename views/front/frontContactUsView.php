<?php ob_start(); ?>

<div id="part_contactUs">
    <div class="formulaire_profil" id="form_contactUs" class="form-area">  
        <form action="index.php?action=mailToUs" method="POST">
            <h3>Nous contacter</h3>
            <p>8 rue du rayon de soleil<br/><span id="addressContact">Paris, 8e</span></p>
            <p>Remplissez le formulaire et écrivez nous un petit mot.<br>
                Nous vous répondrons rapidement.
            </p>
			
			<div class="form-group">
				<label for="nom">Votre Nom <input class="form-control" type="text" name="name" placeholder="Entrez votre nom" required ></label>
			</div>
			<div class="form-group">
				<label for="email">Votre Email <input class="form-control" type="text" name="email" placeholder="Entrez votre email" required></label>
			</div>
            <div class="form-group">
            	<label for="message">Votre message : <textarea rows="7" class="form-control" type="text" name="message" placeholder="Tapez votre message ici" required></textarea></label>                 
            </div>
            <input class="btn btn-primary" type="submit" value="Envoyer votre message" onclick="return confirm('Etes-vous sûr de vouloir envoyer votre message ?');">
        </form>
        <?php if(isset($_SESSION['info_messageContactUs'])){ echo $_SESSION['info_messageContactUs']; } ?>
    </div>
    <div id="map"> </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require("views/template.php"); ?>