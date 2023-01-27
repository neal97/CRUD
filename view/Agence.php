
<?php require_once('./header.php')?>
<?php require_once('../controller/agenceController.php')?>
<?php require_once('../controller/inscriptionController.php')?>




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