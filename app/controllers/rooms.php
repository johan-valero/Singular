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
        }else{
            $rooms = $Rooms->get_all();
        } 

        // Get all category
        $data['categories'] = $Categories->get_all();

        $data['rooms'] = $rooms;
        $data['page_title'] = "Logements";
        $this->view('rooms', $data);
    }

    // Fonction d'affichage des items d'une categorie dans la section produit
    public function category($name){
        // Connexion de l'utilisateur
        $User = $this->load_model('User');
        $Categories = $this->load_model('Category');
        $Rooms = $this->load_model('Room');
        $user_data = $User->check_login();
        
        if(is_object($user_data)){
            $data['user_data'] = $user_data;
        }
        
        $rooms = $Categories->get_rooms_by_name_category($name);
        $all_rooms = $Rooms->get_all();

        // Get all category
        $data['categories'] = $Categories->get_all();
        $data['rooms'] = $rooms;
        $data['all_rooms'] = $all_rooms;
        $data['page_title'] = "Logements";
        $this->view("rooms", $data);
    }
}