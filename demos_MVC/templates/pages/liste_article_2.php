<!DOCTYPE html>
<?php
/*
  Liste des articles (page complète)

  Ce template à besoin des variables suivantes :
  - liste des articles à afficher, sous forme d'un objet article contenant une liste chargée : $article
  - Titre : $titre


 */
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?= $titre ?></title>
        <link href="css/styles.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php
        // Header
        include "templates/fragments/header.php";
        ?>
        <h1><?= $titre ?></h1>
        <a href="index.php?module=articles&action=ajout_form"><button>Créer un article</button></a>
        <div>
            <form method="post" action="index.php?module=articles&action=list">
                Recherche
                <input type="text" name="recherche" value=""/>
                <input type="submit" value="Rechercher"/>
            </form>
        </div>
        <table>
            <tr>
                <th>Libellé</th>
                <th>prix</th>
            </tr>
            <?php
            // Construire les lignes de la table (<tr>) pour chaque article
            while ($article->next()) {      // prépare l'article suivant et retourne true si il existe, false sinon
                // Afficher la ligne
                include "templates/fragments/ligne_article.php";
            }
            ?>


        </table>
        <?php
        // Footer
        include "templates/fragments/footer.php";
        ?>
    </body>
</html>
