<?php
/*
 * Formulaire pour siair les infos d'un nouvel hôtel
 *
 * Paramètres / Infos reçues : néant
 *
 *
 */
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Saisie des infos sur un hôtel</title>
    </head>
    <body>
        <h1>Création d'un hôtel : saisie des informations</h1>
        <form method="POST" action="traite_creation_hotel.php">
            <label for="nom">Nom de l'hôtel</label>
            <input type="text" id="nom" name="nom" />
            <br>
            <label for="chambres">Nombre de chambres</label>
            <input type="number" id="chambres" name="chambres" />
            <br>
            <label for="prix">Prix de la chambre</label>
            <input type="number" id="prix" name="prix" />
            <br>
            <input type="submit" value="Créer" />
        </form>
    </body>
</html>
