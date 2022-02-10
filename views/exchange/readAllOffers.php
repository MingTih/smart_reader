<?php  

include VIEWS.'inc/header.php'; 

// echo "<pre>";
//     print_r($_GET);
//     print_r($listeAllOffres);
//     print_r($offre);
// echo "</pre>";
?>

<main class="container">
    <h1 class="text-center">Liste de toutes les offres</h1>

    <?php
        if(empty($listeAllOffres)){
    ?>
        <div class="noRequest">
            <p><?=$msg1?></p>
        </div>
    <?php
        }else{
    ?>
    
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Date de l'offre</th>
                <th scope="col">Titre du livre</th>
                <th scope="col">Auteur</th>
                <th scope="col">Editeur</th>
                <th scope="col">Etat</th>
                <th scope="col">Point(s)</th>
                <th scope="col">Possesseur</th>
                <th scope="col">Modifier</th>
            </tr>
        </thead>

        <tbody>
            <?php
                foreach($listeAllOffres as $offre){

            ?>
                <tr>
            
                        <th scope="row"><?=$offre['dealing_date']?></th>
                        <td><?=$detailLivre['title']?></td>
                        <td>
                            <?php
                            for($i=0; $i<count($detailLivre["authors"]); $i++)
                                if($i+1 == count($detailLivre["authors"])){
                                    echo $detailLivre["authors"][$i]; 
                                }else{
                                    echo $detailLivre["authors"][$i] . ","; 
                                }                  
                            ?>
                        </td>
                        <td><?=$detailLivre['publisher']?></td>
                        <td><?=$offre["etat"]?></td>
                        <td><?=$offre["point_offers"]?></td>
                        <td><?=$offre["owner"]?></td>
                        <td><a href="<?=BASE_PATH."detailOffre"?>">Details</a></td>
                </tr>
            <?php
                }
            ?>
        </tbody>
    </table>
    <?php
        }
    ?>
</main>
