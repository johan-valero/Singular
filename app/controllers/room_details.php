<?php

// Gestion des détails d'un logement
class Room_details extends Controller{
    public function index($slug){
        
        // Ajoute des antislashs dans une chaîne de caractère
        $slug = addslashes($slug);
        $User = $this->load_model('User');
        $Accomodation = $this->load_model('Accomodation');
        $Rooms = $this->load_model('Room');

        // On vérifie si l'utilisateur est connecté 
        $user_data = $User->check_login();
        
        // Si l'utilisateur est connecté on récolte ses données
        if(is_object($user_data)){
            $data['user_data'] = $user_data;
        }

        $details = array();
        if(isset($slug)){
            // Récolte toutes les informations lorsque le slug est le même 
            $details = $Rooms->get_all_with_details($slug);
            // Récolte toutes les options et équipements d'un logements 
            if($details){
                $accom = $Accomodation->get_accom($details[0]->id_room);
                $data['details'] = $details[0];
                $data['accom'] = $accom;
            }
        }


        $data['page_title'] = "Détails du logement";
        $this->view("room_details", $data);
    }
}