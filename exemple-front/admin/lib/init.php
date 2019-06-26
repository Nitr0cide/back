<?php

/*
 * Initialisations diverses
 */

// Affichage des message d'erreur pour le debug
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Démarrage / récupération la session
session_start();        // Doit être passé avant tout afficahge (donc avant tout code HTML, init doit donc être avant DOCTYPE)


// Ouverture de la base de données
global $bdd;
$bdd = new PDO("mysql:host=sqlprive-be24678-001.privatesql;dbname=blanchot;charset=UTF8", "blanchot42", "Webecom42");

// Include des déclarations de fonctions
include "lib/fonctions.php";




