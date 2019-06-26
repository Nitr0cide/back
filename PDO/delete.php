<!DOCTYPE html>
<?php
/*
 * Supprimer un client dont on donne l'id
 *
 * Paramètres :
 *  id (reçu par POST) : id du client à supprimer
 */


// Affichage des erreurs PHP
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Ouverture d'une nouvelle connexion à la base de données
$bdd = new PDO("mysql:host=sqlprive-be24678-001.privatesql;dbname=blanchot;charset=UTF8", "blanchot42", "Webecom42");

// Récupérer l'id à supprimer
$id = $_POST["id"];





?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Suppresssion d'un client</title>
    </head>
    <body>
        <?php
        // Construire la requête
        $sql = "DELETE FROM `client` WHERE `id` = :id ";
        echo "<p>Requête exécutée : $sql</p>";
        // Préparer la requête
        $req = $bdd->prepare($sql);

        // Exécution de la requête
        if ( ! $req->execute([":id" => $id])) {
            echo "<p>Requête échouée : $sql </p>";
            exit;
        }

        echo "<p> Nombre de clients supprimés : ".$req->rowCount()."</p>" ;


        ?>
    </body>
</html>
