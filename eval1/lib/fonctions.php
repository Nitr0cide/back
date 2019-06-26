<?php

/* Fonctions diverses
 *
 *
 */

function getLangues($langues) {
    // Rôle : TRansforme une liste de codes langues en un texte des langues en clair
    // Retour : le texte
    // Paramètres :
    //      $langues : tableau simple de code de langues  ( ex : [ "EN", "FR" ] )


    // Initialiser le texet à vide
    $texte = "";
    // Pour chaque langue : ajouter le texte en clair corespondant au code
    foreach($langues as $lg) {
        // Selon le code, on ajoute le bon texte
        if ($lg === "FR") {
            $texte .= "Français ";
        } elseif ($lg === "EN") {
            $texte .= "Anglais ";
        }  elseif ($lg === "DE") {
            $texte .= "Allemand ";
        } elseif ($lg === "IT") {
            $texte .= "Italien ";
        } elseif ($lg === "SP") {
            $texte .= "Espagnol ";
        } else {
            $texte .= $lg;
        }
    }

    // Retourne le résultat
    return $texte;



}