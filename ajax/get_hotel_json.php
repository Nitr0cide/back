<?php

// URL permettant de récupérer la description d'un hotel au format Json
// Paramètres (GET) :
//      id : id de l'hotel

include "lib/init.php";

if (isset($_REQUEST["id"])) {           // $_REQUEST est l'union de $_GET et $_POST
    $hotel = getHotel($_REQUEST["id"]);
} else {
    $hotel = [];
}

header('content-type:application/json');
echo json_encode($hotel);

