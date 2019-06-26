<?php

/*
 * Classe : hotel
 *
 */



class hotel {

    // Attributs  (on protège les attributs des accès directs, mais ils pourraient être publics dans certains cas
    protected $nom;             // nom de l'hotel
    protected $chambres = 1;        // NOmbre de chambres avec valeur par défaut (valmeur fixe, pas de calculs dans cete section)
    protected $prix = 0;            // Prix de la chambre

    protected $id;              // id de l'hotel dans la base de données


    // Constructeur
    public function __construct($id = 0) {
        // Rôle : constructeur de l'objet : se déclenche jsute après avoir créé un objet avec new hotel();
        // Retour : néant
        // Paramètres :
        //      $id : identifiant d'un hotel à charger

        // Si on a passé un id (si $id !== 0) : on charge l'objet
        if ($id !== 0) {
            $this->loadById($id);
        }

    }


    // Méthodes d'accès aux attributs (getters et setters)
    public function getNom() {
        // Rôle : renvoyer le nom de l'hotel
        // Retour : le nom
        // Paramètres : néant

        if (isset($this->nom)) {
            return $this->nom;
        } else {
            return "";
        }

    }

    public function getPrix() {
        // Rôle : récupération du prix
        // Retour le prix
        // Paramètres : néant

        if (isset($this->prix)) {
            return $this->prix;
        } else {
            return 0;
        }

    }

    public function getChambres() {
        // Rôle : récupération du nombre de chambres
        // Retourne le nombre de chambres
        // Paramètres : néant

        if (isset($this->chambres)) {
            return $this->chambres;
        } else {
            return 0;
        }
    }

    public function getId() {
        // Rôle : récupération de l'ID (clé primaire)
        // Retourne l'id
        // Paramètres : néant

        if (isset($this->id)) {
            return $this->id;
        } else {
            return 0;
        }
    }

    public function is() {
        // Rôle : retourne true si l'hotel est initialisé (existe), false sinon
        // Retour : true ou false
        // Paramètres : néant

        if ( $this->getrId() === 0 ) {
            return false;
        } else {
            return true;
        }

    }



    public function setNom($nom) {
        // Rôle : modifier le nom de l'hôtel
        // Retour : true ou false
        // Paramètres :
        //      $nom : le nouveau nom

        $this->nom = $nom;
        return true;

    }

    public function setPrix($prix) {
        // Rôle : modifier le prix de l'hôtel, la modification est limitée à 20%
        // Retour : true ou false
        // Paramètres :
        //      $prix : le nouveau prix

        if ( $prix !== 0 or ( $prix >= $this->prix / 1.2 and $prix <= $this->prix * 1.2) ) {
            $this->prix = $prix;
            return true;
        } else {
            debug("Hotel->setPrix() : Le prix ($prix vs $this->prix) ne peut pas être modifié de plus de 20% ");
            return false;
        }
    }

    public function setChambres($chambres) {
        // Rôle : modifier le nombre de chambres de l'hôtel
        // Retour : true ou false
        // Paramètres :
        //      $chambres : le nouveau nombre de chambres

        if (is_numeric($chambres)) {
            $this->chambres = $chambres;
            return true;
        } else {
            debug("Hotel->setChambres() : Le nombre de chambres ($chambres) doit être un nombre !");
            return false;
        }
    }


    // Méthodes (protégées ou publiques)

    public function loadById($id) {
        // Rôle : charger l'objet courant depuis la base de données
        // Retour : true si réussi, false sinon (il n'existe pas)
        // Paramètres :
        //      $id : id (clé primaire de l'objet à charger

        // Récupération de la base de données (ouverte en varaible globale par exemple)
        global $bdd;

        // COnstruction de la requête
        $sql = "SELECT * FROM `hotel` WHERE `id` = :id";

        // Préparation
       $req = $bdd->prepare($sql);

       // Exécution
       if ($req->execute( [ ":id" => $id ]) === false) {
           debug("Hotel->loadById() : échec de la requête $sql");
           return false;
       }

       $ligne = $req->fetch(PDO::FETCH_ASSOC);
       if ($ligne === false ) {
           // Pas de ligne récupérée
           debug("Hotel->loadById() : pas d'id $id");
           return false;
       }

       // Mettre cles valeurs des attributs dans les attributs de l'objet

       $this->id = $id;
       $this->nom = $ligne["nom"];
       $this->chambres  = $ligne["chambres"];
       $this->prix = $ligne["prix"];

       return true;
    }


    public function delete() {
        // Rôle : supprimer l'objet courant de la base de données
        // Retour : true si on a réussi, false sinon
        // Paramètres : néant


        // Récupération de la base de données (ouverte en varaible globale par exemple)
        global $bdd;

        // COnstruction de la requête
        $sql = "DELETE FROM `hotel` WHERE `id` = :id";

        // Préparation
       $req = $bdd->prepare($sql);


       // Exécution
       if ($req->execute( [ ":id" => $this->id ]) === false) {
           debug("Hotel->delete() : échec de la requête $sql");
           return false;
       }

       if ($req->rowCount() === 1) {
           // On a touché une ligne exactement
           return true;
       } else {
           debug("Hotel->delete() : aucune ligne supprimée");
           return false;
       }

    }


    public function insert() {
        // Rôle : ajouter l'hotel courant dans la base de données
        // Retour : true si ok, false sinon
        // Paramètres : néant

        // Vérifier que les valeurs sont renseignées
        if ( empty($this->getNom()) or empty($this->getPrix()) or empty($this->getChambres())) {
            debug("Hotel->insert() : champs non renseignés");
            return false;
        }


        // Vérifier que c'est bien un nouvel hotel (par d'ID)
        if (!empty($this->getId())) {
            debug("Hotel->insert() : il y a déjà un ID");
            return false;
        }


        // Insérer dans la base :
        $sql = "INSERT INTO `hotel` SET `nom`= :nom, `prix` = :prix, `chambres` = :chambres;";
        $param = [ ":nom" => $this->nom, ":prix" => $this->prix, ":chambres" => $this->chambres];
        global $bdd;
        $req = $bdd->prepare($sql);
        if ($req->execute($param) === false) {
            debug("Hotel->insert() : échec de la requête $sql");
            return false;
        }

        if ($req->rowCount() === 1) {
           // On a touché une ligne exactement
           $this->id = $bdd->lastInsertId();
           return true;
       } else {
           debug("Hotel->insert() : Aucune ligne créée");
           return false;
       }
    }

    public function update() {
        // Rôle : mettre à jour l'hotel courant dans la base de données
        // Retour : true si ok, false sinon
        // Paramètres : néant

        // Vérifier que les valeurs sont renseignées
        if ( empty($this->getNom()) or empty($this->getPrix()) or empty($this->getChambres())) {
            debug("Hotel->update() : champs nons renseignés");
            return false;
        }

        // Vérifier que l'on a bien un ID
        if (empty($this->getId())) {
            debug("Hotel->update() : pas d'id");
            return false;
        }

        // Mettre à jour dans la base :
        $sql = "UPDATE `hotel` SET `nom`= :nom, `prix` = :prix, `chambres` = :chambres WHERE `id`= :id;";
        $param = [ ":id" => $this->id, ":nom" => $this->nom, ":prix" => $this->prix, ":chambres" => $this->chambres];
        global $bdd;
        $req = $bdd->prepare($sql);
        if ($req->execute($param) === false) {
            debug("Hotel->update() : échec de la requête $sql");
            return false;
        }

        return true;

    }


    public function updateFromPost() {
        // Rôle : mettre à jour dans la base de données l'hôtel en fonction des informations saisies
        // Retour : true ou false en cas d'échec
        // Paramètres : néant

        // Charger l'hotel de l'ID à modifier
        if ( !isset($_POST["id"])) {
            debug("hotel->updateFromPost() : pas d'ID dans le formulaire");
            return false;
        }

        if ( ! $this->loadById($_POST["id"])) {
            debug("hotel->updateFromPost() : echec chargement hotel ".$_POST["id"]);
            return false;
        }

        // Mettre à jour ses propréiétés à partir des saisies
        if ( !$this->fromPost()) {
            // Modification des attributs échouée
            debug("hotel->updateFromPost() : echec modification attributs ");
            return false;
        }

        // ON met à jousr dans la base de données et on retourne le résultat
        return $this->update();

    }

    public function fromPost() {
        // Rôle : mettre à jour les attributs depuis le POST
        // Retour : true si réussi, false sinon
        // Paramètres : néant


        if ( ! $this->setNom($_POST["nom"]) ) {
            return false;

        }
        if ( ! $this->setPrix($_POST["prix"]) ) {
            return false;

        }
        if ( ! $this->setChambres($_POST["chambres"]) ) {
            return false;

        }
        return true;

    }


    public function liste() {
        // Role : extraire la liste complète des hotels
        // Retour : liste d'objets de type hotel (tableau simple)
        // PAramètres : néant


        // Exécuter la requête de sélection de tous les hôtels

        $sql = "SELECT id FROM `hotel`";

        global $bdd;
        $req = $bdd->prepare($sql);
        if ($req->execute() === false) {
            debug("Hotel->liste() : échec de la requête $sql");
            return [];
        }

        // Initialiser un tableau de résultat vide
        $result = [];
        // Tant que la requête nous donne un élemnt (par fetch)
        while ($ligne = $req->fetch(PDO::FETCH_ASSOC)) {
            //      Créer un objet hotel avec cet élément
            $hotel = new hotel();
            $hotel->loadById($ligne["id"]);
            //      L'ajouter à la liste
            $result[] = $hotel;
        }

        // Retourner la liste
        return $result;

    }

    public function getListeSelect() {
        // Role : construire la liste des hotels sous la forme : [ id1 => nom1, id2 => nom2, .... ]
        // Retour : le tableau
        // Paramètres : néant


        // Exécuter la requête de sélection de tous les hôtels

        $sql = "SELECT id FROM `hotel`";

        global $bdd;
        $req = $bdd->prepare($sql);
        if ($req->execute() === false) {
            debug("Hotel->liste() : échec de la requête $sql");
            return [];
        }

        // Initialiser un tableau de résultat vide
        $result = [];
        // Tant que la requête nous donne un élemnt (par fetch)
        while ($ligne = $req->fetch(PDO::FETCH_ASSOC)) {
            $result[$ligne["id"]] = $ligne["nom"];
        }

        // Retourner la liste
        return $result;


    }

}
