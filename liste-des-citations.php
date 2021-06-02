<?php
//Importation de la bibliothèque perso pdo.php

require "lib/quote-model.php";

//Test de la connexion

$quoteList =getAllQuotes();

?>

<?php require "head.php"?>


<body class="conatainer-fluid">

    <?php require "navigation.php" ?>

    <div class="row justify-content-center"><!-- centrer horizontalement -->
        <div class="col-lg-10 p-2"><!-- padding de 2 -->
            <h1>Liste des citations </h1>


            <table class="table-striped">
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
        </div>
    </div>

</body>

</html>