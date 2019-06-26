<?php

/*
 * Affichage d'un formulaire de saisie des critère de recherche des articles (le type pour l'instant)
 *
 * De quoi a-t-il besoin : néant
 *
 *
 *
 *
 * Détail :
 *
 * Afficher un formulaire :
 *  - méthode : POST
 *  - action : selection.php
 *
 * Champs :
 *   - type : liste déroulante des types disponibles (ecran, UC, accessoire)
 *
 *
 *
 *
 */
// Lignes à mettre en début de programme pour afficher les erreurs PHP
ini_set('display_errors',1);
error_reporting(E_ALL);

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form method="POST" action="selection.php">
            <label for="type">Catégorie de l'article recherché ? </label>
            <select id="type" name="type">
                <option value="ecran">Ecran</option>
                <option value="UC">Enité centrale</option>
                <option value="Accessoire">Accessoires</option>
            </select>
            <input type="submit" value="Rechercher"/>
        </form>
    </body>
</html>
