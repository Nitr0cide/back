<!DOCTYPE html>
<?php
/*
 * Formulaire de connection

 * Paramètres : néant

 */
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?= $titre ?></title>
        <link href="css/styles.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php
        // Header
        include "templates/fragments/header.php";
        ?>
        <form method="post">
            <label>Nom d'utilisateur</label>
            <input type="text" name="login" value="<?= (isset($_POST["login"])) ? $_POST["login"] : "" ?>" />
            <label>Mot de passe</label>
            <input type="password" name="password"/>
            <input type="submit" value="Se connecter"/>
        </form>
        <?php
        // Footer
        include "templates/fragments/footer.php";
        ?>
    </body>
</html>

