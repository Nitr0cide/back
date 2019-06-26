<?php

/*
 * Fragment correspondant à l'affichage de la liste des hotels
 *  Paramètres : les varaibles suivantes doivent être initailisées
 *       $liste: tableau  de la liste des hotels
 */

foreach($liste as $hotel) {
    include "templates/fragments/ligne_liste.php";
}

