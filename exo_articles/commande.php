<?php

/*
 * Affichage du détail d'un article et saisie de la quatité à commander
 *
 * Paramètres :
 *  - ref : référence de l'article à commander  (méthode GET :     .../commande.php?ref=A412
 *
 *
 *
 */

// Lignes à mettre en début de programme pour afficher les erreurs PHP
ini_set('display_errors',1);
error_reporting(E_ALL);

// Récupération de la liste des articles
include "lib/articles.php";

// Récupération des éléments :
// reference passée en parametre
$reference = $_GET["ref"];

// detail de l'article
$article = $articles[$reference];


// Afficher l'article et le formulaire de commande
// Le formulaire comprend les infos suivantes :
//   - méthode POST
//  - action : recap.php
//  - champs :
//      ref : référence de l'article commandé (champ caché ou readonly)
//      qte : quantité commandée (input type number)
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <p>Désignation : <strong><?= $article["designation"] ?></strong></p>
        <p>Prix : <strong><?= $article["prix"] ?> €</strong></p>
        <form method="POST" action="recap.php">
            <input type="hidden" name="ref" value="<?= $reference ?>"/>
            <label for="qte">Quantité à commander</label>
            <input type="number" id="qte" name="qte"/>
            <input type="submit" value="Commander"/>
        </form>
    </body>
</html>
