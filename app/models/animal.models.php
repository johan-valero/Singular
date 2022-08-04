<?php

class Animal{
        // Affichage des animaux admis
        public function get_all(){
            $DB = Database::newInstance();
            return $DB->read("select * from animals");
        } 
}