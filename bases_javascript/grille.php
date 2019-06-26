<!DOCTYPE html>
<!--
Grille de jeu de morpion a taille variable
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="css/grille.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <label for="taille">Taille de la grille de jeu</label>
        <input id="taille" type="number" min="2" max="30" />
        <button onclick="dessine();">Dessiner</button>
        <table id="table">

        </table>
        <script src="js/grille.js" type="text/javascript"></script>
    </body>
</html>
