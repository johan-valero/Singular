<?php

class Room{

    // Affichage des logements en incluant le lit la catégorie et les animaux via le "slug"
    public function get_all_with_details($slug){
        $DB = Database::newInstance();
        return $DB->read("
        select * from rooms 
        join beddings on rooms.id_bedding = beddings.id_bedding 
        join categories on rooms.id_category = categories.id_category 
        join animals on rooms.id_animal = animals.id_animal 
        where slug = :slug", ['slug'=>$slug]);
    }

    // Affichage des 4 derniers logementsen incluant la catégorie pour le template des cards
    public function get_last(){
        $DB = Database::newInstance();
        return $DB->read("select * from rooms 
        join categories on rooms.id_category = categories.id_category 
        order by id_room desc 
        limit 6");
    } 
    // Affichage des logements en incluant la catégorie
    public function get_all(){
        $DB = Database::newInstance();
        return $DB->read("select * from rooms
        join categories on rooms.id_category = categories.id_category 
        ");
    } 

    // Affichage des logements pour une recherche en incluant CONCAT qui permet d'inclure la catégorie dans la recherche
    public function search_results($find){
        $DB = Database::newInstance();
        return $DB->read("select * from rooms join categories on rooms.id_category = categories.id_category where CONCAT(name_room, name_category)  like '$find'");
    }

    // Affichage des logements via le formulaire de recherche avancée 
    public function results_filter($GET){
        $DB = Database::newInstance();
        $query = "
        SELECT * FROM rooms 
        JOIN categories 
        ON categories.id_category = rooms.id_category
        JOIN beddings 
        ON beddings.id_bedding = rooms.id_bedding
        JOIN animals 
        ON animals.id_animal = rooms.id_animal
        ";

        // Mis en place de la query en ajoutant les filtre lorsqu'ils sont set
        if(count($GET) > 0){
            $query .= " WHERE ";
        }

        if(isset($GET['categories'])){
            $query .= " categories.id_category = '$GET[categories]' AND ";
        }

        if(isset($GET['beddings'])){
            $query .= " beddings.id_bedding = '$GET[beddings]' AND ";
        }

        if(isset($GET['animals1']) && !isset($GET['animals2'])){
            $query .= " animals.id_animal = '$GET[animals1]' AND ";
        }elseif(isset($GET['animals2']) && !isset($GET['animals1']) ){
            $query .= " animals.id_animal = '$GET[animals2]' AND ";
        }elseif(isset($GET['animals1']) && isset($GET['animals2'])){
            $query .= " animals.id_animal IN ('$GET[animals1]', '$GET[animals2]') AND ";
        }

        $query = trim($query);
        $query = trim($query, 'AND');
        $query = trim($query, 'OR');
        $query .= "
        ORDER BY id_room desc
        ";

        show($query);
        $rooms = $DB->read($query);
        return $rooms;
    }
}