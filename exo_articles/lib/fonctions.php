<?php

/*
 * Fonctions diverses
 */

function afficheArticleCliquable($reference,$detail) {
    // Rôle : afficher la "fiche" d'un article, cliquable pour pouvoir le commander :  <p><a href="commande.php?ref=xxxx">Ecran EEEEEEEE</a></p>
    // Retour : néant
    // Paramètres : description, référence
    //      reference : référence de l'article
    //      detail : détail de l'article (tableau décrivant un article)


    // Algo :
    // Afficher un lien HTML :   <a href="commande.php?ref=xxxx">Ecran EEEEEEEE</a>
    echo "<p><a href='commande.php?ref=$reference'>".$detail['designation']."</a></p>";





}

