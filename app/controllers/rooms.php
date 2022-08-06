<?php

Class Rooms extends Controller{
    public function index($name){
        // Chargement des models
        $User = $this->load_model('User');
        $Rooms = $this->load_model('Room');
        $Accomodation = $this->load_model('Accomodation');
        $Categories = $this->load_model('Category');
        $Animals = $this->load_model('Animal');
        $Beddings = $this->load_model('Bedding');
        
        // Verification du login
        $user_data = $User->check_login();

        // Vérifie si un user est connecté
        if(is_object($user_data)){
            $data['user_data'] = $user_data;
        }

        // Détermine si la variable est déclarée et est différente de null Si il ya une recherche on la cherche via le nom indiqué ($find)
        if(isset($_GET['find'])){
            $find = addslashes($_GET['find']);
            $search = "%".$find."%";
            $search_rooms = $Rooms->search_results($search);
            $data['rooms'] = $search_rooms;

        // Si l'utilisateur utilise la recherche avancée  
        }elseif(isset($_GET['filter'])){
            $GET = array();
            if(isset($_GET['categories']) && trim($_GET['categories']) != "-- Catégories --"){
                $GET['categories'] = $_GET['categories'];
            }

            if(isset($_GET['beddings']) && trim($_GET['beddings']) != "-- Lit --"){
                $GET['beddings'] = $_GET['beddings'];
            }

            if(isset($_GET['animals1'])){
                $GET['animals1'] = $_GET['animals1'];
            }

            if(isset($_GET['animals2'])){
                $GET['animals2'] = $_GET['animals2'];
            }
            
            $filter = $Rooms->results_filter($GET);
            $data['rooms'] = $filter;
        
        // Si l'utilisateur recherche une categorie
        }elseif(isset($name) && $name != "home"){
            $data['name'] = $Categories->get_cat($name);
            $data['rooms'] = $Categories->get_rooms_by_name_category($name);

        // Si l'utilisateur arrive sur la page rooms
        }elseif(isset($name) && $name == "home"){
            $data['rooms'] = $Rooms->get_all();
        }
        
        $data['animals'] = $Animals->get_all();
        $data['beddings'] = $Beddings->get_all();
        $data['categories'] = $Categories->get_all();
        $data['accomodations'] = $Accomodation->get_all();
        $data['page_title'] = "Logements";
        $this->view('rooms', $data);
    }
}