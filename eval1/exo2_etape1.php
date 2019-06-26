<!DOCTYPE html>
<?php
/*
 * Exercice 2, Etape 1 : afficher la liste du personnel (nom, prénom)
 *
 */

// Gestion des erreurs pour debug :
ini_set('display_errors',1);
error_reporting(E_ALL);

// Lecture du tableau du personnel
include "lib/personnel.php";

// Afficher : pour chaque élément du tableau, afficher la personne

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Liste du personnel</title>
    </head>
    <body>
        <h1>Liste du personne</h1>
        <table>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
            </tr>
        <?php
        // Pour chaque personne du tableau $personnel
            foreach($personnel as $detailPers) {
                // Ouvir une ligne
                echo "<tr>";
                // Afficher nom et prénom
                echo "<td>".$detailPers["prenom"]."</td><td>".$detailPers["nom"]."</td>";

                // Fermer la ligne
                echo "</tr>";
            }

        ?>
        </table>
    </body>
</html>
