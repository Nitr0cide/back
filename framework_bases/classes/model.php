<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of model
 *
 * @author eleve
 */
class model {

    // L'attribut sera écrasé en fonction de l'attribut de son enfant direct instantié
    protected $table = "";
    // L'attribut sera écrasé en fonction de l'attribut de ses enfants directs instantié
    protected $champs = [];
    // Par défaut la clé primaire sera l'id, si dans la DB nous avons 
    // une clé primaire sous une autre forme, nous transformerons cette variable
    // en array
    protected $primaryK = "id";

    public function __construct($id = null) {
        if ($id !== null) {
            $this->loadById($id);
        }
    }
    
    public function insert($champs, $params){
        global $bdd;
        
        $sqlFields = implode(",", $champs);
        
        $sql = "INSERT INTO `$this->table` SET $sqlFields";
        $req = $bdd->prepare($sql);
        
        // On enlève la primary key de notre tableau de paramètre pour que la requête INSERT soit correcte
        unset($params[":".$this->primaryK]);
        
        if (!$req->execute($params)){
            debug("Un problème avec la requête $sql");
            print_r($params);
            return false; 
        }
        
        include "templates/pages/accueil.php";
        return true;
    }

    public function update($champs, $params) {
        // BASE DE DONNEES
        global $bdd;
        // Update un objet à partir d'un formulaire
        $sqlFields = implode(",", $champs);

        $sql = "UPDATE `$this->table` SET $sqlFields WHERE `id` = :id";
        $req = $bdd->prepare($sql);
        
        if (!$req->execute($params)){
            debug("Un problème avec la requête $sql");
            print_r($params);
            return false; 
        }
        
        
        return true;
        
        
        
    }

    public function set() {
        // Donnez toutes les valeurs saisies dans le formulaire à l'objet puis appeler la fonction qui update ou insert l'objet dans la DB
        $champs = [];
        $params = [];
        
        foreach ($this->champs as $key => $value) {
            // On ne veut pas effectuer de vérification ou de modification sur l'ID
            if ($key !== $this->primaryK) {
                if (!empty($_POST[$key]) || $_POST[$key] === "0" || $_POST[$key] != '') {
                    // On attribue les valeurs 
                    $this->champs[$key]["valeur"] = $_POST[$key];
                    // On récupère les champs ici pour construire la requête SQL; 
                    $champs[] .= "`".$key."`" . " = :" . $key;
                } 
            }
            $params[":$key"] = $this->champs[$key]["valeur"];
        }
        if (!isset($_GET[$this->primaryK]) ){
            $this->insert($champs, $params);
        }
        else {
            $this->update($champs, $params);
        }
    }

    public function delete() {
        global $bdd;

        $sql = "DELETE FROM `$this->table` WHERE `$this->primaryK` = :id";

        $req = $bdd->prepare($sql);


        if (!$req->execute([":id" => $_GET["id"]])) {
            debug("Il y a eu un problème lors de la suppression : $sql");
        } else {
            echo "L'hôtel a été supprimé";
        }
        return true;
    }

    public function get($champ) {
        // Récupère la valeur contenu dans un champ
        // Paramètres : String correspondant au nom d'un champ 

        if (isset($this->champs[$champ])) {

            // On regarde si le champ à charger pointe vers une autre table
            $linkedObj = $this->checkLinkedTable($this->champs[$champ]);

            // Si aucune table tierce n'est visé on retour directement la valeur
            if (!$linkedObj) {
                return $this->champs[$champ]["valeur"];
                // Sinon on charge l'objet dans la table pointée
            } else if ($linkedObj) {
                
                $default = $linkedObj->get("default");
                echo $linkedObj->get($default); 
                return;
            }
        }
    }

    public function loadById($id) {
        // Charger un objet en bdd
        // Paramètre : un ID

        global $bdd;

        $sql = "SELECT * FROM `$this->table` WHERE `$this->primaryK` = :id";

        $params = [":id" => $id];

        $req = $bdd->prepare($sql);

        if (!$req->execute($params)) {
            debug("La requête $sql ne s'est pas éxécuté correctement");
            return false;
        }

        $ligne = $req->fetch(PDO::FETCH_ASSOC);

        if ($ligne === false) {
            // Pas de ligne récupérée
            debug($this->table . "->loadById() : pas d'id $id");
            return false;
        }

        $tableau = $this->champs;

        foreach ($tableau as $key => $value) {
            $this->champs[$key]["valeur"] = $ligne[$key];
        }
    }

    public function checkLinkedTable($champ) {
        // On regarde si notre objet pointe vers une autre table
        // Si on a un pointeur, on renvoie l'objet chargé
        // Sinon on renvoie false
        // Paramètres : un sous-array de notre objet
        if (isset($champ["link"])) {
            $newObj = $champ["link"];
            try {
                $obj = new $newObj($this->champs[$this->primaryK]["valeur"]);
                return $obj;
            } catch (Exception $ex) {
                echo $ex;
            }
        } else {
            return false;
        }
    }

    public function callForm() {
        include "templates/parts/formSkeleton.php";
    }

    public function makeForm($key, $mode = 0) {

        if ($key == $this->primaryK) {
            return;
        }

        // $value détermine si le formulaire doit $etre en mode création ou non
        $value = $mode !== 0 ? $this->champs[$key]["valeur"] : '';
        
        
        // On teste les types de valeur de l'objet pour afficher les inputs du formulaire
        if ($this->champs[$key]["type"] == "INT") { 
            echo "<div class='form-group'>";
            echo "<label for='$key'> $key :  </label>";
            echo "<input type='text' name='$key' value='$value'>";
            echo "</div>";
        }

        if ($this->champs[$key]["type"] == "TEXT") {
            echo "<div class='form-group'>";
            echo "<label for='$key'> $key :  </label>";
            echo "<input class='form-control' id='exampleInputEmail1' aria-describedby='emailHelp' placeholder='Enter email' type='textarea' name='$key' value='$value'>";
            echo "</div>";
        }

        if ($this->champs[$key]["type"] == "PASSWORD") {
            echo "<div class='form-group'>";
            echo "<label for='$key'> $key :  </label>";
            echo "<input class='form-control' id='exampleInputPassword1' placeholder='Password' type='password' name='$key' value='$value'>";
            echo "</div>";
        }
        if ($this->champs[$key]["type"] == "BOOLEAN") {
            echo "$key : ";
            echo "<select class='form-control' name='$key'>";
            echo "<option value='$value'>Non</option>";
            echo "<option value='$value'>Oui</option>";
            echo "</select>";
        }
    }

    public function listAll() {

        global $bdd;

        if (!isset($this->table)) {
            // Si le model chargé ne correspond à aucune table dans la base de données on retourne false
            return false;
        }

        echo $this->table;
        $sql = "SELECT `id` FROM `$this->table`";

        $req = $bdd->prepare($sql);

        $result = [];

        if (!$req->execute()) {
            debug("La requête listeHotels(): $sql n'a pas pu être exécutée...");
            return [];
        }

        while ($ligne = $req->fetch(PDO::FETCH_ASSOC)) {
            $newObj = "model_" . $this->table;
            $obj = new $newObj();
            $obj->loadById($ligne[$this->primaryK]);
            $result[] = $obj;
        }

        if ($result === []) {
            debug("Aucun $this->table dans la base");
            return;
        } else {
            include "templates/pages/liste_model.php";
        }
    }

}
