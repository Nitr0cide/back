<!DOCTYPE html>
<!--
Boutons pour changer la couleur d'un cadre
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <div style="height: 50px; width: 300px; border: 1px solid black;" id="cible"></div>
        <br>
        <div style="height: 25px; width: 25px; margin: 10px; float: left; background-color: green" onclick="copieBackground('coul1','cible');" id="coul1"></div>
        <div style="height: 25px; width: 25px; margin: 10px; float: left; background-color: blue" onclick="copieBackground('coul2','cible')" id="coul2"></div>
        <div style="height: 25px; width: 25px; margin: 10px; float: left; background-color: orange" onclick="copieBackground('coul3','cible')" id="coul3"></div>
        <script src="js/couleurs.js" type="text/javascript"></script>
    </body>
</html>
