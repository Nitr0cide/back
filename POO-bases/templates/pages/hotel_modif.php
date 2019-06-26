<?php
// Template de page complète : aficahge du formulaire de modification d'un hotel

// Variables nécessaires :
//      $hotel :     objet hotel chargé


?><!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Modification d'un hôtel : <?= $hotel->getNom() ?></title>
    </head>
    <body>
        <h1>Hotel : <?= $hotel->getNom() ?></h1>
        <form method="POST" action="traite_modif_hotel.php" >
            <input type="hidden" name="id" value="<?= $hotel->getId() ?>"/>
            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom" value="<?= $hotel->getNom() ?>" />
            <br>
            <label for="chambres">Nb de chambres</label>
            <input type="number" name="chambres" id="chambres" value="<?= $hotel->getChambres() ?>" />
            <br>
            <label for="prix">Prix de la chambre</label>
            <input type="number" name="prix" id="prix" value="<?= $hotel->getPrix() ?>" />
            <br>
            <input type="submit" value="Modifier"/>
        </form>
    </body>
</html>
