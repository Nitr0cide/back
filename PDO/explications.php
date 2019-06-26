<!DOCTYPE html>
<!--
Afficher un article de la base de données
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Démonstration PDO</title>
    </head>
    <body>
        <?php
        // Affichage des erreurs PHP
        ini_set('display_errors', 1);
        error_reporting(E_ALL);

        // se connecter à la base de données et récupérer l'objet PDO (la base ouiverte) dans $bdd


        // syntaxe de la création d'une nouvelle base
        $bdd = new PDO("mysql:host=sqlprive-be24678-001.privatesql;dbname=blanchot;charset=UTF8", "blanchot42", "Webecom42");
        // Le premier paramètre  ("mysql:host=sqlprive-be24678-001.privatesql;dbname=blanchot;charset=UTF8") est :
        //      - le type de base : mysql   , suivi de 2 points
        //      - les paramètres d'ouvertire sous la forme nom=valeur, séparés par des ;
        //      -  les 3 paramètres obligatoires :
        //              - host : nom du serveur de base de données
        //              - dbname : nom de la base de données utilisée
        //              - charset : encodage des caractères : UTF8
        //  Les deux paramètresv suivants de PDA sont le user et le mot de passe de connexion à la base


        echo "<p>Connecté à la base de données</p>";



        echo "<h2>Requête SELECT</h2>";

        $sql = "SELECT * FROM `hotel`";         // Requête SQL que l'on veut envoyer à la base de données

        $req = $bdd->prepare($sql);     // Préparation de la requête : on envoie un requête SQL à l'objet PDO $bdd, il retourne un objet "requête" (PDOStatement)

        $cr = $req->execute();          // On demande à la requête de s'exécuter et on récupère le compte-rendu de l'action
                                       // le retour de la mé thode (fonction) execute() est
                                       //           - true si la requête a été exécutée avec succès
                                       //           - false si la requête a échoué

        if ($cr) {
            echo "<p>La requête $sql a été exécutée</p>";
        } else {
            echo "<p>La requête $sql a été échoué</p>";
            exit;
        }



        // On récupère toute les lignes dans un tableau
        $lignes = $req->fetchAll(PDO::FETCH_ASSOC);

        // Pour chaque hotel du tableau récupéré
        foreach($lignes AS $hotel ) {
            echo "<p>".$hotel["nom"]." ( ".$hotel["chambres"]." chambres)</p>";

        }



        /* Solution alternative (Obligatoire en BACK) */
        //============================================


        echo "<h2>Requête SELECT version fetch</h2>";

        $cr = $req->execute();          // On demande à la requête de s'exécuter à nouveau (pour réinitialiser le résultat)


        if ($cr) {
            echo "<p>La requête $sql a été exécutée</p>";
        } else {
            echo "<p>La requête $sql a été échoué</p>";
            exit;
        }

        // $hotel = $req->fetch(PDO::FETCH_ASSOC);      // récupère la ligne 1
        // $hotel = $req->fetch(PDO::FETCH_ASSOC);      // récupère la ligne 2
        // Quand on n'a plus de ligne, la mathode fetch renvoie FALSE
        // Tant que fetch ne retourne pas FALSE : traite la ligne
        while ($hotel = $req->fetch(PDO::FETCH_ASSOC)) {            // Attention, c'est un egal d'affectation
            echo "<p>".$hotel["nom"]." ( ".$hotel["chambres"]." chambres)</p>";
        }


        // Requête de suppression
        // ======================


        echo "<h2>Requête DELETE</h2>";

        // Ecriture de la requête
        $sql = "DELETE FROM `client` WHERE id = :id";       // on utilise un nom de paramètre pour protéger la requête contre les injections SQL
                                    // Un paramètres pour une requête SQL utilisée via PDO est un nom (comme pour une variable) préfixé par :

        // Préparation de la requête
        $req = $bdd->prepare($sql);

        // Exécution de la requête
        if ( ! $req->execute([ ":id" =>  8])) {             // Pour execute, on doit valoriser tous les paramètres :xx
            echo "<p>Requête échouée : $sql </p>";
            exit;
        }

        echo "<p> Nombre de lignes affectées : ".$req->rowCount()."</p>" ;
        if ($req->rowCount() >= 1) {
            echo "<p>Client 8 supprimé</p>";
        } else {
            echo "<p>Aucun client a supprimer</p>";
        }


        // Requête d'insertion de ligne


        echo "<h2>Requête INSERT</h2>";

        // Ecriture de la requête
        $sql = "INSERT INTO `client` SET `nom` = :nom, `prenom` = :prenom, `email` = :email";            // On écrit une requete générique, avec des paramètres pour les valeurs à insérer
        // Préparation de la requête
        $req = $bdd->prepare($sql);
        // Exécuter la requête et tester le résultat
        // SI le requête à échoué, cad, si le résultat de la requête n'est pas true
        // excuter la requête, c'est utiliser $req->execute()
        //          Cette méthode (fonction) atend comme paramètre un tableau pour valoriser les variables PDO/SQL :xx
        if ( ! $req->execute([  ":nom" => "Zola", ":prenom" => "Emile", ":email" => "emilezola@gmail.com"  ]))   {   // On valorise le paramètres :xx
            echo "<p>La requête a échoué : $sql</p>";
            exit;
        }

        if ($req->rowCount() >= 1) {
            echo "<p>Client ajouté</p>";
        } else {
            echo "<p>Aucun client ajouté</p>";
        }




        ?>
    </body>
</html>
