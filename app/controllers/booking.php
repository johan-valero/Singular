<?php

// Gestion de la page réservation
class Booking extends Controller{
    public function index($slug){  

        $User = $this->load_model('User');
        $Accomodation = $this->load_model('Accomodation');
        $user_data = $User->check_login(true, ["admin","customer"]);
        $Rooms = $this->load_model('Room');

        if(is_object($user_data)){
            $data['user_data'] = $user_data;
        }
        
        // Récolte toutes les informations lorsque le slug est le même 
        $details = $Rooms->get_all_with_details($slug);

        if(is_array($details)){
            // Récolte toutes les options et équipements d'un logements 
            $accom = $Accomodation->get_accom($details[0]->id_room);
            $data['accom'] = $accom;
            $data['details'] = $details[0];
        }

        $data['page_title'] = "Réservation";
        $this->view("booking", $data);
    }
}