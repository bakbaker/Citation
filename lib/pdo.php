<?php
define('DSN','mysql:host=mysql-baker.alwaysdata.net;dbname=baker_citations;charset=utf8');
define('DB_USER','baker');
define('DB_PASS','Tempo2021');

function getPDO(){
//OPTIONS DE CONNEXION
$options = [PDO::ATTR_ERRMODE =>PDO::ERRMODE_EXCEPTION];
return new PDO (DSN, DB_USER,DB_PASS, $options);

}