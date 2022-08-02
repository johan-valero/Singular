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

        $data['error'] = array();
        if(count($_POST)>0){
            $data['POST'] = $_POST;
            $data['error'] = $Contact->create($_POST);
            if(!is_array($data['error']) && $data['error']){
                header("Location: ".ROOT."contact?success=true");
                die;
            }
        }

        $DB = Database::newInstance();
        $data['page_title'] = "Contact";
        $this->view("contact", $data);
    }
}