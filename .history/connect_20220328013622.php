<?php
//Connexion à la base 

define("DBHOST", "localhost");
      define("DBUSER", "root");
      define("DBPASS", "");
      define("DBNAME", "test");

  
 $dsn = "mysql:dbname=".DBNAME.";host=".DBHOST;
 try{
        //On instancie PDO

          $db = new PDO($dsn, DBUSER, DBPASS);

          //On s'assure d'envoyer les données en utf8

          $db->exec("SET NAMES utf8");
      }catch(PDOException $e){
          die($e->getMessage());
      }

// var_dump($_POST);
//Traitement formulaire
// $data = [];
// $errors = [];

// if(!empty($_POST)) {
//   //Post pas vide, on verifie que toutes les données sont présentes

//   if(
//     isset($_POST["nom"], $_POST["adresse"], $_POST["reference"])
//     && !empty($_POST["nom"]) && !empty($_POST["adresse"]) &&  !empty($_POST["reference"])
//   ) {
//     //formulaire complet
    

//     //Sécurisation des données
//      $nom = htmlspecialchars($_POST["nom"]);
//      $adresse = htmlspecialchars($_POST["adresse"]);
//      $reference = htmlspecialchars($_POST["reference"]);


     //On peut les enregistrer
     //Connexion à la base de données

     //Definition de constante d'environnement

      // define("DBHOST", "localhost");
      // define("DBUSER", "root");
      // define("DBPASS", "");
      // define("DBNAME", "test");

      //DSN de connexion

      // $dsn = "mysql:dbname=".DBNAME.";host=".DBHOST;

      //On va se connecter à la base 

      // try{
      //   //On instancie PDO

      //     $db = new PDO($dsn, DBUSER, DBPASS);

      //     //On s'assure d'envoyer les données en utf8

      //     $db->exec("SET NAMES utf8");
      // }catch(PDOException $e){
      //     die($e->getMessage());
      // }

      // $data['success'] = true ;
      // $data['message '] = 'Success';
      // echo json_encode($data);
      //Ici on est connectés à la base 
      //On peut recuperer les infos d'une table

      // $sql = "SELECT * FROM `client` ";

      //On execute directement la requette 

      // $requete = $db->query($sql);

      //On recupere les données (fetch ou fetchAll)

      // $client = $requete->fetch(PDO::FETCH_ASSOC);
      // $clients = $requete->fetchAll(PDO::FETCH_ASSOC);
    
      //Ajouter un client
      // NSERT INTO `client` (`id`, `nom`, `adresse`, `reference`) VALUES (NULL, 'SEA', 'Marseille', 'SEMA');
      // $sql = "INSERT INTO `client` (`id`, `nom`, `adresse`, `reference`) 
      //         VALUES (NULL, 'BOATS', 'Nice', 'BONI')";


      //On ecrit la requete 

      // $sql = "INSERT INTO `client` (`id`, `nom`, `adresse`, `reference`) 
      //         VALUES (NULL, :nom, :adresse, :reference)";

      //on prepare la requete
      // $query =$db->prepare($sql);

      //On injecte les valeurs
      
      // $query->bindValue(":nom", $nom);
      // $query->bindValue(":adresse", $adresse);
      // $query->bindValue(":reference", $reference);

      //On execute la requete 

//       if(!$query->execute()){
//         die("Une erreur est survenue ");

//       };

//       //On recupere d'Id du client
//       $id = $db->lastInsertId();
//       die("Client ajouté sous le numero $id");
//       // $requete = $db->query($sql);

//   } else {
//     die("Formulaire pas complet");
//   }
    
// }



$task = "list";

if(array_key_exists("task", $_GET)){
  $task = $_GET["task"];
  
}

if($task == "write"){
  // postClients();

} else {
  getClients();
}


//Fonction getClients pour obtenir l'ensemble de clients
function getClients(){
  global $db;

  //Requete sur la base de données pour avoir la liste des client;

   $resultats = $db->query("SELECT * FROM client");
  //  $rows = array();

  // if($resultats){
  //   $num = $resultats->rowCount();
  //   for($i = 0; $i < $num; $i++){
  //     $rows[] = $resultats->fetch(PDO::FETCH_ASSOC);
  //   }
  // }
  // $json = json_encode($rows);
 
  // //On traie les resultats 

  $clients = $resultats->fetchAll();
  // echo json_encode($clients);
 
    echo json_encode($clients);
  
}