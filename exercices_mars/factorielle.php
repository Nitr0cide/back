<?php


/*
 *  Calcul d'une factorielle (N * N-1 * ... * 2 * 1)
 *  Le nombre est passé en paramètre (méthode GET, name = "nb"
 *
 */

// Récupération du nombre
$nb = $_GET["nb"];



// Calcul de la factorielle
function factorielle($n) {
    // Rôle : calculer et retourner la factorielle d'un nombre
    // Retour : la factorielle calculée
    // Paramètres :
    //      $n : nombre dont on veut calculer la factorielle

    // factorielle de n est n * (n-1) * (n-2) * .... * 2 * 1, c'est à dire factorielle de n = n * factorielle de (n-1)
    // factorielle de 0 est 1

    // cas n = 0 :


    echo "Calcul de factorielle de $n";
    if ($n <= 0) {
        return 1;
    }

    return $n * factorielle($n - 1);

}

$fact = factorielle($nb);

// Affichage deu résultat

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Factorielle</title>
    </head>
    <body>
        <p> La factorielle de <?= $nb ?> est <b><?= $fact ?></b></p>
    </body>
</html>
