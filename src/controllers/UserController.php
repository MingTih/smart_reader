<?php

class UserController
{

    public static function compteDetail()
    {
    // Récupération des info d'un seul user
        $infoUser = User::getInfoUser();

        include VIEWS . "user/detail.php";


    }

    public static function connexion()
    {
    // Vérifier la connexion de l'utilisateur
        $infoConnexion = User::connexionVerif();

        include VIEWS . "user/connexion.php";
    }









}




?>