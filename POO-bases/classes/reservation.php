<?php

/*
 *  Classe : reservation (réservations d'une chambre pour une nuit)
 */


class reservation {

    // Attributs :
    protected $hotel;           // Objet hotel
    protected $client;          // Obbjet client
    protected $date;            // Date : sous forme de chaine de caractères au format AAAA-MM-JJ
    protected $paye;            // Payé ou non (booleen)

    protected $id;              // id de la réservation




    public function getHotel() {
        // Rôle : donner l'hotel
        // Retour : un objet hotel
        // Paramètres néant

        if (isset($this->hotel)) {
            return $this->hotel;
        } else {
            return new hotel();

        }

    }

    public function getPaye() {
        // Rôle : dire si la réservation est payée ou non
        // Retour : true ou false
        // Paramètres : néant

       if (! empty($this->paye) ) {
           return true;
       } else {
           return false;
       }

    }

    public function getListeHotel() {
        // Rôle : retourner une liste d'hotel : [ id1 => nom1, id2 => nom2, .... ]
        // Retour : la liste
        // Paramètres : néant

        return $this->getHotel()->getListeSelect();


    }




    public function loadById($id) {
        // Rôle : charger les attributs de la réservation pour une réservation précise
        // Retour : true ou false
        // Paramètres :
        //      $id : id de la réservation à charger

        // Lecture dans la BDD
        $sql = "SELECT `id`, `client`, `hotel`, DATE_FORMAT(`date`,'%Y-%m-%d') AS 'date' FROM `reservation` WHERE `id` = :id";
        global $bdd;
        $req = $bdd->prepare($sql);
       // Exécution
       if ($req->execute( [ ":id" => $id ]) === false) {
           debug("reservation,->loadById() : échec de la requête $sql");
           return false;
       }

       $ligne = $req->fetch(PDO::FETCH_ASSOC);
       if ($ligne === false ) {
           // Pas de ligne récupérée
           debug("reservationloadById() : pas d'id $id");
           return false;
       }

       $this->date = $ligne["date"];
       $this->hotel = new hotel($ligne["hotel"]);           // On a un constructeur qui charge
       //$this->client = new client();
       //$this->client->loadById($this->client);

    }

    public function insert() {
        // Rôle : ajouter la réservation courante dans la base de données
        // Retour : true si ok, false sinon
        // Paramètres : néant

        // Vérifier que les valeurs sont renseignées
        if ( ($this->getHotel()->is()) or  (!isset($this->client)) or (!isset($this->date))  ) {
            debug("reservation->insert() : champs non renseignés");
            return false;
        }


        // Vérifier que c'est bien une nouvel réservation (par d'ID)
        if (!empty($this->getId())) {
            debug("reservation->insert() : il y a déjà un ID");
            return false;
        }


        // Insérer dans la base :
        $sql = "INSERT INTO `reservation` SET `hotel`= :hotel, `client` = :client, `date` = :date, `paye` = :paye;";
        $param = [ ":hotel" => $this->getHotel()->getId(), ":client" => $this->getClient()->getId(), ":date" => $this->date, ":paye" => empty($this->paye) ? 0 : 1];
        global $bdd;
        $req = $bdd->prepare($sql);
        if ($req->execute($param) === false) {
            debug("reservation->insert() : échec de la requête $sql");
            return false;
        }

        if ($req->rowCount() === 1) {
           // On a touché une ligne exactement
           return true;
       } else {
           debug("resqervation->insert() : Aucune ligne créée");
           return false;
       }
    }



}
