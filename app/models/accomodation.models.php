<?php

class Accomodation{
        // Affichage des aménagements
        public function get_all(){
            $DB = Database::newInstance();
            return $DB->read("select * from accomodations order by id_accomodation desc ");
        } 
        
        // Récupère les aménagements des logements grace à l'id
        public function get_accom($id){
            $DB =Database::newInstance();
            $query = "
            SELECT * FROM accomodations
            JOIN avoir 
            ON accomodations.id_accomodation = avoir.id_accomodation
            JOIN rooms 
            ON rooms.id_room = avoir.id_room
			WHERE rooms.id_room = '$id'
            ";
            $data = $DB->read($query);
            return $data;
        }
}