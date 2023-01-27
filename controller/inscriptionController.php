<?php require_once('./header.php')?>

<?php

ini_set("display_errors", 1); // Permet d'afficher tous les messages d'erreurs.

class Inscription{

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
 
 
 
     public function signup($values)
     { 
    //    var_dump($values);
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

     public function login($values){

        // var_dump($values);
        $email = $values['email'];
        $mdp = $values['mdp'];

        $checkemail = $this->pdo()->prepare('SELECT email from membre where email = ? ');


        $checkemail->execute([$email]);

       $result = $checkemail->fetch(PDO::FETCH_ASSOC);

        echo count($result);

        
        $checkmdp = $this->pdo()->prepare('SELECT mdp from membre where mdp = ? ');


        $checkmdp->execute([$mdp]);

       $result1 = $checkmdp->fetch(PDO::FETCH_ASSOC);
       

       if(count($result) > 0 && count($result1) >0 ){
        // session_start() ;
        echo 'success';

        
        $_SESSION["email"] = $email;
        print_r($_SESSION);

        

       }else{

        echo 'mot de passe ou email incorrect' ;
       }

     

        
     }


     public function logout(){
        $action = isset($_GET["action"]) ? $_GET["action"] : NULL;

       
if($action == "logout"){

  session_destroy();
  header("Location: agence.php");

}

     }



}





$inscrit = new Inscription;


if(isset($_POST['valideinscrire'])) $inscrit->signup($_POST);

if(isset($_POST['valideco'])) $inscrit->login($_POST);

$inscrit->logout();
