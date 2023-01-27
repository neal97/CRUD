<?php require_once('./header.php')?>
<?php require_once('../controller/membreController.php');?>





<table>
<thead>
    <th></th>
    <th></th>
    <th></th>
    <th></th>
    <th></th>
</thead>
<tr>
                <th>id membre</th>
                <th>pseudo</th>
                <th>prenom</th>
                <th>nom</th>
                <th>email</th>
                <th>civilité</th>
                <th>statut</th>
                <th>date d'enregistrement</th>
            </tr>

   <tbody>

   <?php foreach($tableMembre as $values): ?>  
<tr>

<td><?=$values['id_membre'] ?></td>
<td><?=$values['pseudo'] ?></td>
<td><?=$values['prenom'] ?></td>
<td><?=$values['nom'] ?></td>
<td><?=$values['email'] ?></td>
<td><?=$values['civilite'] ?></td>
<td><?=$values['statut'] ?></td>
<td><?=$values['date_enregistrement'] ?></td>

<td>
                       
    <a href=""><img class="icone" src="../assets/img/loupe.png" alt=""></a>
    <a href="membreUpdate.php?action=update&id=<?= $values['id_membre'] ?>"><img class="icone" src="../assets/img/modifier" alt=""></a>
    <a href="?action=delete&id=<?= $values['id_membre'] ?>"><img class="icone" src="../assets/img/poubelle.png" alt=""></a>
    </td>
                    
</tr>

<?php endforeach ?>


   </tbody>         


</table>



<form method="post">


<label for="">pseudo</label>
<input name="pseudo" type="text">

<label for="">mdp</label>
<input name="mdp" type="password">

<label for="">nom</label>
<input name="nom" type="text">

<label for="">prenom</label>
<input name="prenom" type="text">

<label for="">email</label>
<input name="email" type="email">

<label for="">civilité</label>
<select name="civilite" id="">
    <option value="m">Homme</option>
    <option value="f">Femme</option>
</select>


<label for="">statut</label>
<select name="statut" id="">
    <option value="1">Admin</option>
    <option value="2">User</option>
</select>




<input name="validemembre" type="submit">


</form>