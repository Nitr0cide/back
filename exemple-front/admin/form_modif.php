<?php

/*
 * Afichage du formulaire de modification d'un élément
 *
 * Paramètres : (en GET)
 *  code : code de l'élement à modifier
 *
 */

include "lib/init.php";
include "lib/verif.php";

// Récupération du code de l'élément
if (isset($_GET["code"])) {
    $code = $_GET["code"];
} else {
    $code = "";
}

// Récupération de l'élément
$element = getElement($code);
// Si on a rien trouvé :
if ($element === false ) {
    // redirection sur la liste des éléments
    header("location: index.php");
    exit;
}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Modification d'un contenu</title>
    </head>
    <body>
        <h1>Modification de : <?= htmlentities($element["libelle"]) ?></h1>
        <form method="post" action="traite_modif.php">
            <input type="hidden" name="code" value="<?= $element["code"] ?>">
            <textarea name="contenu" cols="150" rows="15"><?= nl2br(htmlentities($element["contenu"])) ?></textarea>
            <p><?= nl2br(htmlentities($element["aide"])) ?></p>
            <input type="submit" value="Modifier" />
        </form>
    </body>
</html>

