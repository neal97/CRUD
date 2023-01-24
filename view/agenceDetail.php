<?php require_once('../controller/agenceController.php')?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    

<table>
        <thead>
            <tr>
                <th>Agence</th>
                <th>titre</th>
                <th>adresse</th>
                <th>ville</th>
                <th>cp</th>
                <th>description</th>
                <th>photo</th>
                
            </tr>
        </thead>
        <tbody>
            
                <tr>
                    <td><?= $arrayDetail['id_agence'] ?></td>
                    <td><?= $arrayDetail['titre'] ?></td>
                    <td><?= $arrayDetail['adresse'] ?></td>
                    <td><?= $arrayDetail['ville'] ?></td>
                    <td><?= $arrayDetail['cp'] ?></td>
                    <td><?= $arrayDetail['description'] ?></td>
                    <td><img class="photo" src="<?= $arrayDetail['photo'] ?>" alt=""></td>
                  
                    
                </tr>   
            
            </body>