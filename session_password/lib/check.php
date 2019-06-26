<?php

/*
 * Vérifie si on est connecté : ce fichier doi être inclu avant toute action nécessistant d'être connecté
 */


// Quand on est connecté, on a stocké true dans $_SESSION["connected"]

if (  !isset($_SESSION["connected"]) or  $_SESSION["connected"] === false ) {
    // Nnn conecté : actions spacifique
    // rediriger vers la page de login, et s'arrêter là
    // Soit par affichage du template de login, soit par redirection
    // Redirection
    header("location: login.php");
    exit;       // On arrête le programe là, on ne peut pas aller plus loin
}

