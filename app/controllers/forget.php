<?php

// Gestion de la fonctionnalité mot de passe oublié 
class Forget extends Controller{
    public function index(){
        $data['page_title'] = "Mot de passe oublié";
        
        // On check si le formulaire est soumis
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $User = $this->load_model("User");
            $User->forget($_POST);
        }

        $this->view("forget", $data);
    }

    // Message de modification de mot de passe
    public function password_message(){        
        $data['page_title'] = "Changement de mot de passe";
        $this->view("forget.message", $data);
    }
}