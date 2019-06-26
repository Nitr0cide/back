<?php

/*
 * Fichier à inclure pour vérifier que l'on est connecté
 */


// Si on enregistre l'info de connexon en booléen dans $_SESSION["connected"]

if ( !isset($_SESSION["connected"]) or $_SESSION["connected"] !== true ) {
    // ON n'est pas connecté, on redirige vers la page de connexion
    header("location: login.php");
    exit;
}

