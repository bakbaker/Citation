<?php
session_start();

//Import de la bibliotheque pdo
require "lib/quote-model.php";
require "lib/user-model.php";
$quote =getRandomQuote();

?>

<?php require "head.php"?>


<body class="container-fuid p-4">

<?php require "navigation.php" ?>

    <h1 class="mb-3">La citation du jour</h1>

 <!-- Affichage du message-->
<?php if(hasFlashMessage()):?>
    <div class="alerte alert-primary">
    <?= getFlashMessage()?>
    </div>
    <?php endif ?>


    <!--On dit bonjour à l'utilisateur-->
<?php if(isUserLogged()):?>
<p>Bonjour <?=getUserName()?></p>
<?php endif?>


    <div class="alerte alert-success">
        <figure>
            <blockquote class=blockquote>
                <!--Ici le texte de la citation-->
                <?=$quote["texte"]?>

            </blockquote>

            <figcaption class=blockquote-footer>
                <!--Ici l'auteur de la citation -->
                <?=$quote["auteur"]?>
                <!--    echo "<a href=liste-des-citations.php>Cliquez ici</a>"-->
            </figcaption>

        </figure>

    </div>
</body>

</html>