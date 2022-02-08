<?php

class BookController
{

    public static function booksListing()
    {
    // Récupération de la liste info 
        $listeLivres = Book::allBooks();

    // TEST recherche => à relier avec la view header à la fin? ----------------
        if(!empty($_POST)){
            $recherche=$_POST["search"];
            $booksFound = Book::searchBooks($recherche);
            $booksItem = $booksFound["items"];
        }


        include VIEWS . "book/list.php";
    }

    public static function bookDetail()
    {
    // Récupération détail d'un livre 
        $livreInfo = Book::oneBooks($_GET['id']);
        $detailLivre = $livreInfo["volumeInfo"];

        include VIEWS . "book/detail.php";
    }











}
?>