<?php

class BookController
{

    public static function booksListing()
    {
    // Récupération de la liste info 
        $listeLivres = Book::allBooks();

        include VIEWS . "book/list.php";
    }













}
?>