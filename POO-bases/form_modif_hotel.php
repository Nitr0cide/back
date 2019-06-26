<?php
// Programme affichant le fdormulaire de modfification d'un hotel

// Il reçoit en GET l'id de l'hotel



// Initialisatioons générales
include "lib/init.php";


// Charger un hotel dont l'ID est passé en GET
$hotel = new hotel($_GET["id"]);

// Afficher le formulaire de modification
include "templates/pages/hotel_modif.php";


