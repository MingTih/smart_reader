<?php

class BookController
{

    public static function booksListing()
    {
    // Récupération de la liste info 
        $listeLivres = Book::allBooks();

        include VIEWS . "book/list.php";
    }

    public static function bookDetail()
    {
    // Récupération de la liste info 
        $livreInfo = Book::oneBooks();
        $detailLivre = $livreInfo["volumeInfo"];

        include VIEWS . "book/detail.php";
    }













}
?>