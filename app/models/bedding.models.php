<?php

class Bedding{
    // Affichage des lits
    public function get_all(){
        $DB = Database::newInstance();
        return $DB->read("select * from beddings");
    } 

    // fonction pour la création de litterie
    public function create($post){
        show($post);
        $data['bedding'] = $post['name'];
        $DB = Database::newInstance();
        $query = "insert into beddings (name_bedding) values (:bedding)";
        $DB->write($query, $data);
    }

    // fonction pour la suppression de litterie
    public function delete($id){
        $DB = Database::newInstance();
        $query = "delete from beddings where id_bedding = '$id limit 1";
        $DB->write($query);
    }
}