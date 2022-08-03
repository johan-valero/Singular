<?php

class Category{
    // Affichage des catégories
    public function get_all(){
        $DB = Database::newInstance();
        return $DB->read("select * from categories");
    }
    
    // Affiche les logements via le nom de catégorie
    public function get_rooms_by_name_category($name){
        $DB = Database::newInstance();
        return $DB->read("select * from categories 
        join rooms on categories.id_category = rooms.id_category 
        where name_category = '$name'");
    }
}