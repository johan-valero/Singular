<?php

// Gestion du panel administrateur
class Admin extends Controller{

    // Fonction qui gère le dashboard de la section Admin
    public function index(){
        $User = $this->load_model('User');
        $user_data = $User->check_login(true, ["admin"]);

        if(is_object($user_data)){
            $data['user_data'] = $user_data;
        }

        $data['page_title'] = "Admin";
        $data['current_page'] = "tableau de bord";
        $this->view("admin/index", $data);
    }

    // Gestion de l'onglet logements de la section admi
    public function Rooms(){
        $Rooms = $this->load_model("Room");
        $Categories = $this->load_model("Category");
        $User = $this->load_model('User');
        $Accomodation = $this->load_model('Accomodation');
        $Animals = $this->load_model('Animal');
        $Beddings = $this->load_model('Bedding');
        $user_data = $User->check_login(true, ["admin"]);
        
        if(is_object($user_data)){
            $data['user_data'] = $user_data;
        }

        $data['animals'] = $Animals->get_all();
        $data['beddings'] = $Beddings->get_all();
        $data['categories'] = $Categories->get_all();
        $data['accomodations'] = $Accomodation->get_all();
        $data['rooms'] = $Rooms->get_all_admin();
        $data['current_page'] = "logements";
        $data['page_title'] = "Admin | Logements";
        $this->view("admin/rooms", $data);
    }

    // Gestion de l'onglet catégorie de la section admin
    public function Categories(){
        $Categories = $this->load_model("Category");
        $User = $this->load_model('User');
        $user_data = $User->check_login(true, ["admin"]);
        
        if(is_object($user_data)){
            $data['user_data'] = $user_data;
        }

        $data['categories'] = $Categories->get_all();
        $data['current_page'] = "Catégories";
        $data['page_title'] = "Admin | Catégories";
        $this->view("admin/categories", $data);
    }

        // Gestion de l'onglet litterie de la section admin
        public function Beddings(){
            $Beddings = $this->load_model("Bedding");
            $User = $this->load_model('User');
            $user_data = $User->check_login(true, ["admin"]);
            
            if(is_object($user_data)){
                $data['user_data'] = $user_data;
            }
            
            if(count($_POST)){
                $data['POST'] = $_POST;
                $Beddings->create($data['POST']);
            }

            $data['beddings'] = $Beddings->get_all();
            $data['current_page'] = "Litterie";
            $data['page_title'] = "Admin | Litterie";
            $this->view("admin/beddings", $data);
        }
}