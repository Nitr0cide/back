<?php
// Template de la page donnant une liste des hotels avec un cadre pour le détail d'un article
// Paramètres : les varaibles suivantes doivent être initailisées
//      $liste : liste des hotels

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Hotels</title>
        <link href="css/styles.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div class="liste"><?php include "templates/fragments/liste.php"; ?></div>
        <div class="detail">
        Choisir un hotel dans la liste
        </div>
        <script src="http://code.jquery.com/jquery-3.3.1.min.js" type="text/javascript"></script>
        <script src="js/scripts.js" type="text/javascript"></script>
    </body>
</html>
