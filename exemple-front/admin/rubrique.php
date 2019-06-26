<?php

/*
 * Affichage de la liste des éléments modifiables pour une rubrique donnée
 *
 * Pramètres : à passer en GET   (rubrique.php?rubrique=ACC )
 *      rubrique : code de la rubrique dont on veut afficher les éléments
 *
 *
 */


include "lib/init.php";
include "lib/verif.php";

// Récupération du code de la rubrique
if (isset($_GET["rubrique"])) {
    $codeRub = $_GET["rubrique"];
} else {
    $codeRub = "";
}
// Récupérer le libellé de la rubrique (pour l'afficher en titre
$rubrique = getLibRubrique($codeRub);



?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Gestion des contenus : <?= htmlentities($rubrique)?></title>
    </head>
    <body>
        <h1>Gestion des contenus : <?= htmlentities($rubrique) ?></h1>
        <p>Cliquez sur l'élément à modifier</p>
        <table>
        <?php
        // Parcourir tous les éléments de la rubrique, et pour chacun afficher le libellé, le contenu actuel, et un lien de modification
        foreach( elements($codeRub) AS $element) {      // $element est le tabvleau d'un élément
            ?>
            <tr>
                <td><a href="form_modif.php?code=<?= $element["code"]?>"><?= htmlentities($element["libelle"]) ?></a></td>
                <td><a href="form_modif.php?code=<?= $element["code"]?>"><?= nl2br(htmlentities($element["contenu"])) ?></a></td>
            </tr>
            <?php

        }

        ?>
        </table>
        <a href="index.php"><button>Retour à la liste des pages et rubriques</button></a>
    </body>
</html>

