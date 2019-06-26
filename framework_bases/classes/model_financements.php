<?php



/**
 * Description of model_financements
 *
 * @author eleve
 */
class model_financements extends model {
    public $table = "financements";
    protected $primaryK = "id";
    protected $champs = [
        "id" => [
            "type" => "INT AUTO_INCREMENT",
            "valeur" => "",
        ],
        "id_user" => [
            "type" => "INT",
            "valeur" => "",
            "link" => "model_utilisateurs",
        ],
        "id_projet" => [
            "type" => "INT",
            "valeur" => "", 
            "link" => "model_projets",
        ],
        "montant_promis" => [
            "type" => "INT",
            "valeur" => "",
        ],
        "default" => [
            "valeur" => "",
        ]
    ];
    public function __toString() {
        
    }
}
