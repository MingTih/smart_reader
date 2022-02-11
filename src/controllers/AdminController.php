<?php

class AdminController
{

//afficher les utilisateurs
    public static function usersListing(){
        $users = Admin::allUsers();
        //recuperation de la vue
        require VIEWS . "admin/listUsers.php";
    }

        // fonction de suppression d'un utilisateur
        public function deleteUser($id_user){
            $delete->deleteUserDb($id_user);
    
            $_SESSION['alert'] = [
                "type" => "success",
                "msg" =>  "suppression effectuée"
            ];
    
            header('Location: '.URL."jeux");
        }












}
?>