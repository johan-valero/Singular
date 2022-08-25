<?php

// Gestion de la page réservation
class Booking extends Controller{
    public function index($slug){  

        $User = $this->load_model('User');
        $Bookings = $this->load_model('Booking_room');
        $Accomodation = $this->load_model('Accomodation');
        $user_data = $User->check_login(true, ["admin","customer"]);
        $Rooms = $this->load_model('Room');

        if(is_object($user_data)){
            $data['user_data'] = $user_data;
        }
        
        // Récolte toutes les informations lorsque le slug est le même 
        $details = $Rooms->get_all_with_details($slug);

        if(isset($details) && is_array($details)){
            // Récolte toutes les options et équipements d'un logements 
            $accom = $Accomodation->get_accom($details[0]->id_room);
            $data['accom'] = $accom;
            $_SESSION['details'] = $details[0];
            $data['details'] = $details[0];
        }

        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $_SESSION['POST_DATA'] = $_POST;
            $days = ceil((strtotime($_POST['checkout']) - strtotime($_POST['checkin'])) / 86400);
            $total = $days * $details[0]->price_room; 
            $_SESSION['days'] = $days;
            $_SESSION['total'] = $total;
            $Bookings->validate($_POST, $days);
            if($_SESSION['error'] == ""){
                redirect("booking/summary");
            }
        }
        
        $dates = $Bookings->get_all_date($details[0]->id_room);
        $data['dates'] = $dates;
        $data['page_title'] = "Réservation";
        $this->view("booking", $data);
    }

    public function summary(){
        $User = $this->load_model('User');
        $Bookings = $this->load_model('Booking_room');
        $user_data = $User->check_login(true, ["admin","customer"]);
        
        if(is_object($user_data)){
            $data['user_data'] = $user_data;
        }

        if(isset($_SESSION['POST_DATA']) && $_SERVER['REQUEST_METHOD'] == "POST"){
            $check = $Bookings->create($_SESSION['POST_DATA'], $_SESSION['total'], $_SESSION['days'], $_SESSION['details'], $user_data);
            if($check == true){
                unset($_SESSION['POST_DATA']);
                unset($_SESSION['total']);
                unset($_SESSION['days']);
                unset($_SESSION['details']);
                redirect("booking/thanks"); 
            }

        }
        $data['page_title'] = "Récapitulatif de votre réservation";
        $this->view("booking.summary", $data);
    }

    public function thanks(){
        $User = $this->load_model('User');
        $user_data = $User->check_login();
        
        if(is_object($user_data)){
            $data['user_data'] = $user_data;
        }
        $data['page_title'] = "Finalisation de la réservation";
        $this->view("booking.thanks", $data);
    }
}