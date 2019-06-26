<?php

/*
 * Fonctions diverses
 */


function rubriques() {
    // Rôle : récupérer la liste des rubriques
    // Retour : un tableau de rubriques, de la forme [  code1 => libele1, code2 => libelle2, .... ]
    // Paramètres : néant


    // Construire  la requête qui retourne les rubriques
    $sql = "SELECT * FROM `elements_rubrique";
    // La préparer
    global $bdd;
    $req = $bdd->prepare($sql);
    // Exécution de la requête
    if ( ! $req->execute() )  {
        // Le résultat est "false", on a donc échoué (erreur dans la requête)
        return [];          // On n'a pas trouvé de rubrique, on retoyrne un tableau vide
    }

    // Récupérer les lignes et les mettrre en forme pour le retour
    $retour = [];           // Tableau vide pour le remplir progressivement
    // Parcourir le résultat de la requête
    while($ligne = $req->fetch(PDO::FETCH_ASSOC)) {
        // $ligne est une ligne de la table des rubriques
        $retour[$ligne["code"]] = $ligne["libelle"];        // On stocke le libellé de la rubrique dans le tableau de retour, à l'index correspondant au code de la runbrique

    }

    // Retourner le tableau final
    return $retour;


}


function elements($rubrique) {
    // Rôle : récupérer la liste des éléments d'une rubrique (le code, le libellé, le contenu)
    // Retour : un tableau de rubriques, de la forme [  [ "code" => code1, "libelle" => libelle1, "contenu" => contenu1 ], ... ]
    // Paramètres :
    //      $rubrique : code de la rubrique


    // Construire  la requête qui retourne les rubriques
    $sql = "SELECT `code`, `libelle`, `contenu` FROM `elements` WHERE `rubrique` = :rubrique  ORDER BY `code`";
    // La préparer
    global $bdd;
    $req = $bdd->prepare($sql);
    // Exécution de la requête
    if ( ! $req->execute([ ":rubrique" => $rubrique ]) )  {
        // Le résultat est "false", on a donc échoué (erreur dans la requête)
        return [];          // On n'a pas trouvé de rubrique, on retoyrne un tableau vide
    }


    // Retourner le tableau final
    return $req->fetchAll(PDO::FETCH_ASSOC);


}



function getLibRubrique($code) {
    // Rôle : retourner le libellé d'une rubrique
    // Retour : le libellé (chaine de caractères)
    // Paramètres :
    //          $code : code de la rubrique cherchée


    // Faire une requête sur la base de données pour récupérer le contenu
    //      Dans la table "elements", va chercher la ligne dont le code est $code (ligne unique), et récupère le contenu

    // Construit la requête SQL
    $sql = "SELECT `libelle` FROM `elements_rubrique` WHERE `code` = :code ";
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
        return $ligne["libelle"];
    }


}



function getElement($code) {
    // Rôle : retourner un élément associé à un code
    // Retour : un tableau contenant les différents champs de l'élément, ou false si il n'y a pas d'élément
    // Paramètres :
    //          $code : code dont on cherche le contenu


    // Faire une requête sur la base de données pour récupérer le contenu
    //      Dans la table "elements", va chercher la ligne dont le code est $code (ligne unique), et récupère le contenu

    // Construit la requête SQL
    $sql = "SELECT * FROM `elements` WHERE `code` = :code ";
    // Récupération de la BDD
    global $bdd;
    // Préparation de la requête
    $req = $bdd->prepare($sql);
    // Exécution de la requête
    if ( ! $req->execute( [ ":code" => $code  ]) )  {
        // Le résultat est "false", on a donc échoué (erreur dans la requête)
        return false;
    }

    // La requête est passée : on récupère la 1ère ligne (ligne unique), qui vaut false si on n'a rien trouvé
   return $req->fetch(PDO::FETCH_ASSOC);



}

function update($code,$contenu) {
    // Rôle : mise à jour du contenu d'un éléments dans la BDD
    // Retour : true ou false
    // Paramètres :
    //      $code : code de l'éléments à mettre à jour
    //      $contenu : nouveau contenu

    // Construit la requête SQL
    $sql = "UPDATE `elements` SET `contenu` = :contenu WHERE `code` = :code ";
    // Récupération de la BDD
    global $bdd;
    // Préparation de la requête
    $req = $bdd->prepare($sql);
    // Exécution de la requête
    if ( ! $req->execute( [ ":code" => $code, ":contenu" => $contenu  ]) )  {
        // Le résultat est "false", on a donc échoué (erreur dans la requête)
        return false;
    } else {
        return true;
    }

}

function connect($login, $pwd) {
    // Rôle : vérifie les codes de connexion, établit la connexion si ils sont corrects
    // Retour : true si on a pu se connecter,false sinon
    // Paramètres :
    //          $login : login
    //          $pwd : mot de passe

    $bonLogin = "admin";
    $bonPwd = "123456";

    if ($bonLogin !== $login) {
        $_SESSION["connected"] = false;
        return false;
    }

    if ($bonPwd !== $pwd ) {
        $_SESSION["connected"] = false;
        return false;
    }

    // Tout est bon
    // établir la connexion
    $_SESSION["connected"] = true;
    return true;


}

