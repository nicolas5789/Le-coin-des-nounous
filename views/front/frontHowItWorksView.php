<?php ob_start(); ?>

<div id="explain" class="formulaire_profil">
    <h3>Bienvenue sur le Coin des Nounous !</h3>
    <p>Le principe : Vous êtes parents, vous recherchez une nounous, mais vous ne savez pas comment trouver la plus adaptée à vos besoins. L'idéal serait d'avoir un conseil ou une recommendation...</p>
    <p>Ca tombe bien, le Coin des Nounous est là pour vous !</p> 
    <p>Cliquez sur le département de votre choix et visualisez la liste des nounous avec la note attribuée par les parents.</p>
    <p>Pour la contacter ou bien laissez une note, créez votre profil "Parent" <a href="index.php?action=newParentForm">ici</a>.</p>
    <hr>
    <p>Vous êtes "Nounou" et souhaitez vous faire connaître, allez-y, créez votre profil juste <a href="index.php?action=newNounouForm">ici</a>.</p>
    <hr>
    <p>Pour plus de précisions, des questions ou petit coucou, n'hésitez pas à <a href="index.php?action=contactUs">nous contacter</a>.</p>
</div>

<div id="return_home">
    <a  class="btn btn-primary" href="index.php?action=home">Accueil</a>
</div>

<?php $content = ob_get_clean(); ?>

<?php require("views/template.php"); ?>