<?php

class Room{

    // Affichage des logements en incluant le lit la catégorie et les animaux via le "slug"
    public function get_all_with_details($slug){
        $DB = Database::newInstance();
        return $DB->read("
        select * from rooms 
        join beddings on rooms.id_room = beddings.id_bedding 
        join categories on rooms.id_category = categories.id_category 
        join animals on rooms.id_animal = animals.id_animal 
        where slug = :slug", ['slug'=>$slug]);
    }

    // Affichage des 4 derniers logements
    public function get_last(){
        $DB = Database::newInstance();
        return $DB->read("select * from rooms 
        join categories on rooms.id_category = categories.id_category 
        order by id_room desc 
        limit 6");
    } 
    // Affichage des logements
    public function get_all(){
        $DB = Database::newInstance();
        return $DB->read("select * from rooms
        join categories on rooms.id_category = categories.id_category 
        ");
    } 

    // Affichage des logements pour une recherche
    public function search_results($find){
        $DB = Database::newInstance();
        return $DB->read("select * from rooms join categories on rooms.id_category = categories.id_category where CONCAT(name_room, name_category)  like '$find'");
    }
}