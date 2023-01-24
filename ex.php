<?php require_once('./config.php');

/*
Prepare() puis Execute()/
    INSERT,UPDATE,DELETE,SELECT    : prepare() permet de préparer la requête mais ne l'exécute pas.
        Execute() permet d'exécuter une requête préparé.
        Ceci est à préconiser si vous exécuter plusieurs fois la même requête et ainsi vouloir éviter le cycle : Annalyse / Interpretation / Exécution
*/

$request = $database->prepare("SELECT * FROM abonne ");
$request->execute();
$result = $request->fetchAll(PDO::FETCH_ASSOC);//

$request2 = $database->prepare("SELECT auteur, titre FROM livre");
$request2->execute();
$result2 = $request2->fetchAll(PDO::FETCH_ASSOC);

echo '<pre>';
print_r($result);
echo '</pre>';

// echo '<pre>';
// print_r($result2);
// echo '</pre>';



/*
 SANS FETCH_ASSOC
    [0] => prenom
    [prenom] => prenom
    [1] => nom
    [nom] => nom

AVEC FETCH_ASSOC
    [prenom] => prenom 
    [nom] => prenom

*/
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FLY</title>
</head>
<body>
    <header>
        <h1>BIBLIOTHEQUE 🤯</h1>
    </header>
    <table>
        <thead>
            <tr>
                <th>Abonne</th>
            </tr>
        </thead>
    
        <tbody>
            <?php foreach($result as $values): ?>
                <tr>
                    <td><?= $values['prenom']?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <table>
        <thead>
            <tr>
                <th>Auteur</th>
                <th>Livre</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($result2 as $values): ?>
                <tr>
                    <td><?= $values['auteur'] ?></td>
                    <td><?= $values['titre'] ?></td>
                </tr>    
            <?php endforeach ?>

        </tbody>
    </table>
</body>
</html>