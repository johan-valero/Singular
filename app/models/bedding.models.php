<?php

class Bedding{
        // Affichage des lits
        public function get_all(){
            $DB = Database::newInstance();
            return $DB->read("select * from beddings");
        } 
}