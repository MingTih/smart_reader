<?php  

include VIEWS.'inc/header.php'; 

// echo "<pre>";
    // print_r($_GET);
    // print_r($listeAllDemandes);
    // print_r($_SESSION);
    // print_r($_POST);
// echo "</pre>";
?>

<main class="container">
    <h1 class="text-center">Liste de toutes les demandes</h1>

    <?php
        if(empty($listeAllDemandes)){
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
            <th scope="col">Date de la demande</th>
            <th scope="col">Titre du livre</th>
            <th scope="col">Auteur</th>
            <th scope="col">Editeur</th>
            <th scope="col">Etat</th>
            <th scope="col">Point(s)</th>
            <th scope="col">Demandeur</th>
                <th scope="col">Modifier</th>
            </tr>
        </thead>

        <tbody>
            <?php
                foreach($listeAllDemandes as $demande){

            ?>
                <tr>
            
                        <th scope="row"><?=$demande['dealing_date']?></th>
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
                        <td><?=$demande["etat"]?></td>
                        <td><?=$demande["point_offers"]?></td>
                        <td><?=$offre["requester"]?></td>
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
