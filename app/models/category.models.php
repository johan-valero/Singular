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

    // Affiche les données d'une catégorie via son nom
    public function get_cat($name){
        $DB = Database::newInstance();
        return $DB->read("select * from categories  
        where name_category = '$name'");
    }

    // Affiche les logements d'une même category
    public function get_rooms_by_id_category($id){
        $DB = Database::newInstance();
        return $DB->read("select * from categories 
        join rooms on categories.id_category = rooms.id_category 
        join beddings on beddings.id_bedding = rooms.id_bedding
        join animals on animals.id_animal = rooms.id_animal   
        where categories.id_category = '$id'");
    }
}