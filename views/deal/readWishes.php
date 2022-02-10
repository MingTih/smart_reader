<?php  

include VIEWS.'inc/header.php'; 

// echo "<pre>";
    // print_r($_GET);
    // print_r($listeDemandes);
    // print_r($_SESSION);
    // print_r($_POST);
// echo "</pre>";
?>

<main class="container">
    <h1 class="text-center">Liste de mes demandes</h1>

    <?php
        // Si listeDemandes est vide affiche message
        if(empty($listeDemandes)){
    ?>
        <div class="noRequest">
            <p><?=$msg1?></p>
        </div>
    <?php
        //Sinon affiche tableau
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
            <th scope="col">Modifier</th>
            <th scope="col">Supprimer</th>
            </tr>
        </thead>

        <tbody>
            <?php
                foreach($listeDemandes as $demande){

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
                        <td><a href="<?=BASE_PATH.'modifDeal?deal='.$demande['id_deal']?>" class="btn btn-warning">Modifier</a></td>
                        <td><a href="?id=<?=$demande['id_deal']?>&&deleteDeal=ok" class="btn btn-danger">Supprimer</a></td>
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




























<?php  include VIEWS.'inc/footer.php'; ?>