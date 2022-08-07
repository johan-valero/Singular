<?php

// Gestion des détails d'un logement
class Room_details extends Controller{
    public function index($slug){
        
        // Ajoute des antislashs dans une chaîne de caractère
        $slug = addslashes($slug);
        $User = $this->load_model('User');
        $Accomodation = $this->load_model('Accomodation');
        $Categories = $this->load_model('Category');
        $Rooms = $this->load_model('Room');

        // On vérifie si l'utilisateur est connecté 
        $user_data = $User->check_login();
        
        // Si l'utilisateur est connecté on récolte ses données
        if(is_object($user_data)){
            $data['user_data'] = $user_data;
        }
        
        // Récolte toutes les informations lorsque le slug est le même 
        $details = $Rooms->get_all_with_details($slug);
        
        if(is_array($details)){
            // Récolte toutes les options et équipements d'un logements 
            $accom = $Accomodation->get_accom($details[0]->id_room);

            // Récolte les logements disponibles dans la même catégorie
            $similar = $Categories->get_rooms_by_id_category($details[0]->id_category);

            $data['accom'] = $accom;
            $data['details'] = $details[0];
            $data['similar_rooms'] = $similar;
        }
        
        $data['page_title'] = "Détails du logement";
        $this->view("room_details", $data);
    }
}