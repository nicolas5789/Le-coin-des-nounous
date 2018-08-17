<?php ob_start(); ?>

<div id="part_contactUs">
    <div id="form_contactUs" class="form-area">  
        <form action="index.php?action=mailToUs" method="POST">
            <h3>Nous contacter</h3>
			
			<div class="form-group">
				<label for="nom">Votre Nom <input class="form-control" type="text" name="name" required ></label>
			</div>
			<div class="form-group">
				<label for="email">Votre Email <input class="form-control" type="text" name="email" required></label>
			</div>
            <div class="form-group">
            	<label for="message">Votre message : <textarea rows="7" class="form-control" type="text" name="message" placeholder="Tapez votre message ici" required></textarea></label>                 
            </div>
            <input type="submit" value="Envoyer votre message">
        </form>
        <?php if(isset($_SESSION['info_messageContactUs'])){ echo $_SESSION['info_messageContactUs']; } ?>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require("views/template.php"); ?>