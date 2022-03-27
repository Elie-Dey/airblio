<?php

var_dump($_POST);
//Traitement formulaire

if(!empty($_POST)) {
  //Post pas vide, on verifie que toutes les données sont présentes

  if(
    isset($_POST["nom"], $_POST["adresse"], $_POST["reference"])
    && !empty($_POST["titre"]) && !empty($_POST["adresse"]) &&  !empty($_POST["reference"])
  ) {
     
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
