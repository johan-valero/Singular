<?php 

// Models pour la gestion des fonction lié à la réservation d'un logement. 
class Booking_room{
    private $error = "";

    // Fonction pour vérifier si les données de la reservation sont valides.
    public function validate($POST){
        // Si l'input name est vide on ajoute un message d'erreur dans la variable privé error 
        if(empty($POST['name'])){
            $this->error .= "Veuillez entrer un nom de partenaire valide. <br>";
        }

        // Si l'input firstname est vide on ajoute un message d'erreur dans la variable privé error 
        if(empty($POST['firstname'])){
            $this->error .= "Veuillez entrer un prénom valide. <br>";
        }

        // Si l'input email est vide on ajoute un message d'erreur dans la variable privé error 
        if(empty($POST['email'])){
            $this->error .= "Veuillez entrer une adresse email valide. <br>";
        }

        // Si les input email ne correspondent pas on ajoute un message d'erreur dans la variable privé error 
        if($POST['email'] != $POST['email2']){
            $this->error .= "Les adresses emails ne correspondent pas. <br>";
        }
        
        // Si l'input phone est vide on ajoute un message d'erreur dans la variable privé error 
        if(empty($POST['phone'])){
            $this->error .= "Veuillez entrer un numéro de téléphone valide. <br>";
        }

        // Si l'input checkin est vide on ajoute un message d'erreur dans la variable privé error 
        if(empty($POST['checkin'])){
            $this->error .= "Veuillez entrer une date d'arrivé valide. <br>";
        }

        // Si l'input checkin est vide on ajoute un message d'erreur dans la variable privé error 
        if(empty($POST['checkout'] || $POST['checkout'] < $POST['checkin'])){
            $this->error .= "Veuillez entrer une date de départ valide. <br>";
        }

        // Si l'input persons est égale à 0 on ajoute un message d'erreur dans la variable privé error 
        if($POST['persons'] == 0 || !is_numeric($POST['persons'])){
            $this->error .= "Veuillez sélectionner un nombre de personne valide. <br>";
        }

        $POST['days'] = ceil((strtotime($POST['checkout']) - strtotime($POST['checkin'])) / 86400);
        
        // Si le nombre de jours est inférieur à 0 on ajoute un message d'erreur. 
        if($POST['days'] <= 0 ){
            $this->error .= "Les dates que vous avez choisi ne sont pas valide. Veuillez entrer un intervalle de date correct.";
        }

        $data['demand'] = $POST['demand'];

        // Si il n'y à pas d'erreur on redirige vers 
        if($this->error == ""){
            redirect("booking/summary");
        }
        $_SESSION['error'] = $this->error;
    }

    // Fonction de création d'une réservation
    public function create($POST, $total, $days, $details, $user){
        $data['name'] = $POST['name'];
        $data['firstname'] = $POST['firstname'];
        $data['email'] = $POST['email'];
        $data['birthday'] = $POST['birthday'];
        $data['phone'] = $POST['phone'];
        $data['checkin'] = $POST['checkin'];
        $data['checkout'] = $POST['checkout'];
        $data['persons'] = $POST['persons'];
        $data['days'] = $days;
        $data['total'] = $total;
        $data['date'] = date("Y-m-d H:i:s");
        $data['room'] = $details->id_room;
        $data['user'] = $user->id_user;
        $data['demand'] = $POST['demand'];

        $DB = Database::newInstance();
        $query = "
        insert into booking(
                name_user, 
                firstname_user,
                email_user, 
                birthday,
                date_booking, 
                phone_user,
                check_in, 
                check_out,
                persons,
                days, 
                id_room, 
                total_booking, 
                id_user,
                demand) 
            values(
                :name,
                :firstname,
                :email,
                :birthday,
                :date,
                :phone,
                :checkin, 
                :checkout, 
                :persons, 
                :days, 
                :room, 
                :total, 
                :user,
                :demand)"; 
            
            $check = $DB->write($query, $data);
            if($check){
                return true;
            }
    } 

    // Récupère toutes les réservations
    public function get_all(){
        $DB = Database::newInstance();
        $query = "select * from booking join rooms on booking.id_room = rooms.id_room order by id_booking desc";             
        return $DB->read($query);
    }

    // Fonction qui récupère toutes les réservations en fonction du user
    public function get_all_by_user($id){
        $DB = Database::newInstance();
        $query = "select * from booking join rooms on booking.id_room = rooms.id_room where id_user = '$id'";
        return $DB->read($query);
    }

    // Getter d'une reservation en fonction de l'id
    public function get_one($id){
        $id = (int)$id;
        $DB = Database::newInstance();
        $data = $DB->read("select * from booking join rooms on booking.id_room = rooms.id_room where id_booking = '$id' limit 1 ");
        if($data){
            return $data[0];
        }
    }
    
    // Fonction suppression d'une catégorie
    public function delete($id){
        $DB = Database::newInstance();
        $id = (int)$id;
        $query = "delete from booking where id_booking = '$id' limit 1 ";
        $DB->write("$query");
    } 

    // Fonction confirmation d'une réservation
    public function confirmed($id){
        $DB = Database::newInstance();
        $id = (int)$id;
        $query = "update booking set validate = 1 where id_booking = '$id' limit 1 ";
        $DB->write("$query");
    } 
}