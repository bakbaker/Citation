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



<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Citation du jour</title>
</head>

<body>

<?php require "navigation.php" ?>


    <h1>La citation du jour</h1>

    <div>
        <figure>
            <blockquote>
                <!--Ici le texte de la citation-->
                <?=$quote["texte"]?>

            </blockquote>

            <figcaption>
                <!--Ici l'auteur de la citation -->
                <?=$quote["auteur"]?>
                echo "<a href=liste-des-citations.php>Cliquez ici</a>"
            </figcaption>

        </figure>

    </div>
</body>

</html>