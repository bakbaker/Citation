<?php
session_start();

require "lib/quote-model.php";

//Test d'authentification
//seuls les utilsateurs authentifiés peuvent accéder à la page

if(!isset($_SESSION["user"])){
    header ("location:login.php");
    exit;
}


//Tableau des erreurs
$errors =[];

//On traite le formulaire si les données ont été postées

if(isPosted()) {
    //Appel de la fonction de traitement du formulaire
$errors = handleQuoteForm();
var_dump($errors);

}
?>

<?php require "head.php"?>

<body class="container-fluid">
    <?php require "navigation.php"?>
    <div class="row justify-content-center">
        <div class="col-md-6">

            <?php if ($errors): ?>
            <div class="alert alert-danger">
                <?php foreach ($errors as $errorsMessage): ?>
                    
                     <p><?=$errorsMessage?></p>

                <?php endforeach?>
            </div>
            <?php endif?>

            <form method="post">
                <div class="mb-2">
                    <label class="form-label">Text de la citation</label>
                    <textarea class="form-control" name="texte"></textarea>
                </div>
                <div class="mb-2">
                    <label class="form-label">Auteur de la citation</label>
                    <input type="text" class="form-control" name="auteur"></input>
                </div>
                <button type="submit" name="submit" class="btn btn-primary btn-block">Valider</button>


            </form>

        </div>
    </div>
</body>