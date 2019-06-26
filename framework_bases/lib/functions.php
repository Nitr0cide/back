<?php

// FONCTION DEBUG

function debug($error) {
    global $errorCount;
    // met en page les erreurs rencontrées
    echo "<div id='$errorCount'>";
    echo "<pre>";
    echo "<p class='error'> Erreur rencontrée : $error </p>";
    echo "<pre>";
    echo "</div>";
    $errorCount++;
}

function afficheForm($nomFichier, $mode = "create") {
    // Va nous afficher les formulaires automatiquement en fonction des paramètres
    // Paramètres : 
    //      $nomFichier : Nom du fichier template à afficher, 
    //      $mode : le mode d'affichage de celui ci

    if (file_exists("templates/pages/". $nomFichier . "Form.php")) { 
        include "templates/pages/" . $nomFichier . 'Form.php';
    }
}

?>