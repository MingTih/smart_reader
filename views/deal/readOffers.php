<?php  

include VIEWS.'inc/header.php'; 

echo "<pre>";
    print_r($_GET);
    // print_r($oneDealArray);
    print_r($offre['id_deal']);
    print_r($offre);
    // print_r($_POST);
echo "</pre>";
?>

<main class="container">
    <h1 class="text-center">Liste de mes offres</h1>

    <?php
        if(empty($listeOffres)){
    ?>
        <div class="noRequest">
            <p>Vous n'avez pas d'offre en cours.</p>
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
            <th scope="col">Modifier</th>
            <th scope="col">Supprimer</th>
            </tr>
        </thead>

        <tbody>
            <?php
                foreach($listeOffres as $offre){

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
                        <td><a href="<?=BASE_PATH.'modifDeal?deal='.$offre['id_deal']?>" class="btn btn-warning">Modifier</a></td>
                        <td><a href="?id=<?=$offre['id_deal']?>&&deleteDeal=ok" class="btn btn-danger">Supprimer</a></td>
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
