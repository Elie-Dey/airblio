// var getHttpRequest = function () {
//   var httpRequest = false;
//   if (window.XMLHttpRequest) {
//     // Mozilla, Safari, IE7+...
//     httpRequest = new XMLHttpRequest();
//   } else if (window.ActiveXObject) {
//     // IE 6 et antérieurs
//     httpRequest = new ActiveXObject("Microsoft.XMLHTTP");
//   }

//   return httpRequest;
// };

// var httpRequest = getHttpRequest();
// httpRequest.open("GET");

// $(document).ready(function () {
//   $("form").submit(function (event) {
//     var formData = {
//       nom: $("#nom").val(),
//       adresse: $("#adresse").val(),
//       reference: $("#reference").val(),
//     };
//     $.ajax({
//       type: "POST" ? url : "connect.php",
//       data: formData,
//       dataType: "json",
//       encode: true,
//     }).done(function (data) {
//       console.log(data);
//     });

//     event.preventDefault();
//   });
// });

function getClients() {
  //Creation d'une requete AJAX pour se connecter au serveur avec le fichier connect.php
  const requeteAjax = new XMLHttpRequest();
  requeteAjax.open("GET", "connect.php");

  //Quand les données sont reçus, les traités sous forme de JSON et les affichés au format HTML

  requeteAjax.onload = function () {
    const resultat = JSON.parse(requeteAjax.responseText);
    const html = resultat
      .map(function (client) {
        return `

     ${client.id}
    ${client.nom}
    ${client.adresse} 
    ${client.reference}<br>
     
      `;
      })
      .join("");

    const clients = document.querySelector(".display-client");
    clients.innerHTML = html;
  };

  //On envoie la requete
  requeteAjax.send();
}

function postClient(event) {
  //Stopper le submit du formulaire

  event.preventDefault();

  //Récuperation des données du formulaire

  const nom = document.querySelector("#nom");
  const adresse = document.querySelector("#adresse");
  const reference = document.querySelector("#reference");

  //Conditionner les données

  const data = new FormData();
  data.append("nom", nom.value);
  data.append("adresse", adresse.value);
  data.append("reference", reference.value);
}
