<?php

ini_set("display_errors", 1); // Permet d'afficher tous les messages d'erreurs.

class Membre{

   /**
   *  Permet de stocker un objet issu de la classe PDO, C'est à dire la connexion à la BDD.
   */
    private $sql;

      /**
   * Constantes qui vont nous permettre de définir notre BDD.
   */
    const LOCALHOST = 'localhost';
    const DB_NAME = 'veville';
    const USER = 'root';
    const PASSWORD = '';

    public function pdo()
    {
        /**
       * New PDO = 1 (serveur + base de données ), 2 (pseudo), 3 (mdp), 4 (options).
       * Try et Catch permettent d'avoir 2 blocs d'instructions distinct.
       * Exception est une classe prédéfinie.
       * Une exception est une erreur que l'on peut attraper grâce aux mots-clé try et catch.
       * Die a pour but de stopper l'exécution de votre script et d'afficher le message que vous aurez éventuellement spécifié.
       * Die est très courant pour gérer les erreurs de connexion aux bases de données ou les erreurs de chemin lors des inclusions.
       */
       if(!$this->sql)
       {
        try{
            $this->sql = new PDO("mysql:host=" . SELF::LOCALHOST . ";dbname=" . SELF::DB_NAME, SELF::USER, SELF::PASSWORD,
            array(
              PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
              PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
        }
        catch(Exception $error)
        {
            die("Probleme connexion : " . $error->getMessage());
        }
       }
       return $this->sql; // On retourne l'objet SQL (pdo)
    }



    public function add($values)
    { 
      var_dump($values);
      /*
          On utilise la methode prépare de notre objet ($sql) pour écrire notre requête de type INSERT INTO.
        */
        // CREATE Agence
        $req = $this->pdo()->prepare('INSERT INTO membre VALUES (NULL, :pseudo, :mdp, :nom, :prenom, :email, :civilite, :statut, CURRENT_DATE()) ');
        /*
          On utilise la function bindParam pour lier un paramètre a une variable spécifique afin de lui transmettre des données.
        */
        $req->bindParam(':pseudo', $values['pseudo'] );
        $req->bindParam(':mdp', $values['mdp'] );
        $req->bindParam(':nom', $values['nom'] );
        $req->bindParam(':prenom', $values['prenom'] );
        $req->bindParam(':email', $values['email'] );
        $req->bindParam(':civilite', $values['civilite'] );
        $req->bindParam(':statut', $values['statut'] );
        
        $req->execute();
        // header('Location: Membre.php');
    }



    public function show()
    {
        $req = $this->pdo()->prepare('SELECT * FROM membre  ');
        $req->execute();
        $result = $req->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }



    public function delete($id){

      $req = $this->pdo()->prepare('DELETE FROM membre WHERE id_membre = ? ');
      $req->execute([$id]);
    }




    public function update($values){

      $req = $this->pdo()->prepare('UPDATE membre SET pseudo = :pseudo , mdp = :mdp , nom = :nom , prenom = :prenom ,
       email = :email , civilite = :civilite , statut = :statut WHERE id_membre = :id  ');

      $req->bindParam(':id', $values['id_membre'] );
      $req->bindParam(':pseudo', $values['pseudo'] );
      $req->bindParam(':mdp', $values['mdp'] );
      $req->bindParam(':nom', $values['nom'] );
      $req->bindParam(':prenom', $values['prenom'] );
      $req->bindParam(':email', $values['email'] );
      $req->bindParam(':civilite', $values['civilite'] );
      $req->bindParam(':statut', $values['statut'] );

      $req->execute();

      

    }


    public function getMembreById($id){

      $req = $this->pdo()->prepare('SELECT * FROM membre WHERE id_membre = ?');

      $req->execute([$id]);

      $result = $req->fetch(PDO::FETCH_ASSOC);

      return $result;

    }



}


$membre = new Membre;

if(isset($_POST['validemembre']))
{
   /* 
    Quand on clic sur le button valider de notre formulaire, 
    on appel notre function (add) en lui transmettant les données récupérées de notre formulaire qui ont été stocké dans la super global $_POST.
  */
    $membre->add($_POST);
    
}

$tableMembre = $membre->show();

$action = isset($_GET['action']) ? $_GET['action'] : NULL ;

if($action == 'delete'){

  $membre->delete($_GET['id']);

  header('Location: Membre.php');
}


if($action == 'update'){

$tabmod = $membre->getMembreById($_GET['id']);

}

if(isset($_POST['validemod'])){

    var_dump($_POST);
     
  $membremod = $membre->update($_POST);
 

}