<?php

/*
 * Fonctions diverses
 */

function verifConnexion($login, $password) {
    // Rôle : vérifier si les codes de connexion sont corrects, comlpléeter $_SESSION en conséquence
    // REtour : true si connecté, false sinon
    // Paramètres :
    //      $login : login saisi
    //      $password : mot de passe saisi


    // Recherche du login dans la base de données, ou test du login "en dur"
    if ($login !== "administrateur") {          // ON teste que le login saisi est bien administrateur
        // Le login n'est pas bon
        echo "Login incorrect<br>";
        $_SESSION["connected"] = false;     // On déconnecte
        return false;

    }

    // Le login est bon
    // On récupère le mot de passe haché (soit par ce qui est remonté de la base, soit en dur
    $hash = "$2y$10$2UDVjf30Lf4E2eTa3k1RQ.Z3eh7WmZPo1tZf0v3jFitMgiopNRYXi";
    // ON vérifie le mote de passe
    if (!password_verify($password, $hash)) {
        // Ce n'est pas bon
        echo "Echec vérification du mot de passe<br>";
        $_SESSION["connected"] = false;     // On déconnecte
        return false;
    }

    // Mot de passe et login sont bons : on se connecte
     $_SESSION["connected"] = true;
     // Si on a un user issu d'une base de donnée,  on doit aussi mémoriser son id, par exemple dans $_SESSION["id"];
     return true;

}