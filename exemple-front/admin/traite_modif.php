<?php

/*
 * Modification dans la basez de données d'un élement
 *
 * Paramètres :    POST (on doit avoir demandé à l'utilisateur de faire des saisies, donc par un formulaire)
 *      code : code de l'élément
 *      contenu : contenu à changer
 * *
 *
 */

include "lib/init.php";
include "lib/verif.php";

// Récupération du code de l'élément
if (isset($_POST["code"])) {
    $code = $_POST["code"];
} else {
    $code = "";
}

// Récupération du code de l'élément
if (isset($_POST["contenu"])) {
    $contenu = $_POST["contenu"];
} else {
    $contenu = "";
}

// Faire la mise à jour dans la base
update($code,$contenu);

// Rediriger sur la page de la liset des éléments
// Récupérer d'abord l'élément :
$element = getElement($code);
header("location: rubrique.php?rubrique=".$element["rubrique"]);
