<?php
require_once('../utils/config.php');  // require_once permet d'inclure un fichier. 

ini_set('display_errors', '1'); // Permet d'afficher tous les messages d'erreurs.

function getAllAgences($sql)
{
    $request = $sql->prepare('SELECT * FROM agences');
    $request->execute();
    $result = $request->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}


$arrayAgences = getAllAgences($pdo);

// --------------- INSERT VEHICULE

if(isset($_POST['valider']))
{
    echo '<pre>';
    print_r($_POST);
    echo '</pre>';
   create($_POST, $pdo);
}

function create($values , $sql)
{
    
    $request = $sql->prepare("INSERT INTO vehicule VALUES (NULL, :id_agence, :titre, :marque, :modele, :dsc, :photo, :prix)");
    $request->bindParam(':id_agence', $values['id_agence']);
    $request->bindParam(':titre', $values['titre']);
    $request->bindParam(':marque', $values['marque']);
    $request->bindParam(':modele', $values['modele']);
    $request->bindParam(':dsc', $values['description']);
    $request->bindParam(':photo', $values['photo']);
    $request->bindParam(':prix', $values['prix']);
    $request->execute();
}


// ------------- GET VEHICULE WITH AGENCE

function show($sql)
{
    $request = $sql->prepare('SELECT ville, vehicule.* FROM vehicule INNER JOIN agences USING(id_agence) WHERE vehicule.id_agence = agences.id_agence');
    $request->execute();
    $result = $request->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

$arrayVehicule = show($pdo);