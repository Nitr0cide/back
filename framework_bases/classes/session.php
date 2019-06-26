<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of session
 *
 * @author eleve
 */
class session extends utilisateurs {

    protected $id;
    protected $login;

    public function checkLogin() {
        global $bdd;

        // Rôle : Vérifier si le login existe dans la table utilisateurs ou admin
        // Retour : $_SESSION["login"] = admin si dans admin, = user si utilisateur, false sinon
        if (isset($_POST["login"]) && isset($_POST["password"])) {

            $this->login = $_POST["login"];

            $sql = "SELECT * FROM `admin` WHERE `login` = :login";
            $req = $bdd->prepare($sql);
 
            if (!$req->execute([":login" => $this->login])) {
                debug("La requête $sql ne s'est pas éxécuté correctement");
                return false;
            }

            if ($req->rowCount() === 1) {
                $admin = $this->checkPassword($_POST["password"], $req);
            } else {
                $sql = "SELECT * FROM `utilisateurs` WHERE `login` = :login";
                $req = $bdd->prepare($sql);

                if (!$req->execute([":login" => $this->login])) {
                    debug("La requête $sql ne s'est pas éxécuté correctement");
                    return false;
                }
                $utilisateur = $this->checkPassword($_POST["password"], $req);
            }
            
            if ($utilisateur){
                $_SESSION["login"] = "utilisateur";
                header('Location: index.php?model=projets'); 
                echo "Connection de l'utilisateur $this->login réussie";
            } else if ($admin){
                $_SESSION["login"] = "admin";
                header('Location: index.php?model=projets'); 
                echo "Connection de l'admin $this->login réussie";
            } else {
                return false;
            }
        } 
    }

    public function checkPassword($password, $req) {
        // Vérifier la correspondance des hash entre le password saisi et celui stocké
        // Paramètres : POST_PASSWORD et la requête pour tester l'existence du login
        // Retourne true or false;

        echo "???????";
        while ($ligne = $req->fetch(PDO::FETCH_ASSOC)) {
            if (password_verify($password, $ligne["password"])) {
                return true;
            } else {
                return false;
            }
        }
    }

    public function deconnection() {
        // Rôle : Se déconnecter
    }

}
