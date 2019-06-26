<?php
// Programme traitant les modifications sur un hotel.

// Il reçoit en POST un formulaire dont les nom des champs sont les attributs dans la base de données de h'hotel


// Etape 1 : récupérer les valeurs saisies (et vérifier qu'elles sont bonnes)
//      Si erreur : réafficher le formulaire (échec)
// Etape 2 : essayer de mettre à jour dans la base de données
//      Si erreur : réafficher le formulaire (échec)


// Initialisatioons générales
include "lib/init.php";

// Créer un objet hotel
// Lui faire récupérer ses attributs depuis le POST
// Lui demander de se mettre à jour dans la base de données


$hotel = new hotel();
if ($hotel->updateFromPost()) {
    // On a réussi : on affiche la fiche de l'hotel
    // Afficher le template de la fiche d'un hotel
    // On à déjà la variable $hotel
    include "templates/pages/hotel_fiche.php";
} else {
    // On a échoué : on affiche un message d'ereur et on réaffiche le formulaire
    // Afficher le template du formulaire de modification
    // On à déjà la variable $hotel
    include "templates/pages/hotel_modif.php";
}



/////// Autre "logique"

// Créé un objet hotel
// On le charge depuis la base de données avec l'ID saisi
// On charge les modifications depuis les infos du POST
// ON demande la mise à jour dans la base de données


?>

