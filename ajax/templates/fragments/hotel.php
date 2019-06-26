<?php

/*
 * Fragment correspondant à l'affichage du détail d'un hotel
 *  Paramètres : les varaibles suivantes doivent être initailisées
 *       $hotel : tableau de description de l'article
 */

?>
<p><b><?= $hotel["nom"] ?></b></p>
<p>Nb de chambres : <?= $hotel["chambres"] ?></p>
<p>Prix : <?= $hotel["prix"] ?> €</p>