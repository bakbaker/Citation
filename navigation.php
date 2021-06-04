<nav class= "border-bottom">
        <ul class="nav justify-content-end">
            <li class="nav-item">
                <a href="index.php" class="nav-link">Accueil </a>
            </li>
            <li class ="nav-item">
                <a href="liste-des-citations.php" class="nav-link"> Liste </a>
            </li>
            <?php if(isset($_SESSION["user"])):?>
            <li class ="nav-item">
                <a href="ajout-citation.php" class="nav-link"> Nouvelle citation </a>
            </li>
            <li class ="nav-item">
                <a href="logout.php" class="nav-link"> Déconnexion </a>   
          </li>
            <?php else:?>

            <li class ="nav-item">
                <a href="login.php" class="nav-link"> Connexion </a>   
          </li>
          <li class ="nav-item">
                <a href="inscription.php" class="nav-link"> Inscription </a>   
          </li>
          <?php endif?>
        </ul>
    </nav>