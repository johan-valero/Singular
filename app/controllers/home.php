<?php

// Gestion des datas pour l'index
class Home extends Controller{

    public function index(){  

        $User = $this->load_model('User');
        $Accomodation = $this->load_model('Accomodation');
        $Categories = $this->load_model('Category');
        $user_data = $User->check_login();
        
        if(is_object($user_data)){
            $data['user_data'] = $user_data;
        }

        $DB = Database::newInstance();

        // Afficher les 4 derniers logements par id 
        $rooms = $DB->read("select * from rooms order by id_room desc limit 4 ");

        // Afficher tous les amanégements disponibles
        $facilities = $Accomodation->get_all();

        // Afficher toutes les catégories disponible
        $categories = $Categories->get_all();

        // Affichage de chaques aménagements lié à un logement 
        $acc = array();
        foreach($rooms as $key => $row){
            $acc = $Accomodation->get_accom($row->id_room);
            $rooms[$key]->acc = $acc;
        }   

        $data['categories'] = $categories;
        $data['facilities'] = $facilities;
        $data['rooms'] = $rooms;
        $data['page_title'] = "Accueil";
        $this->view("index", $data);
    }
}