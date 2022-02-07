<?php  

include VIEWS.'inc/header.php';

// echo "<pre>";
//     print_r($listeLivres);
// echo "</pre>";

echo "<pre>";
    print_r($_POST);
echo "</pre>";

// if(!empty($_POST)){
//     echo "<pre>";
//         print_r($booksItem);
//     echo "</pre>";
// }
?>

<!-- test recherche = A enlever et mettre dans la barre de navigation à la fin-->
<form action="" method="post">
    <label for="recherche_livre">Chercher un livre</label>
    <input type="search" id="recherche_livre" name="search" aria-label="Chercher un livre dans le site">

    <input type="submit" class="btn btn-success">
</form>

<!-- Affichage livres -->

<?php
if(!empty($_POST)){
    foreach($booksItem as $book){
?>

    <div class="card" style="width: 18rem;">
        <?php
            if(!isset($book["volumeInfo"]["imageLinks"])){
        ?>
            <img class="card-img-top" src="<?=COVER?>couverture/couverture_non_dispo.png" alt="couverture non disponible">
        <?php
            }else{
        ?>
            <img class="card-img-top" src="<?=$book["volumeInfo"]["imageLinks"]["thumbnail"];?>" alt="couverture de <?=$book["volumeInfo"]["title"];?>">
        <?php
            }
        ?>
        <div class="card-body">
            <h5 class="card-title"><?=$book["volumeInfo"]["title"]?></h5>
            <p class="card-text">
                <?php
                    if(!isset($book["volumeInfo"]["authors"])){
                ?>
                    Auteur non connu
                <?php
                    }else{
        
                        for($i=0; $i<count($book["volumeInfo"]["authors"]); $i++){
                            if($i+1 == count($book["volumeInfo"]["authors"])){
                                echo $book["volumeInfo"]["authors"][$i]; 
                            }else{
                                echo $book["volumeInfo"]["authors"][$i] . ","; 
                            }   
                        }         
                    }      
                ?>
            </p>
            <a href="book/detail.php" class="btn btn-primary">Détails</a>
        </div>
    </div>

<?php
    }
}
?>















<?php  include VIEWS.'inc/footer.php'; ?>