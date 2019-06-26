<?php
/*
 * Programe affichant le formulaire de modification d'un hôtel
 *
 * Paramètres :   GET
 *      id : identifiant  de l'hôtel (champ id)
 *
 *
 *
 *  Etapes :
 *      - récupération de l'id
 *      - lecture des champs de l'hotel (dans la BDD)
 *      - affichage du formulaire pré-rempli
 */

include "lib/init.php";

// récupération de l'ID
if (isset($_GET["id"])) {
    $id = $_GET["id"];
} else {
    $id = 0;
}

// lecture des champs de l'hôtel
$hotel = getHotel($id);


?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Modification d'un hôtel : <?= $hotel["nom"] ?></title>
    </head>
    <body>
        <h1>Hotel : <?= $hotel["nom"] ?></h1>
        <form method="POST" action="traite_modif_hotel.php" >
            <input type="hidden" name="id" value="<?= $hotel["id"] ?>"/>
            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom" value="<?= $hotel["nom"] ?>" />
            <br>
            <label for="chambres">Nb de chambres</label>
            <input type="number" name="chambres" id="chambres" value="<?= $hotel["chambres"] ?>" />
            <br>
            <label for="prix">Prix de la chambre</label>
            <input type="number" name="prix" id="prix" value="<?= $hotel["prix"] ?>" />
            <br>
            <input type="submit" value="Modifier"/>
        </form>
    </body>
</html>
