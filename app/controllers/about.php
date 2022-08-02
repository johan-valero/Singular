<?php

// Gestion de la page à propos
class About extends Controller{
    public function index(){  

        $User = $this->load_model('User');
        $user_data = $User->check_login();
        
        if(is_object($user_data)){
            $data['user_data'] = $user_data;
        }

        $DB = Database::newInstance();
        $data['page_title'] = "À propos";
        $this->view("about", $data);
    }
}