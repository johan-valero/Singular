<?php 

// Gestion de la page profil 
class Profil extends Controller{
    public function index(){
        $User = $this->load_model('User');
        $user_data = $User->check_login();
        
        if(is_object($user_data)){
            $data['user_data'] = $user_data;
        }

        $mode = "";
        if(isset($_GET['edit'])){
            $mode = "edit";
            if(isset($_POST) && count($_POST) > 0){
                $id = $user_data->id_user;
                $data['POST_EDIT'] = $_POST;
                $User->edit($data['POST_EDIT'], $id);
            }
        }
        
        if(isset($_GET['delete'])){
            $mode = "delete";
            $id = $user_data->id_user;
            $user = $User->get_one($id);
            
        }
        
        if(isset($_GET['delete_confirmed'])){
            $mode = "delete_confirmed";
            if(isset($user_data->id_user)){
                $id = $user_data->id_user;
                $User->delete($id);
            }
        } 

        $data['mode'] = $mode;
        $data['page_title'] = "Profil";
        $this->view("profil", $data);
    }
}