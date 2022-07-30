<?php

// Avec le extends la class Home a accès aux fonction de la Class Controller même si elles sont protégés ou en private
class Home extends Controller{

    public function index(){  

        $User = $this->load_model('User');
        $Accomodation = $this->load_model('Accomodation');
        $user_data = $User->check_login();
        
        if(is_object($user_data)){
            $data['user_data'] = $user_data;
        }

        $DB = Database::newInstance();

        // Afficher tout les logements dans la BDD + les aménagements qui lui sont liés
        $rooms = $DB->read("select * from rooms join avoir on avoir.id_room = rooms.id_room inner join accomodations on avoir.id_accomodation = accomodations.id_accomodation GROUP BY rooms.id_room");

        show($rooms);
        $data['rooms'] = $rooms;
        $data['page_title'] = "Accueil";

        $this->view("index", $data);
    }
}