<?php
// Template de page complète : aficahge de la fiche d'un hôtel

// Variables nécessaires :
//      $hotel :     objet hotel chargé


?><!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Hôtel: <?= $hotel->getNom() ?></title>
    </head>
    <body>
        <h1>Hotel : <?= htmlentities($hotel->getNom()) ?></h1>
        <p>Nombre de chambres : <?= htmlentities($hotel->getChambres()) ?></p>
        <p>Prix : <?= htmlentities($hotel->getPrix()) ?></p>
    </body>
</html>
