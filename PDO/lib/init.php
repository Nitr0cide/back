<?php

/*
 * Initialisations diverses
 */

// Affichage des message d'erreur pour le debug
ini_set('display_errors', 1);
error_reporting(E_ALL);


// Ouverture de la base de données
global $bdd;
$bdd = new PDO("mysql:host=sqlprive-be24678-001.privatesql;dbname=blanchot;charset=UTF8", "blanchot42", "Webecom42");

// Include des déclarations de fonctions
include_once "lib/fonctionsBDD.php";




