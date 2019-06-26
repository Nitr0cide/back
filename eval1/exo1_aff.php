<!DOCTYPE html>
<?php
    /*
     * Programme calculant et affichant le pois en kg
     *
     * Paramètres attendus : paramètres envoyés par la méthode POST
     *          poids : poids saisi (nombre)
     *          unite : unité de poids ( GR, KG ou T )
     *
     */



    // Récupération des valeurs saisies

    $poids = $_POST["poids"];
    $unite = $_POST["unite"];

    // Calcul du poids en kg
    // Si unite est T : poids en kg = poids * 1000
    if ( $unite === "T" ) {
        $kg = $poids * 1000;
    } elseif ( $unite === "KG" ) { // Sinon si unite est KG : poids en kg = poids
        $kg = $poids;
    } elseif ( $unite === "GR" ) { // Sinon si unite est GR : poids en kg = poids / 1000
        $kg = $poids / 1000;
    } else {
        $kg = $poids;       // Cas ou unite est invalide
    }

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Affichage du poids</title>
    </head>
    <body>
        <p>Le poids saisi est <?= $kg ?> Kg</p>
    </body>
</html>
