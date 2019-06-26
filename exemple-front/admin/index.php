<?php

/*
 * Affichage de la liste des rubriques
 *
 * Paramètres : néant
 */


include "lib/init.php";
include "lib/verif.php";



?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Liste des pages et rubriques</title>
    </head>
    <body>
        <h1>Liste des pages et rubriques</h1>
        <p>Cliquez sur la page ou la zone à personnaliser</p>
        <?php
        // Parcourir toutes les rubriques, et pour chacune afficher le libellé et un lien vers rubrique.php?rubrique=XXX
        foreach( rubriques() AS $code=>$libelle ) {
            ?>
        <p><a href="rubrique.php?rubrique=<?= $code ?>"><?= htmlentities($libelle) ?></a></p>
            <?php

        }

        ?>
    </body>
</html>



