<?php

class AdminController
{


    public static function usersListing(){
        $users = Admin::allUsers();
        //recuperation de la vue
        require VIEWS . "admin/listUsers.php";
    }

    public static function addUser(){

        if (!empty($_POST)){

            $resultat= Admin::ajouterUnUser([

                    'id_user' => 0,
                    'name' => $_POST['name'],
                    'firstname' => $_POST['firstname'],
                    'pseudo' => $_POST['pseudo'],
                    'pw' => password_hash($_POST["pw"],PASSWORD_DEFAULT),
                    'email' => $_POST['email'],
                    'birthdate' => $_POST['birthdate'],
                    'address' => $_POST['address'],
                    'inscription_date' => null,
                    'point' => $_POST['point'],
                    'photo' => 0,
                    'admin' => $_POST['admin'],
                    'disabled' => $_POST['disabled'],
    
            ]);
        }
        
        require VIEWS . "admin/addUser.php";
    }


    // public function modifierUnuser(){
    //     require 'views/modifuser.views.php';
    // }

    //     include VIEWS . "book/detail.php";
}











?>