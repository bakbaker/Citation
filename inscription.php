<?php

require "lib/user-model.php";

$roleList = getAllRoles();

$errors =[];
if(isPosted()){
    $errors =handleRegisterForm();
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
                    <label class="form-label">Pseudonyme</label>
                    <input type="text" class="form-control" name="pseudo">
                </div>
                <div class="mb-2">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" name="email"></input>
                </div>
                <div class="mb-2">
                    <label class="form-label">Mot de passe</label>
                    <input type="password" class="form-control" name="mot_de_passe"></input>
                </div>
                <div class="mb-2">
                    <label class="form-label">Rôle</label>
                    <select name="role_id" class="form-control">
                    <?php foreach ($roleList as $role): ?>

                    <option value="<?= $role["id"]?>">
                    <?=$role["nom"] ?>
                   </option>
                    <?php endforeach ?>
                    </select>
                </div>

                <button type="submit" name="submit" class="btn btn-primary btn-block">Valider</button>


            </form>

        </div>
    </div>
</body>