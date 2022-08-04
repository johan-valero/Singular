<?php

Class Rooms extends Controller{
    public function index(){
        $User = $this->load_model('User');
        $Rooms = $this->load_model('Room');
        $Accomodation = $this->load_model('Accomodation');
        $Categories = $this->load_model('Category');
        $Animals = $this->load_model('Animal');
        $Beddings = $this->load_model('Bedding');
        $user_data = $User->check_login();

        // Vérifie si un user est connecté
        if(is_object($user_data)){
            $data['user_data'] = $user_data;
        }

        // Vérifie si il y a une recherche
        $search = false;
        if(isset($_GET['find'])){
            $find = addslashes($_GET['find']);
            $search = true;
        }

        // Si il ya une recherche on la cherche via le nom indiqué ($find)
        if($search){
            $search = "%".$find."%";
            $search_rooms = $Rooms->search_results($search);
            $data['search_rooms'] = $search_rooms;
        // Si l'utilisateur utilise la recherche avancée  
        }elseif(isset($_GET['filter'])){
            $GET['categories'] = $_GET['categories'];
            $filter = $Rooms->results_filter($GET);
            $data['search_rooms'] = $filter;
        
        // Si l'utilisateur arrive sur la page rooms
        }else{
            $all_rooms = $Rooms->get_all();
            $data['all_rooms'] = $all_rooms;
        }
        
        $data['animals'] = $Animals->get_all();
        $data['beddings'] = $Beddings->get_all();
        $data['categories'] = $Categories->get_all();
        $data['accomodations'] = $Accomodation->get_all();
        $data['page_title'] = "Logements";
        $this->view('rooms', $data);
    }

    // Fonction d'affichage des items d'une categorie dans la section produit
    public function category($name){
        // Variables qui permettent d'utiliser les models 
        $User = $this->load_model('User');
        $Categories = $this->load_model('Category');
        $Rooms = $this->load_model('Room');
        $user_data = $User->check_login();
        
        // Vérifie sur un utilisateur est connecté
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