<?php

class Book extends Db
{

    // Fonction pour afficher tous les livres stockés dans l'API' 
    public static function allBooks()
    {

        // Lecture de tout un fichier dans une chaîne : file_get_content
        // Récupération de tous les livres
        $googleBooksJson = file_get_contents('https://www.googleapis.com/books/v1/volumes?q=nausicaa');
        
        // Traduction d'une chaîne JSON en PHP : json_decode
        $googleBooksPhp = json_decode($googleBooksJson, true);
        
        
            return $googleBooksPhp;
    }

    // Fonction pour afficher le détail d'un livre en particulier
    public static function oneBooks()
    {

        // Récupération d'un livre en particulier
        $OneBookJson = file_get_contents('https://www.googleapis.com/books/v1/volumes/dZFqPgAACAAJ');
        // URL temporaire pour test
        
        $OneBookPhp = json_decode($OneBookJson, true);
               
            return $OneBookPhp;
    }








}








?>
