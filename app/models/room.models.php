<?php

class Room{

    // Affichage des logements en incluant le bedding
    public function get_all_with_bedding($slug){
        $DB = Database::newInstance();
        return $DB->read("select * from rooms join beddings on rooms.id_room = beddings.id_bedding where slug = :slug", ['slug'=>$slug]);
    }

    // Affichage des 4 derniers logements
    public function get_last(){
        $DB = Database::newInstance();
        return $DB->read("select * from rooms order by id_room desc limit 4");
    } 
    // Affichage des logements
    public function get_all(){
        $DB = Database::newInstance();
        return $DB->read("select * from rooms");
    } 

    // Affichage des logements pas catégories
    public function get_rooms_by_category($id){
        $DB = Database::newInstance();
        return $DB->read("select * from rooms where id_category = '$id'");
    }

    // Affichage des logements pour une recherche
    public function search_results($find){
        $DB = Database::newInstance();
        $results = $DB->read("select * from rooms join categories on rooms.id_category = categories.id_category where CONCAT(name_room, name_category)  like '$find'");
        return $results;
    }
}