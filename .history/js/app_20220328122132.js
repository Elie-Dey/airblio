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
    
    <td>${client.id}</td> 
    <td>${client.nom}</td> 
    <td>${client.adresse}</td>  
    <td>${client.reference}</td>  
     <br>
      `;
      })
      .join("");

    const clients = document.querySelector(".display-client");
    clients.innerHTML = html;
  };

  //On envoie la requete
  requeteAjax.send();
}
