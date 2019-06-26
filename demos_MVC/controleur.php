<?php

/*
 * Controleur du programme.
 *
 * Il reçoit en paramètres GET (optionnels)
 *    - model : nom de l'objt sur lequel on travaille
 *    - action : nom de l'action à effectuer
 *    - id : id de l'objet sur lequel on travaille
 */


// Affichage des message d'erreur pour le debug
ini_set('display_errors', 1);
error_reporting(E_ALL);



// Lecture des paramètres

$model = isset($_GET["model"]) ? $_GET["model"] : '';
$action = isset($_GET["action"]) ? $_GET["action"] : '';
$id= isset($_GET["id"]) ? $_GET["id"] : '';


if (empty($model)) {
    include "templates/accueil.php";
    exit;
}

// Le modèle est défini
$classe = "model_$model";
if (class_exists($classe)) {
    $obj = new $classe();
} else {
    include "templates/accueil.php";
    exit;
}

if (!empty($id)) {
    $obj->loadById($id);
}

$method = "action_$action";
if (method_exists($obj,$method)) {
    $obj->$method();
} else {
    $obj->action_list();
}




