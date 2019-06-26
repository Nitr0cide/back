<?php

/*
 * Affichage d'une ligne de table pour un hotel (un TR)
 *
 * Paramètres :
 *      $hotel : tableau des attributs d'un hôtel
 */
?>

<tr>
    <td><a href="form_modif_hotel.php?id=<?= $hotel["id"] ?>"><?= $hotel["nom"] ?></a></td>
    <td><?= $hotel["chambres"] ?></td>
    <td><?= $hotel["prix"] ?></td>
</tr>

