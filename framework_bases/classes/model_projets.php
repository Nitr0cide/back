<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of model_projets
 *
 * @author eleve
 */
class model_projets extends model{
    public $table = "projets";
    protected $primaryK = "id";
    protected $champs = [ "id" => [
        "type" => "INT",
        "valeur" => "",
    ],
    "id_user" => [
        "type" => "INT",
        "valeur" => "",
        "link" => "model_utilisateurs",
    ],
    "nom" => [
        "type" => "TEXT",
        "valeur" => "",
    ],
    "description" => [
        "type" => "",
        "valeur" => "",
    ],   
    "valide" => [
        "type" => "BOOLEAN", 
        "valeur" => "",
    ],
    "type_projet" => [
        "type" => "INT",
        "valeur" => "",
        "link" => "model_types",
    ],
    "montant_recolte" => [
        "type" => "INT",
        "valeur" => "",
    ],
    "montant_vise" => [
        "type" => "INT",
        "valeur" => "", 
    ],
    "default" => [
        "valeur" => "nom",
    ],

];
    
    public function __toString() {
        return $this->get("type_projet")." : ".$this->champs["nom"]["valeur"];  
    }
}
