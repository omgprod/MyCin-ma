$(document).ready(function () {
    $("h1").hide().delay().show('slow');
    $("#acceuil").hide().delay().show('slow');
    $("#inscription").hide().delay().show('slow');
    $("#connexion").hide().delay().show('slow');
    $(".jumbotron").hide().delay().show('slow');

    $( ".btn" ).click(function() {
        $(".h1").fadeOut('slow');
        $("#acceuil").fadeOut('slow');
        $("#inscription").fadeOut('slow');
        $("#connexion").fadeOut('slow');
    });
} );