<?php
/*
 * Programe permetant d'afficher la liste des hôtels pour permettre d'en sélectionner un
 *
 * Paramètres : néant
 *
 *
 *
 *
 * Etapes :
 *  - récupérr la liste des hôtels dans la BDD
 *  - afficher la liste :
 *          - pour chaque hotel : afficher l'hotel
 *
 *
 */


include "lib/init.php";

// Récupérer la liste des hôtels : tableau $hotels contenant la liste des hôtels
$hotels = listeHotels();


if (empty($hotels)) {
    // On n'a pas d'hotel : formulaire de création
    include "templates/pages/creation_hotels.php";          // Template à faire

} elseif (count($hotels) === 1) {
    // un seul hôtel : on affiche son détail
    // Variable : $hotel
    $hotel = $hotels[0];
    include "templates/pages/detail_hotel.php";             // Template à faire
} else {
    // Affichage de la page "liste"
    // ON doit d'abord initialiser les variables dont il a besoin
    // $hotels : liste des hotels  : on l'a déja
    include "templates/pages/liste_hotels.php";
}



'SELECT * FROM hotel WHERE `nom`LIKE "%plage%" ; ';

$sql = 'SELECT * FROM hotel WHERE `nom`LIKE :recherche ; ';
$req = $bdd->prepare($sql);

$cr = $req->execute( [ ":recherche" => "%$texte%"])   ;



?>







