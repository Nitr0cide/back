<?php

/*
 * Initialisations diverses
 */

// Affichage des message d'erreur pour le debug
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Démarage de la session
session_start();   // Cette instructioncrée ou récupère la variable $_SESSION associée à une session précise (un navigateur sur un équipement)


// Ouverture de la base de données
global $bdd;
$bdd = new PDO("mysql:host=sqlprive-be24678-001.privatesql;dbname=blanchot;charset=UTF8", "blanchot42", "Webecom42");

// Include des déclarations de fonctions
include("lib/fonctions.php");





