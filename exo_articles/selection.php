<?php

/*
 * Affichage d'une liste cliquable des articles correspondant aux critères de sélection
 *
 *
 *  Paramètres : reçoit en POST
 *      - type : le type des articles à afficher
 *
 *
 *
 *  Lecture des paramètres ($type)
 *  Parcours des articles : pour chaque article
 *          Si le type de l'article est le type saisi ($type)
 *                  Afficher le détail de l'article cliquable
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
include "lib/fonctions.php";


// Lecture des paramètres
$type = $_POST["type"];


?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Article de type <?= $type ?></title>
    </head>
    <body>
        <h1>Cliquez sur l'article à commander</h1>
        <?php
        // Pour chaque article
        foreach($articles as $ref=>$detailArticle) {
            // $ref : reference de l'article en cours
            // $detailArticle : tableau des attributs de l'article en cours (designation, type, prix, ....)
            //      Si son type est $type
            if ($detailArticle["type"] === $type) {
                //          l'afficher : afficheArticleCliquable(...);
                afficheArticleCliquable($ref, $detailArticle);
            }
        }
        ?>

    </body>
</html>
