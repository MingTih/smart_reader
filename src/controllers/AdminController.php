<?php

class AdminController
{


    public static function usersListing(){
        $users = Admin::allUsers();
        //recuperation de la vue
        require VIEWS . "admin/listUsers.php";
    }

    public static function ajouterUnUser(){
        require VIEWS . "admin/addUsers.php";
    }

    // public function modifierUnuser(){
    //     require 'views/modifuser.views.php';
    // }

    //     include VIEWS . "book/detail.php";
}












?>