<?php  

include VIEWS.'inc/header.php'; 

echo "<pre>";
    // print_r($_GET);
    // print_r($infoDeal);
    // print_r($livreInfo);
    // print_r($proposer);
    // print_r($actor);
echo "</pre>";
?>

<main class="container">

    <h1 class="text-center">Détail de <?=$title?></h1>

    <h2><?=$detailLivre["title"]?></h2>

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
                <li>ISBN : <?=$detailLivre["industryIdentifiers"][1]["identifier"]?></li>
                <li>Etat : </li>
                <li>Genre : </li>
                <li>Pages : <?=$detailLivre["pageCount"]?></li>
                <li><?=$userPosition?> : <?=$proposer[0]['pseudo'] ?></li>
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

    <a href="<?=BASE_PATH.$chemin;?>"class="btn btn-danger">Retour</a>
    <a href="<?="?idDeal=".$_GET['idDeal']."&&echange=ok&&idLivre=".$livreInfo['id'];?>" class="btn btn-success">Accepter l'offre</a>


</main>
<?php  include VIEWS.'inc/footer.php'; ?>