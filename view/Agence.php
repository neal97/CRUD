<?php require_once('../controller/agenceController.php')?>
<?php require_once('../controller/header.php')?>



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
                <th>action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($tableAgence as $values): ?>
                <tr>
                    <td><?= $values['id_agence'] ?></td>
                    <td><?= $values['titre'] ?></td>
                    <td><?= $values['adresse'] ?></td>
                    <td><?= $values['ville'] ?></td>
                    <td><?= $values['cp'] ?></td>
                    <td><?= $values['description'] ?></td>
                    <td><img class="photo" src="<?= $values['photo'] ?>" alt=""></td>
                    <td>
                       
                        <a href="agenceDetail.php?action=detail&id=<?= $values['id_agence'] ?>"><img class="icone" src="../assets/img/loupe.png" alt=""></a>
                        <a href="agenceUpdate.php?action=update&id=<?= $values['id_agence'] ?>"><img class="icone" src="../assets/img/modifier" alt=""></a>
                        <a href="?action=delete&id=<?= $values['id_agence'] ?>"><img class="icone" src="../assets/img/poubelle.png" alt=""></a>
                </td>
                    
                </tr>    
            <?php endforeach ?>

        </tbody>
    </table>
    
    <form method="post">
        <label for="">titre</label>
        <input type="text" name="titre">

        <label for="">adresse</label>
        <input type="text" name="adresse">

        <label for="">ville</label>
        <input type="text" name="ville">

        <label for="">code postale</label>
        <input type="number" name="cp">

        <label for="">description</label>
        <input type="text" name="description">

        <label for="">photo</label>
        <input type="text" name="photo">

        <button name="valider_agence">Valider</button>
    </form>

</body>
</html>