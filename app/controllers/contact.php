<?php

// Gestion de la page contact
class Contact extends Controller{
    public function index(){  

        $User = $this->load_model('User');
        $Contact = $this->load_model('Message');
        $user_data = $User->check_login();
        
        if(is_object($user_data)){
            $data['user_data'] = $user_data;
        }

        if($_POST){
            $data['POST'] = $_POST;
            $Contact->create($_POST);
        }

        $DB = Database::newInstance();

        $data['page_title'] = "Contact";
        $this->view("contact", $data);
    }
}