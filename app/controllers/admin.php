<?php

// Gestion du panel administrateur
class Admin extends Controller{

    // Fonction qui gère le dashboard de la section Admin
    public function index(){
        $User = $this->load_model('User');
        // $user_data = $User->check_login(true, ["admin"]);
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
        $user_data = $User->check_login(true, ["admin"]);
        
        if(is_object($user_data)){
            $data['user_data'] = $user_data;
        }

        

        $data['rooms'] = $Rooms->get_all_admin();
        $data['current_page'] = "logements";
        $data['page_title'] = "Admin | Logements";
        $this->view("admin/rooms", $data);
    }
}