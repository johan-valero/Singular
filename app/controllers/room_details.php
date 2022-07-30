<?php

class Room_details extends Controller{
    public function index($slug){
        
        // Ajoute des antislashs dans une chaîne de caractère
        $slug = addslashes($slug);
        $User = $this->load_model('User');
        $Accomodation = $this->load_model('Accomodation');

        // On vérifie si l'utilisateur est connecté 
        $user_data = $User->check_login();
        
        // Si l'utilisateur est connecté on récolte ses données
        if(is_object($user_data)){
            $data['user_data'] = $user_data;
        }

        $DB = Database::newInstance();

        // Query pour récolté toutes les informations lorsque le slug est le même 
        $details = $DB->read("select * from rooms join beddings on rooms.id_room = beddings.id_bedding where slug = :slug", ['slug'=>$slug]);
        $accom = $Accomodation->get_accom($details[0]->id_room);
        $data['accom'] = $accom;
        $data['page_title'] = "Détails du logement";
        $data['details'] = $details[0];
        $this->view("room_details", $data);
    }
}