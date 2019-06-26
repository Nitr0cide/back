<!DOCTYPE html>
<?php
/*
 * Programme affichante les réseravation passées non payées
 */


// Affichage des erreurs PHP
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Ouverture d'une nouvelle connexion à la base de données
$bdd = new PDO("mysql:host=sqlprive-be24678-001.privatesql;dbname=blanchot;charset=UTF8", "blanchot42", "Webecom42");

// Construire la requête SQL
$sql = "SELECT";
$sql .= " `reservation`.`date` AS 'date',";
$sql .= " `hotel`.`nom` AS 'hotel',";
$sql .= " `client`.`nom` AS 'nomclient',";
$sql .= " `client`.`prenom` AS 'prenomclient'";
$sql .= " FROM `reservation` ";
$sql .= " LEFT JOIN `hotel` ON `reservation`.`hotel` = `hotel`.`id`";
$sql .= " LEFT JOIN `client` ON `reservation`.`client` = `client`.`id` ";
$sql .= " WHERE `reservation`.`date` < NOW() AND `reservation`.`paye` IS FALSE ";

echo "<p>$sql</p>";      // DEBUG, A RETIRER

// Préparer la requête
$req = $bdd->prepare($sql);

// Exécuter la requête
if ($req->execute()) {
    echo "<p>La requête $sql a été exécutée</p>";
} else {
    echo "<p>La requête $sql a été échoué</p>";
    exit;
}


// Récupérer le résultat dans un tableau
$reservations = $req->fetchALL(PDO::FETCH_ASSOC);



?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Chambres utilisées non payées</title>
    </head>
    <body>
        <h1>Chambres utilisées non payées</h1>
        <table>
            <tr>
                <th>Date</th><th>Hôtel</th><th>Client</th>
            </tr>
            <?php
            // Pour chaque réservation extraite
            foreach($reservations AS $detail) {
                $date = $detail["date"];
                $hotel = $detail["hotel"];
                $client = $detail["prenomclient"]." ".$detail["nomclient"];
                echo "<tr><td>$date</td><td>$hotel</td><td>$client</td></tr>";
            }
            ?>
        </table>

    </body>
</html>
