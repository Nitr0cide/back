<?php
/*
 * Formulaire pour traiter la créaton d'un hôtel (créer dans la base et afficher le résultat
 *
 * Paramètres / Infos reçues :
 *      Par la méthode POST :
 *          nom : nom de l'hôtel
 *          chambres : nombre de chambres
 *          prix : prix
 *
 *
 */

// Affichage des erreurs PHP
ini_set('display_errors', 1);
error_reporting(E_ALL);


// Récupération des paramètres
$nom = $_POST["nom"];
$chambres = $_POST["chambres"];
$prix = $_POST["prix"];


// Insérer dans la base de données

// Ouvrir une connexion à la base
$bdd = new PDO("mysql:host=sqlprive-be24678-001.privatesql;dbname=blanchot;charset=UTF8", "blanchot42", "Webecom42");

// Requête SQL
$sql = "INSERT INTO `hotel` SET `nom`= :nom, `chambres` = :chambres, `prix` = :prix";

// Préparation de la requête
$req = $bdd->prepare($sql);

// Tableau des valeurs à donner aux variables
$valeurs = [
    ":nom" => $nom,
    ":chambres" => $chambres,
    ":prix" => $prix,
];

// Exécuter la requête
if ( ! $req->execute($valeurs)) {
    // En cas d'échec, on affiche un message de debug et on sort
    echo "La requête a échoué : $sql";
    print_r($valeurs);
    exit;           // on sort
}


?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Création hôtel <?= $nom ?></title>
    </head>
    <body>
        <?php
        // La création s'est-elle bien passée :
        if ($req->rowCount() !== 1 ) {
            // On n'a pas créé un et un seul hôtel
            echo "<p style='color:red'>L'hôtel n'a pas pu être ajouté</p>";
        } else {
            echo "<p>l'hôtel a été ajouté : $nom</p>";
            echo "<p><a href='form_creation_hotel.php'>Créer un autre hôtel</a></p>";
        }
        ?>
    </body>
</html>
