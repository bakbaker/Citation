<?php
//Importation de la bibliothèque perso pdo.php

require "lib/pdo.php";

//Test de la connexion

$connexion = getPDO();
//echo "ça marche <br>"; 

//requ^éte SQL
$query =$connexion->query("SELECT * FROM citations");
//$sql = "SELECT * FROM citations";
//$query = $connexion ->query($sql);

//Récuperation de toutes les données/RÉSULTAT dans une variable
$quoteList = $query->fetchAll(PDO::FETCH_ASSOC);

//var_dump($data);
//echo "<br>";

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des citations</title>
</head>

<body>

<?php require "navigation.php" ?>

    <h1>Liste des citations </h1>


    <table>
        <tr>
            <th>id</th>
            <th>texte</th>
            <th>Auteur</th>
        </tr>

        <?php foreach($quoteList as $quote):?>
            <tr>
            <th><?=$quote["id"]?></th>
            <th><?=$quote["texte"]?></th>
            <th><?=$quote["auteur"]?></th>

        </tr>
        <?php endforeach?>

    </table>
   

</body>

</html>