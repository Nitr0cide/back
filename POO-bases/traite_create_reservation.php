<?php
// Programme traitant les créations d'une réservation.

// Il reçoit en POST un formulaire dont les nom des champs sont les attributs dans la base de données de la réservation


// Etape 1 : récupérer les valeurs saisies (et vérifier qu'elles sont bonnes)
//      Si erreur : réafficher le formulaire de création (échec)
// Etape 2 : essayer de créer dans la base de données
//      Si erreur : réafficher le formulaire de création (échec)
// Si tout est bon :
//      Afficher la fiche réservation


// Initialisatioons générales
include "lib/init.php";

// Créer un objet reservation
$reservation = new reservation();

// Insérer dans la base  à partir des infos saisies
if ($hotel->insertFromPost()) {
    // On a réussi : on affiche la fiche de la réservation
    include "templates/pages/reservation_fiche.php";
} else {
    // On a échoué : on affiche un message d'ereur et on réaffiche le formulaire
    include "templates/pages/reservation_create.php";
}



?>

