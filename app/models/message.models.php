<?php 

class Message{

    protected $error = array();
    // Fonction création d'un message de la page contact
    public function create($POST){
        $this->error = array();
        $DB = Database::newInstance();
        $data['name'] = ucwords($_POST['name']);
        $data['email'] = $_POST['email'];
        $data['phone'] = $_POST['phone'];
        $data['subject'] = $_POST['subject'];
        $data['message'] = $_POST['message'];
        $data['date'] = date("Y-m-d H:i:s");

        if(empty($data['name'])){
            $this->error[] = "Veuillez remplir le champ avec un nom valide.";
        }

        if(!filter_var($data['email'],FILTER_VALIDATE_EMAIL)){
            $this->error[] = "Veuillez remplir le champ avec une email valide.";
        }

        if(!is_numeric($data['phone'])){
            $this->error[] = "Veuillez remplir le champ téléphone avec un numéro valide";
        }

        if(empty($data['message'])){
            $this->error[] = "Veuillez remplir le champ message";
        }
        
        if (count($this->error) == 0){
            $query = "insert into contact (name_contact,email_contact,phone_contact,subject_contact,message_contact,date_contact) values (:name,:email,:phone,:subject,:message,:date)";
            $check = $DB->write($query, $data);

            if($check){
                return true;
            }
        }
        return $this->error;
    } 
}