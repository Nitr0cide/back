<?php
// Traitement du formulaire avec antispam par session
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Inscription</title>
    </head>
    <body>
        <pre>
        <?php
        ini_set('display_errors', 1);
        error_reporting(E_ALL);


        if ($_POST["antispam"] == $_SESSION["antispam"]) {
            // Le formulaire est envoyé par un humain
            echo "Bravo, vous êtes humain !";
        } else {
            echo "Pirate ! ";
        }
        $_SESSION["antispam"] = "";


        ?>
        </pre>
    </body>
</html>
