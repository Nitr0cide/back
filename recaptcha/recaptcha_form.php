<!DOCTYPE html>
<?php
// https://www.google.com/recaptcha
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Inscription</title>
        <script src='https://www.google.com/recaptcha/api.js'></script>
    </head>
    <body>
        <form method="post" action="recaptcha_traite.php" id="formulaire">
            <script>
                function envoi() {
                    return document.getElementById("formulaire").submit();
                }
            </script>
            <label for="email">Votre e-mail : </label>
            <input type="text" id="email" name="email"/>
            <input type="submit" class="g-recaptcha" data-sitekey="6LdR16gUAAAAAKXpCy-9mISCN-8md2ynZa90vms1" data-callback="envoi" value="S'inscrire"/>
        </form>
    </body>
</html>
