<?php session_start(); ?>
<?php require_once('../controller/inscriptionController.php')?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/style.css">

    <title>Document</title>
</head>
<body>
    


<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="?action=agence">Agence</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="?action=vehicule">Vehicule</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="?action=membre">membre</a>
        </li>
       
      </ul>
    </div>
  </div>
</nav>


</body>
</html>

<?php 


$action = isset($_GET["action"]) ? $_GET["action"] : NULL;

if($action == "vehicule"){

    header("Location: vehicule.php");
}

if($action == "agence"){

    header("Location: agence.php");
}

if($action == "membre"){

    header("Location: membre.php");
}


?> 



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">S'inscrire</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method="post">


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


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
        <button type="submit" name="valideinscrire" class="btn btn-warning">S'inscrire</button>
      </div>
    </div>
    </form>


  </div>
</div>





<!-- Modal -->
<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Connexion</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method="post">


      <form method="post">

<label for="">email</label>
<input name="email" type="email">

<label for="">mdp</label>
<input name="mdp" type="password">




      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
        <button type="submit" name="valideco" class="btn btn-primary">Se connecter</button>
      </div>
    </div>
    </form>


  </div>
</div>
<?php var_dump($_SESSION); ?>


<?php if(isset($_SESSION) && isset($_SESSION['email'])):?>
<?= 'HELLO ' . $_SESSION['email']; ?>
<a href="?action=logout"><h4>Déconnexion</h4></a>


<?php else: ?>

<!-- Button trigger modal -->
<button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Inscription
</button>

  <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal1">
  Connexion
</button>

<?php endif; ?>



        

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>