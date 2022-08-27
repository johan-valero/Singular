<?php

// Gestion de la page réservation
class Booking extends Controller{
    public function index($slug){  
        // Chargement des models.
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

        // Récupère toutes dates déjà réservée et on utilise la fct get_between_date pour les récuperer entre les deux input 
        $dates = $Bookings->get_all_date($details[0]->id_room);
        if(isset($dates) && is_array($dates)){
            foreach($dates as $date){
                $disable_dates[] = get_between_dates($date->check_in, $date->check_out);
            }
        }

        // Si un formulaire au méthode POST est envoyé au serveur
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $_SESSION['POST_DATA'] = $_POST;
            $days = ceil((strtotime($_POST['checkout']) - strtotime($_POST['checkin'])) / 86400);
            $total = $days * $details[0]->price_room; 
            $_SESSION['days'] = $days;
            $_SESSION['total'] = $total;
            // On récupère les dates incluse entre les deux input
            $between_post = get_between_dates($_POST['checkin'], $_POST['checkout']);
            // On passe en paramètre de la fonction pour valider les données 
            $Bookings->validate($_POST, $days, $disable_dates, $between_post);

            // s'il n'y a pas d'erreur on redirige vers le récapitulatif de réservation
            if($_SESSION['error'] == ""){
                redirect("booking/summary");
            }
        }
        
        $data['dates'] = $dates;
        $data['page_title'] = "Réservation";
        $this->view("booking", $data);
    }

    // Gestion de la page récapitulatif de la résevration 
    public function summary(){
        $User = $this->load_model('User');
        $Bookings = $this->load_model('Booking_room');
        $user_data = $User->check_login(true, ["admin","customer"]);
        
        if(is_object($user_data)){
            $data['user_data'] = $user_data;
        }

        if(isset($_SESSION['POST_DATA']) && $_SERVER['REQUEST_METHOD'] == "POST"){
            $check = $Bookings->create($_SESSION['POST_DATA'], $_SESSION['total'], $_SESSION['days'], $_SESSION['details'], $user_data);

            // si la resérvation est crée alors on détruit les variables de la session et on redirige vers la page de remerciement. 
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

    // Gestion de la page de remerciement de la réservation 
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