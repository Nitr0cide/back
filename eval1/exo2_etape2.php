<!DOCTYPE html>
<?php
/*
 * Exercice 2, Etape 2 : afficher la liste du personnel (nom, prénom), et le nombre de jours d'absences
 *
 *
 */

// Gestion des erreurs pour debug :
ini_set('display_errors',1);
error_reporting(E_ALL);

// Lecture du tableau du personnel
include "lib/personnel.php";

// Afficher : pour chaque élément du tableau, afficher la personne et ses absences

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
                <th>Absences</th>
            </tr>
        <?php
        // Pour chaque personne du tableau $personnel
            foreach($personnel as $detailPers) {
                // Ouvir une ligne, avec un attribut "couleur rouge" quand l'absence est de plus de 20 jours
                // Si absence de plus de 20 jours
                if ( $detailPers["absences"] > 20 ) {
                    echo "<tr style='color:red'>";
                } else {
                    echo "<tr>";
                }
                // Afficher nom et prénom
                echo "<td>".$detailPers["prenom"]."</td><td>".$detailPers["nom"]."</td>";
                // Afficher absence
                echo "<td>".$detailPers["absences"]." jours </td>";
                // Fermer la ligne
                echo "</tr>";
            }

        ?>
        </table>
    </body>
</html>
