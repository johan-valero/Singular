<?php

class User{

    private $error = "";

    // Fonction inscription du user
    public function Signup($POST){
        $data = array();
        $db = Database::getInstance();

        $data['name'] = $_POST['name'];
        $data['firstname'] = $_POST['firstname'];
        $data['email'] = $_POST['email'];
        $data['phone'] = $_POST['phone'];
        $data['password'] = $_POST['password'];
        $password2 = $_POST['password2'];
        
        /* Checking if the email is valid. */
        if (empty($data['email']) ){
            $this->error .= "Veuillez entrer une adresse valide <br>";
        }

        /* Checking if the name is valid. */
        if (empty($data['name']) or !preg_match("/^[a-zA-Z]+$/", $data['name'])){
            $this->error .= "Veuillez entrer un nom valide <br>";
        }

        /* Checking if the firstname is empty or if it does not match the regular expression. */
        if (empty($data['firstname']) or !preg_match("/^[a-zA-Z]+$/", $data['firstname'])){
            $this->error .= "Veuillez entrer un prenom valide <br>";
        }

        /* Checking if the password and password2 are the same. */
        if($data['password'] !== $password2){
            $this->error .= "Les mots de passe ne correspondent pas <br>";
        }

        /* Checking if the password is less than 4 characters. */
        if(strlen($data['password']) < 4 ){
            $this->error .= "Le mot de passe doit contenir au moins 4 caractères <br>";
        }

        // check if email already exists
        $sql = "select * from users where email_user = :email limit 1 ";
        $arr['email'] = $data['email'];
        $check = $db->read($sql,$arr);
        if(is_array($check)){
            $this->error .= "Cette adresse existe déjà  <br>";
        }

        if($this->error == ""){
            // save to the database 
            $data['rank'] = "customer";
            $data['url_user'] = $this->get_random_string_max(60);
            $data['date'] = date("Y-m-d H:i:s");
            $data['password'] = hash('sha1', $data['password']);

            /* Inserting the data into the database. */
            $query = "insert into users (url_user,name_user,firstname_user,email_user,phone_user,password_user,date,rank) values (:url_user,:name,:firstname,:email,:phone,:password,:date,:rank)";
            $result = $db->write($query,$data);
            if($result){
                header("location: ". ROOT ."login");
                die;
            }
        }
        $_SESSION['error'] = $this->error;
    }

    // fonction connexion des users
    public function login($POST){
        $data = array();
        $db = Database::getInstance();
        
        $data['email'] = trim($_POST['email']);
        $data['password'] = trim($_POST['password']);

        /* Checking if the email is valid. */
        if (empty($data['email'])){
            $this->error .= "Veuillez entrer une adresse valide <br>";
        }

        /* Checking if the password is less than 4 characters. */
        if(strlen($data['password']) < 4 ){
            $this->error .= "Le mot de passe doit contenir au moins 4 caractères <br>";
        }

        if($this->error == ""){
            // Confirm in the database 
            $data['password'] = hash('sha1', $data['password']);

            // check if email already exists
            $sql = "select * from users where email_user = :email && password_user = :password limit 1 ";
            $result = $db->read($sql,$data);
            show($result);
            if(is_array($result)){
                show($_SESSION);
                $_SESSION['user_url'] = $result[0]->url_user;
                header("location: ". ROOT ."home");
                die;
            }
            $this->error .= "Email ou mot de passe incorrect <br>";
        }
        $_SESSION['error'] = $this->error;
    }

    // Fonction pour trouver un user via son url
    public function get_user($url){
        $db = Database::newInstance();
        $arr = false;

        $arr['url'] = addslashes($url);
        $query = "select * from users where url_user = :url limit 1";
        $result = $db->read($query,$arr);
        
        if(is_array($result)){
            return $result[0];
        }
        return false;
    }

    // Fonction pour trouver tout les clients
    public function get_customers(){
        $db = Database::newInstance();
        $arr = false;

        $arr['rank'] = "customer";
        $query = "select * from users where rank = :rank";
        $result = $db->read($query,$arr);
        
        if(is_array($result)){
            return $result;
        }
        return false;
    }

    // Fonction pour trouver tout les admins
    public function get_admins(){
        $db = Database::newInstance();
        $arr = false;

        $arr['rank'] = "admin";
        $query = "select * from users where rank = :rank";
        $result = $db->read($query,$arr);
        
        if(is_array($result)){
            return $result;
        }
        return false;
    }

    // Fonction pour générer une url propre aux users
    private function get_random_string_max($length){
        $array = array(0,1,2,3,4,5,6,7,8,9,'a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
        $text = "";
        $length = rand(4,$length);
        for($i=0;$i<$length;$i++){
            $random = rand(0,61);
            $text .= $array[$random];
        }
        return $text;
    }

    // Fonction vérification si le user existe dans BDD via son url
    public function check_login($redirect = false, $allowed = array()){
        $db = Database::getInstance();
        
        if(count($allowed) > 0){
            $arr['url'] = isset($_SESSION['user_url']) ? $_SESSION['user_url'] : '';
            $query = "select * from users where url_user = :url limit 1";
            $result = $db->read($query,$arr);

            if(is_array($result)){
                $result = $result[0];
                if(in_array($result->rank, $allowed)){
                    return $result;
                }
            }


            $_SESSION['intended_url'] =  FULL_URL;
            header("location:".ROOT."login");
            die;

        }else{
            if(isset($_SESSION['user_url'])){
                $arr = false;
                $arr['url'] = $_SESSION['user_url'];
                $query = "select * from users where url_user = :url limit 1";
                $result = $db->read($query,$arr);
                if(is_array($result)){
                    return $result[0];
                }
            }
            if($redirect){
                $_SESSION['intended_url'] =  FULL_URL;
                header("location:".ROOT."login");
                die;
            }
        }
        return false;
        }

    // Fonction déconnexion
    public function logout(){
        if(isset($_SESSION['user_url'])){
            unset($_SESSION['user_url']);
            header("location: ". ROOT ."home");
            die;
        }
    }

    // Getter pour d'un user en fonction de l'id
    public function get_one($id){
        $id = (int)$id;
        $DB = Database::newInstance();
        $data = $DB->read("select * from users where id_user = '$id' limit 1 ");
        return $data[0];
    } 

    // Getter pour d'un user en fonction de l'id
    public function forget($POST){
        $db = Database::newInstance();

        $data['email'] = $_POST['email'];
        $data['password'] = $_POST['password'];
        $password2 = $_POST['password2'];

        if (empty($data['email']) ){
            $this->error .= "Adresse email inconnue. Veuillez indiquez une adresse email existante.";
        }

        if(strlen($data['password']) < 4 ){
            $this->error .= "Le mot de passe doit contenir au moins 4 caractères <br>";
        }

        if($data['password'] !== $password2){
            $this->error .= "Les mots de passe ne correspondent pas <br>";
        }

        $sql = "select * from users where email = :email limit 1 ";
        $arr['email'] = $data['email'];
        $check = $db->read($sql,$arr);

        if(is_array($check)){
            if($this->error == ""){
                $data['password'] = hash('sha1', $data['password']);
                $query = "update users set password  = :password where email = :email";
                $result = $db->write($query,$data);
                if($result){
                    $this->mail_sign_up($_POST['email'],$_POST['name'],$_POST['firstname'],$_POST['phone'],$_POST['password']);
                    $this->error .= "Votre mot de passe à bien était modifié";
                    header("location: ". ROOT ."login");
                    die;
                }
            }
        }else{
            $this->error .= "Cette adresse n'est pas reconnu <br>";
        }
        $_SESSION['error'] = $this->error;
    } 

    // Fonction suppression d'un user
    public function delete($id){
        $DB = Database::newInstance();
        $id = (int)$id;
        $query = "delete from users where id_user = '$id' limit 1 ";
        $DB->write("$query");
    } 

    // Edit user account
    public function edit($id,$data){
        $DB = Database::newInstance();
        if($data){
            $arr['name'] = $data['name'];
            $arr['firstname'] = $data['firstname'];
            $arr['email'] = $data['email'];
            $arr['phone'] = $data['phone'];
            $arr['password'] = hash('sha1', $data['password']);;
            
            $query = "update users set name_user = :name, firstname_user = :firstname, email_user = :email, password_user = :password, phone_user = :phone where id_user = '$id' limit 1 ";
            $DB->write($query,$arr);    
        }
    }
}