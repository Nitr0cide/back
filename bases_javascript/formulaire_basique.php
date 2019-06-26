<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Calcul somme de 1 à N</title>
    </head>
    <body>

            <label for="nombre">Saisir le nombre</label>
            <input type="number" id="nombre" name="nombre" oninput="calcule()"/>
            <input type="submit" value="calculer" onclick="calcule()"/>


        <p>Le résultat pour <span id="N"></span> est : <span id="resultat"></span></p>
        <script src="js/formulaire_basique.js" type="text/javascript"></script>
    </body>
</html>
