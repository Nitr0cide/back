<?php

/*
 * Programme affichant la liste des hotels pour en modifier un
 */


include "lib/init.php";


// Récupérer la liste des hotels
$hotel = new hotel();       // On a besoin pour cela d'un objet de la classe hotel
$hotels = $hotel->liste();

// Afficher la liste
include "templates/pages/liste_hotels.php";

