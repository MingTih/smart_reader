<?php  

include VIEWS.'inc/header.php'; 

echo "<pre>";
    // print_r($_GET);
    // print_r($livreInfo);
    print_r($_SESSION);
    print_r($_POST);
echo "</pre>";
?>
<main>
    <div class="main">
        <h1 class='text-center'>Ajouter une offre</h1>

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


        <form action="" method="post">
            <label for="etat" class='d-block'>Etat du livre</label>
            <select name="etat" id="etat">
                <option value="">--Veuillez sélectionner l'état de votre livre--</option>
                <option value="mauvais">Abîmé - 1 point</option>                
                <option value="bon">Bon - 2 points</option>
                <option value="neuf">Neuf - 3 points</option>
                <option value="rare">Rare - 4 points</option>
            </select>

            <input type="submit" class="btn btn-primary">

        </form>


<!-- "<\?=//BASE_PATH?>mesOffres" -->
    </div>

    <?=(isset($msg))?$msg:""?>


</main>

<?php  include VIEWS.'inc/footer.php'; ?>