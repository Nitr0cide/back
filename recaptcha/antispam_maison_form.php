<?php
// version antispam par session
session_start();

$nombres = [ "Zer0", "hein", "deu", "Tres", "catr", "sinque", "sisse", "se pt", "ouite", "5+4" ];

// Construction de la question secrète
$a = rand(0,9);
$b = rand(0,9);
$_SESSION["antispam"] = $a + $b;
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Inscription</title>
    </head>
    <body>
        <form method="post" action="antispam_maison_traite.php" id="formulaire">

            <label for="email">Votre e-mail : </label>
            <input type="text" id="email" name="email"/>
            <p>Quelle est la somme de <?= $nombres[$a] ?> et <?= $nombres[$b] ?></p>
            <input type="text" id="antispam" name="antispam"/>
            <input type="submit" value="S'inscrire"/>
        </form>
    </body>
</html>
