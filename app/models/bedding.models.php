<?php

class Bedding{

    private $error = "";
    // Affichage des lits
    public function get_all(){
        $DB = Database::newInstance();
        return $DB->read("select * from beddings");
    } 

    // Affichage d'un lit
    public function get_one($id){
        $DB = Database::newInstance();
        $data = $DB->read("select * from beddings where id_bedding = '$id' limit 1");
        return $data[0];
    } 

    // fonction pour la création de litterie
    public function create($post){
        $data['bedding'] = ucwords($post['name']);
        if(empty(trim($data['bedding']))){
            $this->error .= "Veuillez entrer un nom de literie valide";
        }
        
        if($this->error == ""){
            $DB = Database::newInstance();
            $query = "insert into beddings (name_bedding) values (:bedding)";
            $DB->write($query, $data);
        }
        $_SESSION['error'] = $this->error;
    }

    // fonction pour la suppression de litterie
    public function delete($id){
        $DB = Database::newInstance();
        $query = "delete from beddings where id_bedding = '$id' limit 1";
        $DB->write($query);
    }

    // Fonction modification de litterie
    public function edit($post, $id){
        $DB = Database::newInstance();
        $data['bedding'] = ucwords($post['name']);
        $query = "update beddings set name_bedding = :bedding where id_bedding = '$id' limit 1 ";
        $DB->write($query,$data);
    } 
}