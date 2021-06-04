<?php
//Importation de la bibliothèque perso pdo.php

require "lib/quote-model.php";

//Test de la connexion

$quoteList =getAllQuotes();

?>

<?php require "head.php"?>

<script>
    //Éxecution du code uniquement quand le DOM est chargé
    $(document).ready(function() {
        //*************************************FERMETURE DU MESSAGE D'ERREUR***************************************** */

        //Confirmation avant suppression
        $(".liste-des-citations").on("click", function() {
            return confirm("voulez-vous vraiment supprimer ce livre?");
        });
    });
    </script>





    
<body class="conatainer-fluid">

    <?php require "navigation.php" ?>

    <div class="row justify-content-center">
        <!-- centrer horizontalement -->
        <div class="col-lg-10 p-2">
            <!-- padding de 2 -->
            <h1>Liste des citations </h1>


            <table class="table-striped">
                <tr>
                    <th>id</th>
                    <th>texte</th>
                    <th>Auteur</th>
                    <th>Action</th>
                    
                </tr>

                <?php foreach($quoteList as $quote):?>
                <tr>
                    <td><?=$quote["id"]?></td>
                    <td><?=$quote["texte"]?></td>
                    <td><?=$quote["auteur"]?></td>
                    <td>
                        <a href="update-citation.php?id=<?=$quote["id"]?>" class="btn btn-warning">Modifier</a>
                    </td>


                    <td>
                        <a href="delete-citation.php?id=<?= $quote["id"]?>" class="btn btn-danger">Supprimer</a>
                        
                    </td>
             </tr>
                <?php endforeach?>

            </table>
        </div>
    </div>

</body>

</html>