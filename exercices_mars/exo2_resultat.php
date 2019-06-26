<?php

/*
 * Calcul d'une opération entre 2 nombres :
 *      Information reçues par POST
 *          nb1 : premier nombre
 *          nb2 : deuxième nombre
 *          op : opération (+, -, *, / )
 */

// Lignes à mettre en début de programme pour afficher les erreurs PHP
ini_set('display_errors',1);
error_reporting(E_ALL);

// Récupérer les valeurs ($nb1, $nb2, $op)
$nb1 = $_POST["nb1"];
$nb2 = $_POST["nb2"];
$op = $_POST["op"];


// Calculer le résultat ($result)
// Si l'opération est + : le résultat est $nb1 + $nb2
// Sinon si l'opération est - : le résultat est $nb1 - $nb2
// Sinon si l'opération est * : le résultat est $nb1 * $nb2
// Sinon si l'opération est / : le résultat est $nb1 / $nb2
if ( $op === "+") {
    $result = $nb1 + $nb2;
} else if ( $op === "-") {
    $result = $nb1 - $nb2;
} else if ( $op === "*") {
    $result = $nb1 * $nb2;
} else if ( $op === "/") {
    $result = $nb1 / $nb2;
} else {
    $result = "";
}


// AFficher le résultat :
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Calculatrice <?= $nb1 . $op . $nb2 ?></title>
    </head>
    <body>
        <?= $nb1 . $op . $nb2 . " = " . $result ?>
    </body>
</html>
