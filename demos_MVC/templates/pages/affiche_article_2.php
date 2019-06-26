<!DOCTYPE html>
<?php
/*
  Détail d'un article (page complète)

  Ce template à besoin des variables suivantes :
  - L'article : $article (objet article chargé)

 */
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Article : <?= htmlentities($article->getLibelle()) ?></title>
        <link href="css/styles.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php
        // Header
        include "templates/fragments/header.php";
        ?>
        <h1><?= htmlentities($article->getLibelle()) ?></h1>
        <p><?= nl2br(htmlentities($article->getDesignation())) ?></p>
        <p><b>Prix : </b><?= $article->getPrix() ?> €</p>
        <a href="index.php?module=articles&action=modif_form&id=<?= $article->getId() ?>"><button>Modifier</button></a>
        <a onclick="return window.confirm('Voulez-vous vraiment supprimer cet article ?')" href="index.php?module=articles&action=delete&id=<?= $article->getId() ?>"><button>Supprimer</button></a>
        <?php
        // Footer
        include "templates/fragments/footer.php";
        ?>
    </body>
</html>
