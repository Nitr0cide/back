<?php
/*
 * Template, page complète, liste des hôtels
 *
 * Paramètres :
 *      $hotels : liste des hotels (avec pour chacun le détail
 *
 *
 */
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Choix d'un hôtel à modifier</title>
    </head>
    <body>
        <h1>Choix d'un hôtel à modifier</h1>
        <p>Cliquez sur le nom de l'hôtel que vous voulez modifier</p>
        <table>
            <tr>
                <th>Nom</th>
                <th>Nb chambres</th>
                <th>Prix</th>
            </tr>
            <?php
                // Pour chaque hôtel, générer la ligne de la table
                foreach($hotels as $hotel) {
                    // afficher un eligne pour cet hotel
                    include "templates/parts/ligne_hotel.php";
                }
            ?>
        </table>
    </body>
</html>