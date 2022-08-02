<?php

Class Rooms extends Controller{
    public function index(){
        $User = $this->load_model('User');
        $Rooms = $this->load_model('Room');
        $Accomodation = $this->load_model('Accomodation');
        $Categories = $this->load_model('Category');
        $user_data = $User->check_login();

        if(is_object($user_data)){
            $data['user_data'] = $user_data;
        }

        // Vérifie si il y a une recherche
        $search = false;
        if(isset($_GET['find'])){
            $find = addslashes($_GET['find']);
            $search = true;
        }

        // Si il ya une recherche on la cherche via son nom
        if($search){
            $search = "%".$find."%";
            $rooms = $Rooms->search_results($search);
            $acc = array();
            if($rooms){
                foreach($rooms as $key => $row){
                    // Affiche les aménagement lié à un logement
                    $acc = $Accomodation->get_accom($row->id_room);
                    $rooms[$key]->acc = $acc;
                } 
            }
        }else{
            $rooms = $Rooms->get_all();
            foreach($rooms as $key => $row){
                // Affiche les aménagement lié à un logement
                $acc = $Accomodation->get_accom($row->id_room);
                $rooms[$key]->acc = $acc;
            } 
        }

        // Récupération de toutes les catgéories 
        $categories = $Categories->get_all();

        $data['categories'] = $categories;
        $data['rooms'] = $rooms;
        $data['page_title'] = "Logements";
        $this->view('rooms', $data);
    }
}