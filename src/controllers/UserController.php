<?php

class UserController
{

    public static function compteDetail()
    {
        $infoUser = User::getInfoUser();

        include VIEWS . "user/detail.php";


    }










}


?>