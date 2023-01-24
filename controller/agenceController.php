<?php

ini_set("display_errors", 1); // Permet d'afficher tous les messages d'erreurs.

class Agence{

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

      /* 
      On crée notre function (add) avec un argument ($values) qui réceptionneront $_POST, 
      $values deviendra alors une copie de $_POST.
  */
    public function add($values)
    {
      /*
          On utilise la methode prépare de notre objet ($sql) pour écrire notre requête de type INSERT INTO.
        */
        // CREATE Agence
        $req = $this->pdo()->prepare('INSERT INTO agences VALUES (NULL, :titre, :adresse, :ville, :cp, :description, :photo) ');
        /*
          On utilise la function bindParam pour lier un paramètre a une variable spécifique afin de lui transmettre des données.
        */
        $req->bindParam(':titre', $values['titre'] );
        $req->bindParam(':adresse', $values['adresse'] );
        $req->bindParam(':ville', $values['ville'] );
        $req->bindParam(':cp', $values['cp'] );
        $req->bindParam(':description', $values['description'] );
        $req->bindParam(':photo', $values['photo'] );

        $req->execute();
    }

    public function show()
    {
        $req = $this->pdo()->prepare('SELECT * FROM agences  ');
        $req->execute();
        $result = $req->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function delete($id)
    {
         $req = $this->pdo()->prepare('DELETE FROM agences WHERE id_agence = ?    ');
         $req->execute([$id]);

       
    }

    public function getAgenceById($id)
    {
        $req = $this->pdo()->prepare('SELECT * FROM agences WHERE id_agence = ? ');
        
         $req->execute([$id]);
        
        $result = $req->fetch(PDO::FETCH_ASSOC);


        
       

        return $result;
    }



    public function detail($id){
      $req = $this->pdo()->prepare('SELECT * FROM agences WHERE id_agence = ? ');
      $req->execute([$id]);
      $result = $req->fetch(PDO::FETCH_ASSOC);
      return $result;
    }

    public function update($values)
    {
      print_r($values);
        $req = $this->pdo()->prepare('UPDATE agences SET titre = :titre , adresse = :adresse , ville = :ville , cp = :cp  , description = :description , photo = :photo  WHERE id_agence = :id');
       
        $req->bindParam(':id', $values['id_agence'] );
        $req->bindParam(':titre', $values['titre'] );
        $req->bindParam(':adresse', $values['adresse'] );
        $req->bindParam(':ville', $values['ville'] );
        $req->bindParam(':cp', $values['cp'] );
        $req->bindParam(':description', $values['description'] );
        $req->bindParam(':photo', $values['photo'] );
        

        $req->execute();

       
    } 

}
$agence = new Agence;

$tableAgence = $agence->show();

/* 
  Cette ligne nous permet de savoir si on clic sur le button (valide_agence) de notre formulaire.
*/
if(isset($_POST['valider_agence']))
{
   /* 
    Quand on clic sur le button valider de notre formulaire, 
    on appel notre function (add) en lui transmettant les données récupérées de notre formulaire qui ont été stocké dans la super global $_POST.
  */
    $agence->add($_POST);
    header('Location: Agence.php');
}

// ------------------ ACTION - $_GET

/* 
  ETAPE ACTION
    Si le param actions est défini dans l'url (?actions) 
    On enregistre sa valeur dans la variable $actions
    Sinon on enregistre NULL
    Cela sert à ne pas avoir d'erreur dans le cas ou l'internaute modifie le param (?actions) 
    qui se trouve dans l'url, par autre chose.

  VERSION TERNAIRE
    $actions = isset($_GET['actions']) ? $_GET['actions'] : NULL;

  VERSION CLASSIC

    if(isset($_GET['actions']))
    {
      $actions = $_GET['actions'];
    }
    else
    {
      $actions = NULL;
    }
*/

$action = isset($_GET['action']) ? $_GET['action'] : NULL ;

if ($action == 'delete') {
    
   $agence->delete($_GET['id']);

   header('Location: Agence.php');
}

if ($action == 'update') {
    echo 'test';
   
  $modTable =  $agence->getAgenceById($_GET['id']);

    
 }


 if(isset($_POST['valider_form']))
{
   /* 
    Quand on clic sur le button valider de notre formulaire, 
    on appel notre function (add) en lui transmettant les données récupérées de notre formulaire qui ont été stocké dans la super global $_POST.
  */
   $updateTable = $agence->update($_POST);
    
  

}


 if($action == 'detail'){
  $arrayDetail = $agence->detail($_GET['id']);

  
  

 }
