<?php

var_dump($_POST);
//Traitement formulaire

if(!empty($_POST)) {
  //Post pas vide, on verifie que toutes les données sont présentes

  if(
    isset($_POST["nom"], $_POST["adresse"], $_POST["reference"])
    && !empty($_POST["nom"]) && !empty($_POST["adresse"]) &&  !empty($_POST["reference"])
  ) {
    //formulaire complet
    

    //Sécurisation des données
     $nom = htmlspecialchars($_POST["nom"]);
     $adresse = htmlspecialchars($_POST["adresse"]);
     $reference = htmlspecialchars($_POST["reference"]);


     //On peut les enregistrer
     //Connexion à la base de données

     //Definition de constante d'environnement

      define("DBHOST", "localhost");
      define("DBUSER", "root");
      define("DBPASS", "");
      define("DBNAME", "test");

      //DSN de connexion

      $dsn = "mysql:dbname=".DBNAME.";host=".DBHOST;

      //On va se connecter à la base 

      try{
        //On instancie PDO

          $db = new PDO($dsn, DBUSER, DBPASS);

          //On s'assure d'envoyer les données en utf8

          $db->exec("SET NAMES utf8");
      }catch(PDOException $e){
          die($e->getMessage());
      }

      //Ici on est connectés à la base 
      //On peut recuperer les infos d'une table

  } else {
    die("Formulaire pas complet");
  }
    
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />
    <title>Document</title>
  </head>
  <body>
    <h1>Ajouter un client</h1>
    <form action="" method="post">
      <label for="nom">Nom Client </label>
      <input type="text" name="nom" id="nom" /> <br />
      <label for="Adresse">Adresse Client</label>
      <input type="text" name="adresse" id="adresse" /> <br />
      <label for="reference">Reference Client</label>
      <input type="text" name="reference" id="reference" />
      <input type="submit" value="Creer client" />
    </form>
  </body>
</html>
