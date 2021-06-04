<?php
//RÉCUPÉRATION DU PARAMÈTRE ID
$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

//Requête dur la BD pour obtenir les infos de la citation à modifier

require "lib/quote-model.php";

$quote=getOneQuoteById($id);
if(isPosted()){

    $errors = handleQuoteForm($id);

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
<?php var_dump($quote);?>

            <form method="post">
                <div class="mb-2">
                    <label class="form-label">Text de la citation</label>
                    <textarea class="form-control" name="texte"><?=$quote["texte"]?></textarea>
                </div>
                <div class="mb-2">
                    <label class="form-label">Auteur de la citation</label>
                    <input type="text" class="form-control" name="auteur"
                    value="<?=$quote["auteur"]?>">

                </div>
                <button type="submit" name="submit" class="btn btn-primary">Valider</button>


            </form>

        </div>
    </div>

</body>

</html>