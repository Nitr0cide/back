<?php

/*
 * Affichage d'une ligne de table pour un hotel (un TR)
 *
 * Paramètres :
 *      $hotel : objet hotel
 */
?>

<tr>
    <td><a href="form_modif_hotel.php?id=<?= $hotel->getId(); ?>"><?= $hotel->getNom() ?></a></td>
    <td><?= $hotel->getChambres() ?></td>
    <td><?= $hotel->getPrix() ?></td>
</tr>

