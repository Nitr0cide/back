<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of model_type
 *
 * @author eleve
 */
class model_types extends model{
    protected $table = "types";
    protected $primaryK = "id";
    protected $champs = [
        "id" => [
            "type" => "INT AUTO_INCREMENT",
            "valeur" => "",
            ],
        "nom" => [
            "type" => "TEXT",
            "valeur" => "",
        ],
    ];       
    
    public function __toString() {
        return $this->champs["nom"]["valeur"];
    }
}
