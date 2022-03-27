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
      type: "POST" ? url : "php/connect.php",
      data: formData,
      dataType: "json",
      encode: true,
    }).done(function (data) {
      console.log(data);
    });

    event.preventDefault();
  });
});
