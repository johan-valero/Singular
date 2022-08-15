<?php 

// Models pour la gestion des fonction lié à la réservation d'un logement. 
class Booking{
    private $error = "";
    // Fonction de création d'une réservation
    public function create(){

    }

    // Récupère toutes les réservations
    public function get_all(){
        $DB = Database::newInstance();
        $query = "select * from rooms_booking";             
        return $DB->read($query);
    }
}