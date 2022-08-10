<?php

class Accomodation{

    private $error = "";
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

    // Affichage d'un aménagement
    public function get_one($id){
        $DB = Database::newInstance();
        $data = $DB->read("select * from accomodations where id_accomodation = '$id' limit 1");
        return $data[0];
    } 

    // fonction pour la création d'un aménagement
    public function create($post){
        $data['accomodation'] = ucwords($post['name']);
        $data['description'] = $post['description'];
        $data['icon'] = $post['icon'];

        if(empty(trim($data['accomodation']))){
            $this->error .= "Veuillez entrer un nom d'aménagement valide <br>";
        }
        
        if(empty(trim($data['description']))){
            $this->error .= "Veuillez entrer une description valide <br>";
        }

        if(empty(trim($data['icon']))){
            $this->error .= "Veuillez entrer une icone valide <br>";
        }

        if($this->error == ""){
            $DB = Database::newInstance();
            $query = "insert into accomodations (name_accomodation, description_accomodation, icon_accomodation) values (:accomodation , :description, :icon)";
            $DB->write($query, $data);
        }
        $_SESSION['error'] = $this->error;
    }

    // fonction pour la suppression d'un aménagement
    public function delete($id){
        $DB = Database::newInstance();
        $query = "delete from accomodations where id_accomodation = '$id' limit 1";
        $DB->write($query);
    }

    // Fonction modification d'un aménagement
    public function edit($post, $id){
        $DB = Database::newInstance();
        $data['accomodation'] = ucwords($post['name']);
        $data['description'] = $post['description'];
        $data['icon'] = $post['icon'];

        $query = "update accomodations set name_accomodation = :accomodation, description_accomodation = :description, icon_accomodation = :icon where id_accomodation = '$id' limit 1 ";
        $DB->write($query,$data);
    } 
}