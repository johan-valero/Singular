<?php

// Gestion des datas pour l'index
class Home extends Controller{

    public function index(){  

        $User = $this->load_model('User');
        $Accomodation = $this->load_model('Accomodation');
        $Categories = $this->load_model('Category');
        $Rooms = $this->load_model('Room');
        $user_data = $User->check_login();
        
        if(is_object($user_data)){
            $data['user_data'] = $user_data;
        }

        // Afficher tout les aménagements disponibles
        $data['facilities'] = $Accomodation->get_all();

        // Afficher toutes les catégories disponible
        $data['categories'] = $Categories->get_all();

        // Afficher les 4 derniers logements par id 
        $data['rooms'] = $Rooms->get_last();

        $data['page_title'] = "Accueil";
        $this->view("index", $data);
    }
}