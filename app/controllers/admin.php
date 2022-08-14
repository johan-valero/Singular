<?php

// Gestion du panel administrateur
class Admin extends Controller{

    // Fonction qui gère le dashboard de la section Admin
    public function index(){
        $User = $this->load_model('User');
        $user_data = $User->check_login(true, ["admin"]);

        if(is_object($user_data)){
            $data['user_data'] = $user_data;
        }

        $data['page_title'] = "Admin";
        $data['current_page'] = "Tableau de bord";
        $this->view("admin/index", $data);
    }

    // Gestion de l'onglet logements de la section admi
    public function Rooms(){
        $Rooms = $this->load_model("Room");
        $Categories = $this->load_model("Category");
        $User = $this->load_model('User');
        $Accomodation = $this->load_model('Accomodation');
        $Animals = $this->load_model('Animal');
        $Beddings = $this->load_model('Bedding');
        $user_data = $User->check_login(true, ["admin"]);
        
        if(is_object($user_data)){
            $data['user_data'] = $user_data;
        }

        $mode = "read";
        if($mode == "read"){
            $rooms = $Rooms->get_all_admin();
        }

        if(isset($_GET['add'])){
            $mode = "add";
            if(isset($_POST) && count($_POST) > 0 ){
                $check = $Rooms->create($_POST, $_FILES);
            }
        }

        if(isset($_GET['edit'])){
            $mode = "edit";
            $id = $_GET["edit"];
            $rooms = $Rooms->get_one($id);

            if(isset($_POST) && count($_POST) > 0 ){
                $Rooms->edit($_POST,$_FILES, $id);
            }
        }

        if(isset($_GET['delete'])){
            $mode = "delete";
            $id = $_GET["delete"];
            $rooms = $Rooms->get_one($id);
        }
        
        if(isset($_GET['delete_confirmed'])){
            $mode = "delete_confirmed";
            $id = $_GET["delete_confirmed"];
            $rooms = $Rooms->get_one($id);
            if(isset($rooms)){
                if(file_exists($rooms->img_room)){
                    unlink($rooms->img_room);
                }
                if(file_exists($rooms->img2_room)){
                    unlink($rooms->img2_room);
                }
                if(file_exists($rooms->img3_room)){
                    unlink($rooms->img3_room);
                }
            }
            $Rooms->delete($id);
        } 

        $data['mode'] = $mode; 
        $data['animals'] = $Animals->get_all();
        $data['beddings'] = $Beddings->get_all();
        $data['categories'] = $Categories->get_all();
        $data['accomodations'] = $Accomodation->get_all();
        $data['rooms'] = $rooms;
        $data['current_page'] = "Logements";
        $data['page_title'] = "Admin | Logements";      
        $this->view("admin/rooms", $data);
    }

    // Gestion de l'onglet catégorie de la section admin
    public function Categories(){
        $Categories = $this->load_model("Category");
        $User = $this->load_model('User');
        $user_data = $User->check_login(true, ["admin"]);
        
        if(is_object($user_data)){
            $data['user_data'] = $user_data;
        }

        $mode = "read";
        if($mode == "read"){
            $categories = $Categories->get_all();
        }

        if(isset($_GET['add'])){
            $mode = "add";
            if(isset($_POST) && count($_POST) > 0 ){
                $check = $Categories->create($_POST, $_FILES);
            }
        }

        if(isset($_GET['edit'])){
            $mode = "edit";
            $id = $_GET["edit"];
            $categories = $Categories->get_one($id);
            
            if(empty($_FILES['image']['name'])){
                $data['file'] = $categories->img_category;
            }else{
                $data['file'] = $_FILES;
            }

            if(isset($_POST) && count($_POST) > 0 ){
                $Categories->edit($_POST,$data['file'], $id);
            }
        }

        if(isset($_GET['delete'])){
            $mode = "delete";
            $id = $_GET["delete"];
            $categories = $Categories->get_one($id);
        }
        
        if(isset($_GET['delete_confirmed'])){
            $mode = "delete_confirmed";
            $id = $_GET["delete_confirmed"];
            $categories = $Categories->get_one($id);
            if(isset($categories)){
                unlink($categories->img_category);
            }
            $Categories->delete($id);
        } 

        $data['mode'] = $mode;
        $data['categories'] = $categories;
        $data['current_page'] = "Catégories";
        $data['page_title'] = "Admin | Catégories";
        $this->view("admin/categories", $data);
    }

    // Gestion de l'onglet litterie de la section admin
    public function Beddings(){
        $Beddings = $this->load_model("Bedding");
        $User = $this->load_model('User');
        $user_data = $User->check_login(true, ["admin"]);
        
        if(is_object($user_data)){
            $data['user_data'] = $user_data;
        }
        
        $mode = "read";
        if($mode == "read"){
            $bedding = $Beddings->get_all();
        }
        
        if(isset($_GET['add'])){
            $mode = "add";
            if(isset($_POST) && count($_POST) > 0 ){
                $data['POST'] = $_POST;
                $check = $Beddings->create($data['POST']);
                if($_SESSION['error'] == ""){
                    redirect("admin/beddings");
                }
            }
        }
        
        if(isset($_GET['edit'])){
            $mode = "edit";
            $id = $_GET["edit"];
            $bedding = $Beddings->get_one($id);

            if(isset($_POST) && count($_POST) > 0){
                $data['POST_EDIT'] = $_POST;
                $Beddings->edit($data['POST_EDIT'], $id);
                redirect("admin/beddings");
            }
        }
        
        if(isset($_GET['delete'])){
            $mode = "delete";
            $id = $_GET["delete"];
            $bedding = $Beddings->get_one($id);
        }

        if(isset($_GET['delete_confirmed'])){
            $mode = "delete_confirmed";
            $id = $_GET["delete_confirmed"];
            $Beddings->delete($id);
        } 

        $data['mode'] = $mode;
        $data['beddings'] = $bedding;
        $data['current_page'] = "Litteries";
        $data['page_title'] = "Admin | Litteries";
        $this->view("admin/beddings", $data);
    }

    // Gestion de l'onglet aménagement de la section admin
    public function Accomodations(){
        $Accomodations = $this->load_model("Accomodation");
        $User = $this->load_model('User');
        $user_data = $User->check_login(true, ["admin"]);
        
        if(is_object($user_data)){
            $data['user_data'] = $user_data;
        }
        
        $mode = "read";
        if($mode == "read"){
            $accomodation = $Accomodations->get_all();
        }
        
        if(isset($_GET['add'])){
            $mode = "add";
            if(isset($_POST) && count($_POST) > 0 ){
                $data['POST'] = $_POST;
                $check = $Accomodations->create($data['POST']);
                if($_SESSION['error'] == ""){
                    redirect("admin/accomodations");
                }
            }
        }
        
        if(isset($_GET['edit'])){
            $mode = "edit";
            $id = $_GET["edit"];
            $accomodation = $Accomodations->get_one($id);

            if(isset($_POST) && count($_POST) > 0){
                $data['POST_EDIT'] = $_POST;
                $Accomodations->edit($data['POST_EDIT'], $id);
                redirect("admin/accomodations");
            }
        }
        
        if(isset($_GET['delete'])){
            $mode = "delete";
            $id = $_GET["delete"];
            $accomodation = $Accomodations->get_one($id);
        }

        if(isset($_GET['delete_confirmed'])){
            $mode = "delete_confirmed";
            $id = $_GET["delete_confirmed"];
            $Accomodations->delete($id);
        } 

        $data['mode'] = $mode;
        $data['accomodations'] = $accomodation;
        $data['current_page'] = "Aménagements";
        $data['page_title'] = "Admin | Aménagements";
        $this->view("admin/accomodations", $data);
    }

    // Gestion de l'onglet messages de la section admin
    public function Messages(){
        $Messages = $this->load_model("Message");
        $User = $this->load_model('User');
        $user_data = $User->check_login(true, ["admin"]);
        
        if(is_object($user_data)){
            $data['user_data'] = $user_data;
        }
        
        $mode = "read";
        if($mode == "read"){
            $messages = $Messages->get_all();
        }

        if(isset($_GET['delete'])){
            $mode = "delete";
            $id = $_GET["delete"];
            $messages = $Messages->get_one($id);
        }

        if(isset($_GET['delete_confirmed'])){
            $mode = "delete_confirmed";
            $id = $_GET["delete_confirmed"];
            $Messages->delete($id);
        } 

        $data['mode'] = $mode;
        $data['messages'] = $messages;
        $data['current_page'] = "Messages";
        $data['page_title'] = "Admin | Messages";
        $this->view("admin/messages", $data);
    }

    // Gestion de l'onglet client de la section admin
    public function Clients(){
        $User = $this->load_model('User');
        $user_data = $User->check_login(true, ["admin"]);
        
        if(is_object($user_data)){
            $data['user_data'] = $user_data;
        }
        
        $mode = "read";
        if($mode == "read"){
            $client = $User->get_all();
        }

        $data['mode'] = $mode;
        $data['clients'] = $client;
        $data['current_page'] = "Clients";
        $data['page_title'] = "Admin | Clients";
        $this->view("admin/clients", $data);
    }

    // Gestion de l'onglet paramètre/partenaires de la section admin
    public function Partners(){
        $Partners = $this->load_model('Partner');
        $User = $this->load_model('User');
        $user_data = $User->check_login(true, ["admin"]);
        
        if(is_object($user_data)){
            $data['user_data'] = $user_data;
        }
        
        $mode = "read";
        if($mode == "read"){
            $partners = $Partners->get_all();
        }

        if(isset($_GET['add'])){
            $mode = "add";
            if(isset($_POST) && count($_POST) > 0 ){
                $check = $Partners->create($_POST, $_FILES);
            }
        }

        if(isset($_GET['edit'])){
            $mode = "edit";
            $id = $_GET["edit"];
            $partners = $Partners->get_one($id);
            
            if(empty($_FILES['image']['name'])){
                $data['file'] = $partners->img_partner;
            }else{
                $data['file'] = $_FILES;
            }

            if(isset($_POST) && count($_POST) > 0 ){
                $Partners->edit($_POST,$data['file'], $id);
            }
        }

        if(isset($_GET['delete'])){
            $mode = "delete";
            $id = $_GET["delete"];
            $partners = $Partners->get_one($id);
        }

        if(isset($_GET['delete_confirmed'])){
            $mode = "delete_confirmed";
            $id = $_GET["delete_confirmed"];
            $partners = $Partners->get_one($id);
            if(isset($partners)){
                unlink($partners->img_partner);
            }
            $Partners->delete($id);
        } 

        $data['mode'] = $mode;
        $data['partners'] = $partners;
        $data['current_page'] = "Partenaires";
        $data['page_title'] = "Admin | Partenaire";
        $this->view("admin/partners", $data);
    }

    // Gestion de l'onglet paramètre/carousel de la section admin
    public function Sliders(){
        $Sliders = $this->load_model('Slider');
        $User = $this->load_model('User');
        $user_data = $User->check_login(true, ["admin"]);
        
        if(is_object($user_data)){
            $data['user_data'] = $user_data;
        }
        
        $mode = "read";
        if($mode == "read"){
            $sliders = $Sliders->get_all();
        }

        if(isset($_GET['add'])){
            $mode = "add";
            if(isset($_POST) && count($_POST) > 0 ){
                $check = $Sliders->create($_POST, $_FILES);
            }
        }

        if(isset($_GET['edit'])){
            $mode = "edit";
            $id = $_GET["edit"];
            $sliders = $Sliders->get_one($id);
            
            if(empty($_FILES['image']['name'])){
                $data['file'] = $sliders->img;
            }else{
                $data['file'] = $_FILES;
            }

            if(isset($_POST) && count($_POST) > 0 ){
                $Sliders->edit($_POST,$data['file'], $id);
            }
        }

        if(isset($_GET['delete'])){
            $mode = "delete";
            $id = $_GET["delete"];
            $sliders = $Sliders->get_one($id);
        }

        if(isset($_GET['delete_confirmed'])){
            $mode = "delete_confirmed";
            $id = $_GET["delete_confirmed"];
            if(isset($sliders)){
                unlink($sliders[0]->img);
            }
            $Sliders->delete($id);
        } 

        $data['mode'] = $mode;
        $data['sliders'] = $sliders;
        $data['current_page'] = "Carousel";
        $data['page_title'] = "Admin | Carousel";
        $this->view("admin/sliders", $data);
    }

    // Gestion de l'onglet paramètre/réseaux de la section admin
    public function Socials(){
        $Socials = $this->load_model('Social');
        $User = $this->load_model('User');
        $user_data = $User->check_login(true, ["admin"]);
        
        if(is_object($user_data)){
            $data['user_data'] = $user_data;
        }
        
        if(count($_POST) > 0 ){
            $Socials->edit($_POST);
        }
        $socials = $Socials->get_all();

        $data['socials'] = $socials;
        $data['current_page'] = "Réseaux";
        $data['page_title'] = "Admin | Réseaux";
        $this->view("admin/socials", $data);
    }
}