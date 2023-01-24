<?php require_once('../controller/agenceController.php')?>
<?php require_once('../controller/header.php')?>
<?php var_dump($modTable) ?>


<form method="post">


        <label for="">titre</label>
        <input type="text" name="titre" value="<?= $modTable['titre']; ?>">

        <label for="">adresse</label>
        <input type="text" name="adresse" value="<?= $modTable['adresse']; ?>">

        <label for="">ville</label>
        <input type="text" name="ville" value="<?= $modTable['ville']; ?>">

        <label for="">code postale</label>
        <input type="number" name="cp" value="<?= $modTable['cp']; ?>">

        <label for="">description</label>
        <input type="text" name="description" value="<?= $modTable['description']; ?>">

        <label for="">photo</label>
        <input type="text" name="photo" value="<?= $modTable['photo']; ?>">

        
        <input type="hidden" name="id_agence" value="<?= $modTable['id_agence']; ?>">


        <button name="valider_form">Valider</button>

    </form>