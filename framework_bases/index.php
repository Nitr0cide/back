<?php
// Rôle : URL unique de traitement des requêtes (liens, action des forms, requestes AJAX)
// Paramètres : 
//      - reçoit en GET les paramètres du routage :
//          model : nom du modele sur lequel on veut faire une action
//          action : nom de l'action demandée
//          id : identifiant (selon l'action) de l'objet précis concerné


// Include des principales dépendances du projet
include_once "lib/init.php";

$admin = 0;

// Si l'utilisateur possède un compte admin, on appellera des pages différentes avec notre controller
if (isset($_SESSION) && $_SESSION["login"] == "admin"){
    $admin = 1;
}

// Récupération des paramètres
$action = isset($_GET["action"]) ? $_GET["action"] : '';
$model = isset($_GET["model"]) ? $_GET["model"] : '';
$id = isset($_GET["id"]) ? $_GET["id"] : null;

if (empty($model)) {
    include "templates/pages/accueiladmin.php";
    exit;
}


// Routage
$classe = "model_$model";
if (class_exists($classe)) {
    // La classe existe : on la charge
    $obj = new $classe();
    if ($action === ''){
        $action = "listAll";
    }
} else {
    // ON a demandé un modèle qui n'existe pas : afficher la page d'accueil
    include "templates/pages/accueil.php";
    exit;
}

if ($model === "utilisateurs"){
    $obj->$action();
    exit;
}

if(!empty($id)){
    $method = "loadById";
    $obj->$method($id);
}


if ($action == "modif" && isset($obj)){
    $method = "callForm";
    $obj->$method();
    exit;
}


$method = $action; 


if (method_exists($obj,$method)) { 
   $obj->$method($id);
} else {
   $obj->action_list();
}




?>

