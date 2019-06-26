<?php
/*
  Affichage d'une ligne de tableau pour un article
  Ce template à besoin des variables suivantes :
  - article à afficher : $article


  Affiche les colonnes libelle et prix


 */
?>

<tr onclick="window.location = 'index.php?module=articles&action=aff&id=<?= $article->getId() ?>'">
    <td><a href="index.php?module=articles&action=aff&id=<?= $article->getId() ?>" target="_blank"><?= htmlentities($article->getLibelle()) ?></a></td>
    <td><?= $article->getPrix() ?> €</td>
</tr>



