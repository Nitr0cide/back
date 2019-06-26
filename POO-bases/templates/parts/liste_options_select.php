<?php

/*
 * Affichage des options d'un select
 *
 * Paramètres :
 *      $options : tableau de la forme : [ id1 => nom1, id2 => nom2, .... ]
 *      $selected : id de l'élément sélectionné
 */


// Parcours du tableau pour afficher les options
foreach($options AS $id => $nom) {
    ?>
        <option value="<?= $id ?>"><?= $nom ?> <?= $selected ? "selected" : "" ?></option>
    <?php
}
?>



