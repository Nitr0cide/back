<?php

/*
 * Exo3 : traitement des saisies, pour indiquer si le dossier est complet ou non
 *  Reçoit les champs en POST
 *      F417 (O/N), DC1278 (0/N), factures (0/1/2/3+), quittance (O/N), passeport (O/N), CI (O/N)
 *
 *
 */


// Récupération des informations
$F417 = $_POST["F417"];
$DC1278 = $_POST["DC1278"];
$factures = $_POST["factures"];
$quittance = $_POST["quittance"];
$passeport = $_POST["passeport"];
$CI = $_POST["CI"];

// Déterminer si le dossier est complet (dans $complet)
if (
        ( $F417 === "O" and $DC1278 === "O")           //  Le formulaire et son annexe remplis
        and ( ( $factures === "2" or $factures === "3+" ) or ( $factures === "1" and $quittance === "O") )   // Deux factures ou une quittance de loyer et une facture
        and ( $passeport === "O" or $CI ==="O" )  // Une copie du passeport ou de la carte d’identité
    ) {

        $complet = true;

} else {
    $complet = false;
}


// Afficher le résultat

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Vérification des pièces</title>
    </head>
    <body>
        <p>
            <?php
            if ($complet) {
                echo "Le dossier est complet";
            } else {
                echo "Le dossier n'est pas complet";
            }
            ?>
        </p>
    </body>
</html>
