<?php

// Gestion des datas pour l'index
class Home extends Controller{

    public function index(){  

        $User = $this->load_model('User');
        $Accomodation = $this->load_model('Accomodation');
        $Sliders = $this->load_model('Slider');
        $Partners = $this->load_model('Partner');
        $Socials = $this->load_model('Social');
        $Categories = $this->load_model('Category');
        $Rooms = $this->load_model('Room');
        $user_data = $User->check_login();
        
        if(is_object($user_data)){
            $data['user_data'] = $user_data;
        }
        
        // Afficher tout les aménagements disponibles
        $data['facilities'] = $Accomodation->get_all();

        // Afficher toutes les catégories disponible
        $data['categories'] = $Categories->get_all();

        // Afficher les 4 derniers logements par id 
        $data['rooms'] = $Rooms->get_last();

        // Afficher les sliders du carousel
        $data['sliders'] = $Sliders->get_all();

        // Afficher tout les partenaires
        $data['partners'] = $Partners->get_all();

        // Afficher les informations sociales
        $data['instagram'] = $Socials->get_one("Instagram");
        $data['phone'] = $Socials->get_one("Téléphone");
        $data['email'] = $Socials->get_one("Email");
        $data['youtube'] = $Socials->get_one("Vidéo Youtube");
        
        $data['page_title'] = "Accueil";
        $this->view("index", $data);
    }
}