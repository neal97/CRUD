<?php require_once('../controller/membreController.php')?>
<?php require_once('./header.php')?>


<?php var_dump($tabmod) ?>
    
<form method="post">


<input name="id_membre" type="hidden"  value="<?= $tabmod['id_membre']; ?>">

<label for="">pseudo</label>
<input name="pseudo" type="text" value="<?= $tabmod['pseudo']; ?>">

<label for="">mdp</label>
<input name="mdp" type="password" value="<?= $tabmod['mdp']; ?>">

<label for="">nom</label>
<input name="nom" type="text" value="<?= $tabmod['nom']; ?>">

<label for="">prenom</label>
<input name="prenom" type="text" value="<?= $tabmod['prenom']; ?>">

<label for="">email</label>
<input name="email" type="email" value="<?= $tabmod['email']; ?>">

<label for="">civilité</label>
<select name="civilite" id="" value="<?= $tabmod['civilite']; ?>">
    <option value="m" >Homme</option>
    <option value="f">Femme</option>
</select>


<label for="">statut</label>
<select name="statut" id="" value="<?= $tabmod['statut']; ?>">
    <option value="1">Admin</option>
    <option value="2">User</option>
</select>




<input name="validemod" type="submit">


</form>

