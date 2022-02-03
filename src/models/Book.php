<?php

class Book extends Db
{

    // Fonction pour afficher tous les livres stockés dans la variable 
    public static function allBooks()
        {

        // Lecture de tout un fichier dans une chaîne file_get_content

        $googleBooksJson = file_get_contents('https://www.googleapis.com/books/v1/volumes?q=nausicaa');
        
        // Traduction d'une chaîne JSON en PHP json_decode
        $googleBooksPhp = json_decode($googleBooksJson, true);
        
        
            return $googleBooksPhp;
        



        }








}








?>
