<?php

/*
 * Exercice 3 : formualaire de saisie
 *      - Saisie des pièces fournies
 *
 */

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Pièces fournies</title>
    </head>
    <body>
        <h1>Quelles pièces sont fournies ?</h1>
        <form method="post" action="exo3_resultat.php">
            <label for="F417">Le formulaire F-417-EJ est-il complet ? </label>
            <select id="F417" name="F417">
                <option value="O">Oui</option>
                <option value="N" selected>Non</option>
            </select>
            <br/>
            <label for="DC1278">l'annexe DC1278 est-elle complète ? </label>
            <select id="DC1278" name="DC1278">
                <option value="O">Oui</option>
                <option value="N" selected>Non</option>
            </select>
            <br/>
            <label for="factures">Nombre de factures fournies </label>
            <select id="factures" name="factures">
                <option value="0">Aucune</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3+">3 ou plus</option>
            </select>
            <br/>
            <label for="quittance">A-t-on fourni une quittance de loyer de moins de 3 mois ? </label>
            <select id="quittance" name="quittance">
                <option value="O">Oui</option>
                <option value="N" selected>Non</option>
            </select>
            <br/>
            <label for="passeport">A-t-on fourni une copie d'un passeport valide ? </label>
            <select id="passeport" name="passeport">
                <option value="O">Oui</option>
                <option value="N" selected>Non</option>
            </select>
            <br/>
            <label for="CI">A-t-on fourni une copie d'une carte d'identité valide ? </label>
            <select id="CI" name="CI">
                <option value="O">Oui</option>
                <option value="N" selected>Non</option>
            </select>
            <br/>
            <input type="submit" value="Vérifier" />
        </form>
    </body>
</html>
