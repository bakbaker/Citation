<?php
define('DSN','mysql:host=mysql-baker.alwaysdata.net;dbname=baker_citations;charset=utf8');
define('DB_USER','baker');
define('DB_PASS','Tempo2021');

/**
 * Fonction de connexion à la BD
 *
 * @return PDO
 */

function getPDO(){
//OPTIONS DE CONNEXION
$options = [PDO::ATTR_ERRMODE =>PDO::ERRMODE_EXCEPTION];
return new PDO (DSN, DB_USER,DB_PASS, $options);

}

/**
 * Rentourne vrai si les données du formulaire sont postées
 *
 * @return boolean
 */
function isPosted(){
       return count($_POST) >0;
    
}
?>