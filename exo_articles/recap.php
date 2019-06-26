<?php

/*
 * Affichage du récap de la commande (article commandé, qté, prix total)
 *
 *
 * Paramètres :  POST
 *      - ref : référence de l'article commandé
 *      - qte : quantité commandée
 *
 *
 *
 *
 */
// Lignes à mettre en début de programme pour afficher les erreurs PHP
ini_set('display_errors',1);
error_reporting(E_ALL);

// Récupération de la liste des articles
include "lib/articles.php";

// Récupérer les informations :
// Référence :
$reference = $_POST["ref"];
// détails de l'article :
$article = $articles[$reference];
// Qunatité commandée
$qte = $_POST["qte"];

// Calculer le prix total
$total = $qte * $article["prix"];


// Affichage du recap
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Votre commande</title>
    </head>
    <body>
        <h1>Votre commande</h1>
        <p><?= $qte ?> x <?= $article["designation"] ?></p>
        <p>Prix : <?= $qte ?> x <?= $article["prix"] ?> €, soit <strong><?= $total ?> €</strong></p>
    </body>
</html>
