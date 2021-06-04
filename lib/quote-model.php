<?php
require "lib/pdo.php";

/**
 * Returne une citation aléatoire extraite de la BD
 * @author Bazbaker <bazbaker9@gmail.com
 * @date 2021-06-02
 * @return array
 */

function getRandomQuote()
{
    //création de la connexion
    $cn = getPDO();

//Réquête pour extraire une citation
    //( ORDER BY RAND() effectue un tri aléatoire)
    //LIMIT 1 permet de n'obtenir qu'une ligne
    //Avoir les citations aléatoirement
    // avoir la 1er citation
    //$query= $cn->query("SELECT * FROM citations LIMIT 1");
    //$query= $cn->query("SELECT * FROM citations LIMIT 1 ORDER BY id ASC LIMIT 1"); Avoir la derniere de la liste

    $query = $cn->query("SELECT * FROM citations ORDER BY RAND() LIMIT 1");

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

function getAllQuotes()
{
    $connexion = getPDO();
//echo "ça marche <br>";

//requête SQL
    $query = $connexion->query("SELECT * FROM citations");
//$sql = "SELECT * FROM citations";
    //$query = $connexion ->query($sql);

//Récuperation de toutes les données/RÉSULTAT dans une variable
    $quoteList = $query->fetchAll(PDO::FETCH_ASSOC);

//var_dump($data);
    //echo "<br>";
    return $quoteList;

}
/**
 * Validation du formulaire d'ajout de citation
 *
 * @param array $data
 * @return array $errors
 */

function validateInput(array $data)
{
//Initialisation du tableau des erreurs
    $errors = [];
//Validation de la saisie
    if (empty($data["texte"])) {
        $errors[] = "Le texte ne peut être vide";
    }
    if (empty($data["auteur"])) {
        $errors[] = "L'auteur ne peut être vide";
    }
    return $errors;
}


/**
 * Insertion d'une citation dans la base de données
 *
 * @param array $data
 * @return void
 */

function insertQuote(array $data)
{
//on ajoute la nouvelle citation
    $pdo = getPDO();
//La requête sql
    $sql = "INSERT INTO citations (texte, auteur) VALUES (?,?)";
//Préparation de la requête
    $statement = $pdo->prepare($sql);
//paramètres
    $params = [$data["texte"], $data["auteur"]];
//Execution en passant les paramètres
    $statement->execute($params);

}

function updateQuote(array $data, int $id){
    $pdo = getPDO();
    $sql = "UPDATE citations SET texte=:texte, auteur=:auteur WHERE id=:id";
    //ajout de la clef id aux paramètres
    $statement = $pdo->prepare($sql);
    $data["id"]=$id;
    $statement-> execute($data);
}



/**
 * Traitement du formulaire d'ajout de citation
 *
 * @return array $errors
 */

function handleQuoteForm(int $id = null)
{
    //On récupere la saisie
    //  $text = filter_input(INPUT_POST, "texte", FILTER_SANITIZE_STRING);
    //   $author = filter_input(INPUT_POST, "auteur", FILTER_SANITIZE_STRING);
    $data = filter_input_array(INPUT_POST, [
        "texte" => FILTER_SANITIZE_STRING,
        "auteur" => FILTER_SANITIZE_STRING,
    ]);
    //Validation de la saisie
    $errors = validateInput($data);

//Insertion uniquement s'il n'y pas d'erreurs
    if (count($errors) == 0) {

        try {
            //Ajout ou modification
            //enfonction de la valeur de $id
            if($id){
                updateQuote($data, $id);
            } else {
              insertQuote($data);
            }
        
//Redirection vers la liste des citations
            header("location:liste-des-citations.php");
            exit;
        } catch (Exception $exception) {
            $errors[] = "Erreur interne du serveur";
        }
    }
    return $errors;

}


/**
 *
 * Suppresion d'une citation dans la BD
 *en fonction d'un argument $ID
 *
 * @return void
 *
 */
function deleteOneQuoteById(int $id) {

    //Requête sql pour la suppression
    
    $sql= "DELETE FROM citations WHERE id=?";
      
    
    //obtention d'une instance de pdo (connexion à la bd)
    $pdo =getPDO();
    
    //préparation de la requête
    
    $statement = $pdo->prepare($sql);
    
    
    //exécution de la requête
    //en passant le paramètre dans un tableau ordinal
    $statement->execute([$id]);
    
        }

        /**
 *
 * Retourne une citation extraite de la BD
 * en fonction d'un id passé en argument
 *@param int $id
 * @return array
 *
 */
function getOneQuoteById(int $id) {

    $pdo = getPDO();
    
    $sql = "SELECT * FROM citations WHERE id=?";
    
    $statement = $pdo->prepare($sql);
    
    $statement->execute([$id]);
    
    //récupération des données
    $quote = $statement->fetch(PDO::FETCH_ASSOC); 
    
    return ($quote);
        }