<!DOCTYPE html>
<?php
    /*
     * Programme affichant le formulaire de saisie du poids (destiné à traiter par exo1_aff.php)
     *
     * Paramètrezs attendus : néant
     *
     *
     * Doit envoyer par POST à exo1_att.php :
     *          poids : poids saisi (nombre)
     *          unite : unité de poids ( GR, KG ou T )
     *
     *
     */
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Saisie du poids</title>
    </head>
    <body>
        <h1>Saisie du poids</h1>
        <form method="POST" action="exo1_aff.php">
            <label for="poids">Poids :</label>
            <input type="number" step="0.1" name="poids" id="poids"/>
            <select name="unite" id="unite">
                <option value="GR">Grammes</option>
                <option value="KG" selected>Kg</option>
                <option value="T">Tonnes</option>
            </select>
            <input type="submit" value="Envoyer" />
        </form>
    </body>
</html>

