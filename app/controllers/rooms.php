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

        // Gestion de la pagination 
        // Nombre de logements par page
        // $limit = 3; 
        // $all_rooms = $Rooms->get_all();
        // $page = $_GET['page'];
        // if($all_rooms){
        //     // On détermine le nombre de page en fct du nombre d'élèments, ceil permet d'avoir un nombre entier.
        //     $page_number = ceil(count($all_rooms) / $limit);
        //     $data['page_number'] = $page_number;
        //     // Si on détecte "page" dans l'url
        //     if(isset($page)){
        //         $items = ($page-1)*$limit;
        //         $rooms = $Rooms->get_all_limit($items, $limit);
        //         $data['rooms'] = $rooms;
        //     }
        // }  

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

            if(isset($_GET['animals'])){
                foreach($_GET['animals'] as $key=>$value){
                    $GET['animals'][$key] = $value;
                }
            }
            
            if(isset($_GET['accomodations'])){
                foreach($_GET['accomodations'] as $key=>$value){
                    $GET['accomodations'][$key] = $value;
                }
            }

            // Ajoute le prix min a la recherche si celle si est set
            if(isset($_GET['max-price']) &&  trim($_GET['max-price']) != ""){
                $GET['max-price'] = (float)$_GET['max-price']; 
            }

            // Ajoute le prix max a la recherche si celle si est set
            if(isset($_GET['min-price']) && trim($_GET['min-price']) != ""){
                $GET['min-price'] = (float)$_GET['min-price']; 
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