<?php
// Permet d'afficher les messages d'erreurs provenant de PHP.
ini_set('display_errors', '1');

// Localisation de la BDD
const HOST = "localhost";

// Nom de la base de donnée
const DATABASE = "bibliotheque";

// Nom d'utilisateur
const USERNAME = "root";

// Mot de passe 
const PASSWORD = ""; 
// Sur MAMP Password = "root" 
// sur XAMP Password = ""

//si c'est Mamp il faut préciser le password

try{
    // Arguments : 1 (serveur + la BDD), 2 (username), 3 (mdp), 4 (options)
    $database = new PDO("mysql:host=" . HOST . ";dbname=" . DATABASE, USERNAME, PASSWORD,
    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8' ));
    /* 
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING : Affiche les messages d'erreurs qui sont liées à la base donnée.
        PDO::mysql_ATTR_INIT_COMMAND => 'SET NAMES utf8' : Encodage au format utf-8
    */
} catch(PDOException $error) // PDO : php data objects
{  
    echo "probleme connexion : " . $error->getMessage();
}