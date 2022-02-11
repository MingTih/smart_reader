<?php

class AdminController
{

//afficher les utilisateurs
    public static function usersListing(){
        $users = Admin::allUsers();


        //supprimer un user
        if(isset($_GET['deleteUser']) && $_GET['deleteUser'] == "ok"){
            Admin::deleteUser([
                'id_user'=>$_GET['id_user']
            ]);

            // Redirection accueil
            header("location:".BASE_PATH."listUsers");
            exit;
        }

        //passer un user en admin
        if(isset($_GET['adminUser']) && $_GET['adminUser'] == "ok"){
            $infoUser = User::getInfoUser([
                'id_user'=>$_GET['id_user']
            ]);

            if($infoUser["admin"]==0){
                Admin::adminUser([
                    "admin"=>1,
                    'id_user'=>$_GET['id_user']
                ]);
            }else{
                Admin::adminUser([
                    "admin"=>0,
                    'id_user'=>$_GET['id_user']
                ]);
            }


            // Redirection accueil
            header("location:".BASE_PATH."listUsers");
            exit;
        }
        
        //recuperation de la vue
        require VIEWS . "admin/listUsers.php";


    }












}
?>