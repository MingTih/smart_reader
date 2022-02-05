<?php  

include VIEWS.'inc/header.php'; 

echo "<pre>";
    print_r ($detailLivre);
echo "</pre>";

?>


<div id="monCompte" class="container">
        <h1 class="m-5"><?=$detailLivre["title"]?></h1>

    <div class="container-fluid">
        <div class="row">
            <ul class="col-7 text-decoration-none">
                <li>Titre : <?=$detailLivre["title"]?></li>
                <li>Auteur : 
                    <?php
                    for($i=0; $i<count($detailLivre["authors"]); $i++)
                        if($i+1 == count($detailLivre["authors"])){
                            echo $detailLivre["authors"][$i]; 
                        }else{
                            echo $detailLivre["authors"][$i] . ","; 
                        }                  
                    ?>
                </li>
                <li>Editeur: <?=$detailLivre["publisher"]?></li>
                <li>Date de parution : <?=$detailLivre["publishedDate"]?></li>
                <li>Résumé : <?=$detailLivre["description"]?></li>
                <li>ISBN : <?=$detailLivre["industryIdentifiers"][1]["identifier"]?></li>
                <li>Etat : </li>
                <li>Genre : </li>
                <li>Pages : <?=$detailLivre["pageCount"]?></li>
            </ul>
            <div class="photo col-5">
                <?php
                    if(!isset($detailLivre["imageLinks"])){
                ?>
                    <img class="w-100" src="<?=COVER?>couverture/couverture_non_dispo.png" alt="couverture non disponible">
                <?php
                    }else{
                ?>
                    <img src="<?=$detailLivre["imageLinks"]["thumbnail"];?>" alt="couverture de <?=$detailLivre["title"];?>">
                <?php
                    }
                ?>
            </div>
        </div>
    </div>

    <a href="<?=BASE_PATH?>listeLivres" class="btn btn-success mx-5">Retour à la liste des livres</a>


</div>







<?php  include VIEWS.'inc/footer.php'; ?>