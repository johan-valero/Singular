<?php

// Avec le extends la class Home a accès aux fonction de la Class Controller même si elles sont protégés ou en private
class Home extends Controller{

    public function index(){  
        $data['page_title'] = "Accueil";     
        $this->view("index", $data);
    }
}