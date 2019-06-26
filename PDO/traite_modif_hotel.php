<?php
/*
 * Programe traitant le formulaire de modification d'un hôtel (modificaton dans la base de données)
 *
 * Paramètres :    POST
 *      id : identifiant  de l'hôtel (champ id)
 *      nom : nom de l'hôtel (facultatif)
 *      chambres : nombre de chambres (facultatif)
 *      prix : prix de la chambre (facultatif)
 *
 *
 * Etapes :
 *    - récupération des infos saisies
 *    ( - lit dans la base l'hôtel à modifier )
 *    ( - vérification des saisies )
 *    ( - si erreur : réaffichage du formulaire de saisie)
 *    - mise à jour dans la base de données
 *    - affichage du message de succés et de la fiche de l'hôtel
 *
 *
 *
 */


include "lib/init.php";


// Récupération des infos
$id = $_POST["id"];
$nom= $_POST["nom"];
$chambres = $_POST["chambres"];
$prix= $_POST["prix"];


if (updateHotel($id, [ "nom" => $nom, "chambres" => $chambres, "prix" => $prix])) {
    $message = "La mise à jour sa été effectuée";
} else {
    $message = "Echec de la mise à jour";
}

// RElire l'hotel
$hotel = getHotel($id);


?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Hotel <?= $hotel["nom"] ?>modifié</title>
    </head>
    <body>
        <h1><?= $hotel["nom"] ?></h1>
        <p><strong>Nombre de chambres</strong> : <?= $hotel["chambres"] ?></p>
        <p><strong>Prix de la chambre</strong> : <?= $hotel["prix"] ?></p>
        <p><a href="liste_hotels.php">Revenir à la liste</a></p>
    </body>
</html>
