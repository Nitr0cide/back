<?php

/*
 * Script PHP d'initialisations diverses
 *
 */

// Affichage des erreurs
ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start();

// Inclusion des fichiers de fonctions
include "lib/fonctionsBDD.php";



// Ouverture de la base de données
global $bdd;
$bdd = new PDO("mysql:host=sqlprive-be24678-001.privatesql;dbname=blanchot;charset=UTF8", "blanchot42", "Webecom42");

