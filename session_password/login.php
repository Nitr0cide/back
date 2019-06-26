<?php

//   Affichage ou traitement du formulaire de connexion
// (traitement si on a saisi un login)

include "lib/init.php";


// Gérer le cas où on a saisi un login même vide)
if (isset($_POST["login"])) {
    // On a saisi un login, on le vérifie
    $login = $_POST["login"];
    $password = $_POST["password"];
    // On vérifie que le login et le password sont corrects
    if (verifConnexion($login, $password)) {
        // On peut aller vers l'affichage normal de la page initialement demandée (template ou redirection)
        // redirection :
        header("location: index.php");
        exit;
    }


} else {
    $login = "";            // Pour que l'affichage du login précdéemment saisi dans le formulaire ne génère pas un message d'erreur
}
// Le login n'est pas saisi ou est incorrect : on affiche le formulaire



?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Connexion</title>
    </head>
    <body>
        <h1>Veuillez saisir vos code de connexion</h1>
        <form method="post" action="">
            <label for="login">Login : </label>
            <input type="text" name="login" id="login" value="<?= $login ?>"/>
            <label for="password">Mot de passe : </label>
            <input type="password" name="password" id="password" />
            <input type="submit" value="Se connecter" />
        </form>
    </body>
</html>
