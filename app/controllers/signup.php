<?php

// Gestion de l'inscirption d'un user
class Signup extends Controller{
    public function index(){
        $data['page_title'] = "Inscription";

        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $User = $this->load_model("User");
            $User->signup($_POST);
        }

        $this->view("signup", $data);
    }
}