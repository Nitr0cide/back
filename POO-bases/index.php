<!DOCTYPE html>
<!--
Test des classes
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // Affichage des message d'erreur pour le debug
        ini_set('display_errors', 1);
        error_reporting(E_ALL);

        // charger les classe
        include_once "classes/hotel.php";
        include_once "lib/fonctions.php";

        // Ouverture de la base de données
        global $bdd;
        $bdd = new PDO("mysql:host=sqlprive-be24678-001.privatesql;dbname=blanchot;charset=UTF8", "blanchot42", "Webecom42");


        // Récupérer un objet hotel
        $hotel = new hotel();

        // Charger l'hotel d'id 2
        $hotel->loadById(3);


        // L'afficher
        ?>


        <p>Nom de l'hotel : <?= $hotel->getNom() ?></p>
        <p>Prix de la chambre  <?= $hotel->getPrix() ?></p>

        <?php

        $hotel->setPrix($hotel->getPrix() + 10 );
        $hotel->update();

        // Supprimer
        // $hotel->delete();

        ?>
    </body>
</html>
