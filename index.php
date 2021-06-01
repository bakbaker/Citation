<?php
//Import de la bibliotheque pdo
require "lib/pdo.php";

//création de la connexion
$cn = getPDO();

//Réquête pour extraire une citation
//( ORDER BY RAND() effectue un tri aléatoire)
//LIMIT 1 permet de n'obtenir qu'une ligne
//Avoir les citations aléatoirement
// avoir la 1er citation
//$query= $cn->query("SELECT * FROM citations LIMIT 1");
//$query= $cn->query("SELECT * FROM citations LIMIT 1 ORDER BY id ASC LIMIT 1"); Avoir la derniere de la liste

$query= $cn->query("SELECT * FROM citations ORDER BY RAND() LIMIT 1");

//Récuperation des données de la requête
$quote = $query->fetch(PDO::FETCH_ASSOC);

?>

<?php require "head.php"?>


<body>

<?php require "navigation.php" ?>


    <h1 class="mb-3">La citation du jour</h1>

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