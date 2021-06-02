<?php
require "lib/pdo.php";


/**
 * Returne une citation aléatoire extraite de la BD
 * @author Bazbaker <bazbaker9@gmail.com
 * @date 2021-06-02
 * @return array
 */

function getRandomQuote(){
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

return $quote;
}

/**
 * Returne la liste des citations
 * @author Bazbaker <bazbaker9@gmail.com
 * @date 2021-06-02
 * @return array
 */

function getAllQuotes(){
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
return $quoteList;

}



