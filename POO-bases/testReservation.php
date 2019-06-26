<!DOCTYPE html>
<!--
Test de la calse réservation
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include "lib/init.php";

        $res = new reservation();
        $res->loadById(1000);




        ?>
        <p>Nom de l'hotel réservé : <?= $res->getHotel()->getNom(); ?></p>
    </body>
</html>
