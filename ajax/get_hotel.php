<?php


// URL permettant de donner la description d'un hotel au format HTML (DIV)
// Paramètres (GET) :
//      id : id de l'hotel

include "lib/init.php";

if (isset($_REQUEST["id"])) {           // $_REQUEST est l'union de $_GET et $_POST
    $hotel = getHotel($_REQUEST["id"]);
} else {
    $hotel = [];
}

// Générer le HTML (contenu d'une div)
// variable $hotel chargée


// Réponse selon le format demandé
include "templates/fragments/hotel.php";

