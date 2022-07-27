<?php

// Getion de la connexion d'un user
class Login extends Controller{
    public function index(){
        $data['page_title'] = "Connexion";
        
        /* Checking if the form is submitted. */
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $User = $this->load_model("User");
            $User->login($_POST);
        }
        $this->view("login", $data);
    }
}