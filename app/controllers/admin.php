<?php

// Gestion du panel administrateur
class Admin extends Controller{

    // Fonction qui gère lae dashboard de la section Admin
    public function index(){
        $User = $this->load_model('User');
        // $user_data = $User->check_login(true, ["admin"]);
        $user_data = $User->check_login();

        if(is_object($user_data)){
            $data['user_data'] = $user_data;
        }

        $data['page_title'] = "Admin";
        $data['current_page'] = "dashboard";
        $this->view("admin/index", $data);
    }
}