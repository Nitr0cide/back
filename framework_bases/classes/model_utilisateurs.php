<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of model_utilisateurs
 *
 * @author eleve
 */
class model_utilisateurs extends model {

    protected $table = "utilisateurs";
    protected $primaryK = "id";
    protected $champs = [
        "id" => [
            "type" => "INT AUTO_INCREMENT",
            "valeur" => "",
        ],
        "login" => [
            "type" => "TEXT",
            "valeur" => "",
        ],
        "password" => [
            "type" => "PASSWORD",
            "valeur" => "",
        ],
        "email" => [
            "type" => "TEXT",
            "valeur" => "",
        ],
        "default" => [
            "valeur" => "nom",
        ],
    ];

    public function __toString() {
        
        return $this->champs["login"]["valeur"];
        
    }
    

    public function insert($champs = null, $params = null) {
        global $bdd;

        $sql = "INSERT INTO `$this->table` SET `login`= :login, `password` = :password, `email` = :email";
        $req = $bdd->prepare($sql);
        // On définit le hash
        $hash = password_hash($_POST["password"], PASSWORD_DEFAULT);
        // On détruit la clé principale de la liste des paramètres (puisque c'est un insert)
        unset($params[":".$this->primaryK]);
        
        // On insert le $hash du password dans l'array avant insertion en base de données
        $params[":password"] = $hash;
            
        
        if (!$req->execute($params)) {
            debug("Un problème avec la requête $sql"); 
            return false;
        }

        include "templates/pages/accueil.php";
        return true;
    }

}
