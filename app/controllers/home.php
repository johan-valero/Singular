<?php

// Avec le extends la class Home a accès aux fonction de la Class Controller même si elles sont protégés ou en private
class Home extends Controller{

    public function index(){  

        $User = $this->load_model('User');
        // $user_data = $User->check_login();
        
        if(is_object($user_data)){
            $data['user_data'] = $user_data;
        }

        $data['page_title'] = "Accueil";     
        $this->view("index", $data);
    }
}