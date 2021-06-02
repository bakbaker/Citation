<?php
session_start();

//Import de la bibliotheque pdo
require "lib/quote-model.php";

$quote =getRandomQuote();

?>

<?php require "head.php"?>


<body class="container-fuid p-4">

<?php require "navigation.php" ?>


    <h1 class="mb-3">La citation du jour</h1>
<?php if(isset($_SESSION["user"])):?>
<p>Bonjour admin</p>
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