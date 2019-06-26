<?php

/*
 * Fonctions diverses
 */


function getContenu($code) {
    // Rôle : retourner le contenu associé à un code
    // Retour : le contenu (chaine de caractères)
    // Paramètres :
    //          $code : code dont on cherce le contenu


    // Faire une requête sur la base de données pour récupérer le contenu
    //      Dans la table "elements", va chercher la ligne dont le code est $code (ligne unique), et récupère le contenu

    // Construit la requête SQL
    $sql = "SELECT `contenu` FROM `elements` WHERE `code` = :code ";
    // Récupération de la BDD
    global $bdd;
    // Préparation de la requête
    $req = $bdd->prepare($sql);
    // Exécution de la requête
    if ( ! $req->execute( [ ":code" => $code  ]) )  {
        // Le résultat est "false", on a donc échoué (erreur dans la requête)
        return "";
    }

    // La requête est passée : on récupère la 1ère ligne (ligne unique)
    $ligne = $req->fetch(PDO::FETCH_ASSOC);

    if ($ligne === false) {
        // On n'a pas trouvé le code
        return "";      // On retourne une chaine vide
    } else {
        return nl2br(htmlentities($ligne["contenu"]));
    }



}




