<?php

class AppController
{

    public static function index()
    {
        include VIEWS . "app/home.php";
    }

    public static function contact(){
        include VIEWS . "app/contact.php";
    }

}