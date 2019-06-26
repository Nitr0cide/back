<?php

/*
 * Fonctions gérant les templates
 */

function afficheTemplate($template, $parametres) {
    // Rôle : affiche un template
    // Retour : true si ok, false si on ne trouve pas le template
    // Paramètres :
    //      $template : nom du tempalte (sans le prefice templates/ et sans .php
    //      $parametres : tableau des paramètres

    // Initialiser les variables pour les paramètres :
    foreach($parametres as $nom=>$valeur) {
        ${$nom} = $valeur;
    }

    $fichier = "templates/$template.php";
    if (!file_exists($fichier)) {
        return false;
    } else {
        include $fichier;
        return true;
    }


}

function listeDeroul($liste,$nom,$sel, $classes="") {
    // Rôle : afficher une liste déroulante
    // retour : néant
    // Paramètres :
    //          liste (tableaus [ id => texte, id2 => texte2, ...)
    //          nom : nom du champ
    //          sel : id de la valeur à sélecyionner
    //          classes : classes (spéarées par un espace



   echo "<SELECT id='$nom' name='$nom' class='$classes'>";
   foreach ($liste as $key=>$texte) {
       echo "<OPTION value='$key' ";
       echo ($sel === $key) ? "selected" : "";
       echo ">$texte</OPTION>";
   }
   echo "</SELECT>";
}

