<?php

/*
 * Affichage du formulaire de connexion
 * Triatement des codes de connexion si ils ont été saisis
 *
 * Paramètres : faccultatif, en POST
 *      login
 *      passwd
 *
 *
 */


include "lib/init.php";

// A-t-on saisi des codes de connexion :

if (isset($_POST["login"]) and isset($_POST["passwd"])) {
    $login = $_POST["login"];
    $pwd = $_POST["passwd"];
    if (connect($login, $pwd)) {
        header("location: index.php");
        exit;
    } else {
        // Echec de connexion
        $erreur = "Codes invalides";
    }
} else {
    // pas de code à vérifier
    $login = "";
    $pwd = "";
    $erreur = "";
}

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Connexion</title>
    </head>
    <body>
        <p><?= $erreur ?></p>
        <h1>Entrez vos codes de connexion</h1>
        <form method="post">
            <label for="login">Votre login</label>
            <input type="text" name="login" id="login" value="<?= $login ?>" />
            <label for="passwd">Votre mot de passe</label>
            <input type="password" name="passwd" id="passwd" />
            <input type="submit" value="Se connecter" />
        </form>

    </body>
</html>
