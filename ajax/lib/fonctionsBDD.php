<?php

/*
 * Fonctions d'accès à la base de données
 *
 * On a besoin d'avoir initialisé la variable globale $bdd (objet PDO de connexion à la base)
 *
 */


function listeHotels() {
    // Rôle : récupérer la liste des hôtels (tous) triès par ordre alphabétique
    // Retour : tableau des hôtels, tableau de tableau, pour chaque hôtel les index sont les champs de la table
    // Paramètres : néant

    // récupérer la connexion à la base de données
    global $bdd;

    // construire la requête SQL
    $sql = "SELECT * FROM `hotel` ORDER BY `nom`";

    // préparer la requête
    $req = $bdd->prepare($sql);

    // Exécuter la requête
    if ( ! $req->execute()) {
        // la requête a achoué
        // Message de debug
        echo "La requête a échoué : $sql<br>";
        return [];
    }

    // Récupérer le résultat
    return $req->fetchAll(PDO::FETCH_ASSOC);

}

function getHotel($id) {
    // Rôle : récupérer la champs d'un hôtel
    // Retour : tableau donnant les champs [ "id" => 3, "nom" => "Hotel de la plage", "chambres" => 12, "prix" => 60 ]
    // Paramètres :
    //      $id : identifiant de l'hôtel dans la base de données

    // récupérer la connexion à la base de données
    global $bdd;

    // construire la requête SQL
    $sql = "SELECT * FROM `hotel` WHERE `id` = :id";

    // préparer la requête
    $req = $bdd->prepare($sql);

    // Exécuter la requête
    if ( ! $req->execute([ ":id" => $id])) {
        // la requête a achoué
        // Message de debug
        echo "La requête a échoué : $sql<br>";
        return [];
    }

    // Récupérer le résultat
    $hotel = $req->fetch(PDO::FETCH_ASSOC);

    if ($hotel === false) {
        // Message de debug
        echo "L'hôtel $id n'existe pas<br>";
        return [];
    } else {
        return $hotel;
    }


}


function updateHotel($id,$hotel) {
    // Rôle : met à jour un hôtel dans la base de données
    // Retour : true si ok, false en cas d'erreur
    // Paramètres :
    //      $id : identifiant de l'hotel à modifier
    //      $hotel :  tableau donnant les valeurs de chacun des champs

     // récupérer la connexion à la base de données
    global $bdd;

    // construire la requête SQL
    $sql = "UPDATE  `hotel` ";
    $sql .= " SET `nom` = :nom,";
    $sql .= " `chambres` = :chambres,";
    $sql .= " `prix` = :prix";
    $sql .= " WHERE `id` = :id";

    // préparer la requête
    $req = $bdd->prepare($sql);

    // Exécuter la requête
    if ( ! $req->execute([ ":id" => $id, ":nom" => $hotel["nom"], ":chambres" => $hotel["chambres"], ":prix" => $hotel["prix"]])) {
        // la requête a achoué
        // Message de debug
        echo "La requête a échoué : $sql<br>";
        return false;
    }

    return true;

}
