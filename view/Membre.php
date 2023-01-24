
<?php require_once('./config.php');?>
<?php require_once('../controller/header.php')?>





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
<tr>

<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td>
                       
                        <a href=""><img class="icone" src="../assets/img/loupe.png" alt=""></a>
                        <a href=""><img class="icone" src="../assets/img/modifier" alt=""></a>
                        <a href=""><img class="icone" src="../assets/img/poubelle.png" alt=""></a>
                </td>
                    
</tr>




   </tbody>         


</table>



<form action="">

<label for="">id membre</label>
<input name="id_membre" type="text">

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
    <option value="homme">Homme</option>
    <option value="femme">Femme</option>
</select>


<label for="">statut</label>
<select name="statut" id="">
    <option value="admin">Admin</option>
    <option value="user">User</option>
</select>

<label for="">date d'enregistrement</label>
<input name="date_enregistrement" type="text">


<input type="submit">


</form>