<!DOCTYPE html>
<?php
/*
  Formulaire de saisie d'un article (page complète)

  Ce template à besoin des variables suivantes :
  - L'article : $article (objet article chargé ou avec des valeurs par défaut
  - Mode : $mode ( CREE : création d'un nouvel article, MOD : modification d'un article)

 */
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?= ($mode === "CREE") ? "Nouvel Article" : "Article : " . htmlentities($article->getLibelle()) ?></title>
        <link href="css/styles.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php
        // Header
        include "templates/fragments/header.php";
        ?>
        <h1><?= ($mode === "CREE") ? "Nouvel Article" : "Modification d'un article" ?></h1>
        <form method="post" action="index.php?module=articles&action=<?= ($mode === "CREE") ? "ajout_traite" : "modif_traite" ?>&id=<?= $article->getId() ?>">
            <label for="libelle">Libellé : </label>
            <input type="text" name="libelle" id="libelle"
                   value="<?= htmlentities($article->getLibelle()) ?>" />
            <label for="designation">Désignation : </label>
            <textarea name="designation" id="designation"><?= nl2br(htmlentities($article->getDesignation())) ?></textarea>
            <label for="prix">Libellé : </label>
            <input type="number" step="0.01" name="prix" id="prix"
                   value="<?= htmlentities($article->getPrix()) ?>" />
            <input type="submit" value="<?= ($mode === "CREE") ? "Ajouter" : "Modifier" ?>" />

        </form>
        <?php
        // Footer
        include "templates/fragments/footer.php";
        ?>
    </body>
</html>
