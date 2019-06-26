<?php
// Programme affichant le fdormulaire de création d'une réservation




// Initialisatioons générales
include "lib/init.php";



// Afficher le formulaire de création d'une réservation
// Il faut initialiser un objet réservation
$reservation = new reservation();
include "templates/pages/reservation_create.php";


