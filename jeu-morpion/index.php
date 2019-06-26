<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Morpion</title>
        <link href="css/grille.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div id="joueur1" class="actif">
            <input type="text" value="joueur 1"/>
        </div>
        <div id="joueur2"  />
            <input type="text" value="joueur 2"/>
        </div>
        <table>
            <!--
            Les cellules de la table on un id pour être adressdées par les JS : ligne-colonne
            Lorsque'on les clique, elles devront déclencher le fait de jouer celle ligne et cette colonne,
            on va donc créer une fonction "joue" dont les paramètres sont la ligne et la colonne de la case jouée
            On créera deux classes pour marquer le fait d'avoir jouer un case : joueur1 et joueur2
            -->
            <tr>
                <td id="1-1" onclick="joue(1,1)">&nbsp;</td>
                <td id="1-2" onclick="joue(1,2)">&nbsp;</td>
                <td id="1-3" onclick="joue(1,3)">&nbsp;</td>
            </tr>
            <tr>
                <td id="2-1" onclick="joue(2,1)">&nbsp;</td>
                <td id="2-2" onclick="joue(2,2)">&nbsp;</td>
                <td id="2-3" onclick="joue(2,3)">&nbsp;</td>
            </tr>
            <tr>
                <td id="3-1" onclick="joue(3,1)">&nbsp;</td>
                <td id="3-2" onclick="joue(3,2)">&nbsp;</td>
                <td id="3-3" onclick="joue(3,3)">&nbsp;</td>
            </tr>
        </table>
        <script src="js/scripts.js" type="text/javascript"></script>
    </body>
</html>
