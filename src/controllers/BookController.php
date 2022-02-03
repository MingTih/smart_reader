<?php

class BookController{

    public static function booksListing()
    {

        $listeLivres = Book::allBooks();

        include VIEWS . "book/list.php";
    }













}
?>