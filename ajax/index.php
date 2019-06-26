<?php
// Affichage d'une page comportant la liuste des hôtels, avec un cadre latéral pour afficher le détail d'un hotel


// Url de démarrage

include "lib/init.php";

// Récupération de la liste
$liste = listeHotels();


// Affichagte de la page
include "templates/pages/liste.php";