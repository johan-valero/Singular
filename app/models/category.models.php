<?php

class Category{
    // Affichage des catégories
    public function get_all(){
        $DB = Database::newInstance();
        return $DB->read("select * from categories");
    } 
}