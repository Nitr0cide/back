<?php

/*
 * Suppression d'une réservation
 *
 * Paramètres : id de la réservation (paramètre id passé en GET)
 *
 */



// supprimer la réservation
$res = new réservation($_GET["id"]);
$res->delete();

// Afficher la liste des réservations
// récupérer la liste
$listeResa = $res->liste();
// aficher le template
include "template/pages/liste_resa.php";

