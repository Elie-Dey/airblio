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

$(document).ready(function () {
  $("form").submit(function (event) {
    var formData = {
      nom: $("#nom").val(),
      adresse: $("#adresse").val(),
      reference: $("#reference").val(),
    };
    $.ajax({
      type: "POST" ? url : "connect.php",
      data: formData,
      dataType: "json",
      encode: true,
    }).done(function (data) {
      console.log(data);
    });

    event.preventDefault();
  });
});

// function getClients() {
//   //Creation d'une requete AJAX pour se connecter au serveur avec le fichier connect.php
//   const requeteAjax = new XMLHttpRequest();
//   requeteAjax.open("GET", "connect.php");

//   //Quand les données sont reçus, les traités sous forme de JSON et les affichés au format HTML

//   requeteAjax.onload = function () {
//     const resultat = JSON.parse(requeteAjax.responseText);
//     console.log(resultat);
//   };

//   //On envoie la requete
//   requeteAjax.send();
// }
// $(document).ready(function () {
//   $("#display").click(function () {
//     $.ajax({
//       //create an ajax request to display.php
//       type: "GET",
//       url: "connect.php",
//       dataType: "html", //expect html to be returned
//       success: function (response) {
//         $("#responsecontainer").html(response);
//         //alert(response);
//       },
//     });
//   });
// });
