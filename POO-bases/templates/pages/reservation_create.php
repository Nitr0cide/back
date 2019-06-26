<?php
// Template de page complète : affichage du formulaire de création d'une réservation

// Variables nécessaires :
//      $reservation :     objet reservation, chargé avec les valeurs par défaut


?><!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Création d'une réservation</title>
    </head>
    <body>
        <h1>CRéation d'une réservation</h1>
        <form method="POST" action="traite_create_reservation.php" >
            <label for="hotel">Hotel</label>
            <select name="hotel" id="hotel">
                <?php
                    $options = $reservation->getListeHotel();
                    $selected = $reservation->getHotel()->getId();
                    include "templates/parts/liste_options_select.php";
                ?>
            </select>
            <br>
            <label for="client">Hotel</label>
            <select name="client" id="client">
                <?php
                    $options = $reservation->getListeClient();
                    $selected = $reservation->getClient()->getId();
                    include "templates/parts/liste_options_select.php";
                ?>
            </select>
            <br>
            <label for="date">Date de réservation</label>
            <input type="date" name="date" id="date" value="<?= $hotel->getDate() ?>" />
            <br>
            <label for="paye">La chambre est-ele payée ?</label>
            <input type="checkbox" name="paye" id="paye" <?= $reservation->getPaye() ? "checked" : "" ?>" />
            <br>
            <input type="submit" value="Modifier"/>
        </form>
    </body>
</html>
