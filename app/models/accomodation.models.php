<?php

class Accomodation{
        // Affichage des aménagements
        public function get_all(){
            $DB = Database::newInstance();
            return $DB->read("select * from accomodations order by id_accomodation desc ");
        } 
    
        // Aménagements en fonction de l'id
        public function get_one($id){
            $id = (int)$id;
            $DB = Database::newInstance();
            $data = $DB->read("select * from accomodations where id_accomodation = '$id' limit 1 ");
            return $data[0];
        } 
}