<?php

/*
 * Formulaire de saisie de 2 nombres et une opération
 */

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Calculatrice</title>
    </head>
    <body>
        <h1>Calculatrice</h1>
        <form method="post" action="exo2_resultat.php">
            <label for="nb1">Premier nombre</label>
            <input type="number" id="nb1" name="nb1" />
            <br/>
            <label for="nb2">Second nombre</label>
            <input type="number" id="nb2" name="nb2" />
            <br/>
            <label for="op">Opération</label>
            <select id="op" name="op">
                <option value="+">Addition</option>
                <option value="-">Soustraction</option>
                <option value="*">Multiplication</option>
                <option value="/">Division</option>
            </select>
            <br>
            <input type="submit" value="Résultat"/>
        </form>
    </body>
</html>