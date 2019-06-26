<?php

ini_set('display_errors', 1);

error_reporting(E_ALL);
global $bdd;
// Compteur d'erreurs pour notre fonction debug
global $errorCount;

if (empty($errorCount)) {
    $errorCount = 0;
}

// On include notre fichier fonctions.php 
include_once "lib/functions.php";

// Connection à la base de données

$bdd = new PDO("mysql:host=sqlprive-be24678-001.privatesql;dbname=badol;charset=UTF8", "badol", "Leonidas42");

if ($bdd) {
    echo "CONNECTION OK";
}

include_once "classes/model.php";
include_once "classes/model_financements.php";
include_once "classes/model_projets.php";
include_once "classes/model_types.php";
include_once "classes/model_utilisateurs.php";
