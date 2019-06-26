<?php

/*
 * Classe fictive pour faire des exercices
 */
class voiture {
    // attributs
    protected $puissance;        // Puissance en CV fiscaux (nombre)
    protected $coloris;          // Coloris (texte)
    protected $boite;           // Type de boite de vitesse (A ou M)
    protected $marque;          // Marque (code la marque)
    protected $modele;          // Nom du modèle (texte)

    protected $id;              // Id dans la base de donnée




    // Méthodes


    public function listeMarque($marque) {
        // Role : retourner la liste des voitures d'une marque donnée, sous forme d'un tableau indexé [ id => modele, .... ]
        // Retour : un tableau indexé de la forme [ id => modele, .... ]
        // Paramètres :
        //      $marque : marque de la voiture


        // Requête sur la base de données  (ps : la table est "voiture", pas de jointures)
        //      construire la requête SQL avec des paramètres protégés (:xxx)
        //      construire le tableau de valorisation des paramètres
        //      préparaer la requête
        //              récupérer la base de données
        //              préparer une requête
        //      exécuter la requête avec les bons paramètres
        //      si le résultat est false :
        //              Afficher un message de debug
        //              retourner un tableau vide
        // préparer un tableau vide pour le résultat de la méthode
        // pour chaque ligne de la requête (tant qu'il reeste une ligne à lire)
        //      Ajouter dans le tableau, à l'index correspondant à l'ID, le nom du modele
        // rertourner le tablaue de résultat
        //



    }






}
