<?php  

include VIEWS.'inc/header.php'; 

echo "<pre>";
    // print_r($livreInfo);
    print_r($listeOffres);
    print_r($offre);
echo "</pre>";
?>

<main class="container">
    <h1 class="text-center">Liste de mes offres</h1>

    <?php
        if(empty($listeOffres)){
    ?>
        <div class="noRequest">
            <p><?=$msg1?></p>
        </div>
    <?php
        }else{
    ?>
    
    <table class="table" id="tftable">
        <thead>
            <tr>
                <th scope="col">Date de l'offre'</th>
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
                        <td><?=$offre['api']['volumeInfo']['title']?></td>
                        <td>
                            <?php
                            for($i=0; $i<count($offre['api']['volumeInfo']["authors"]); $i++)
                                if($i+1 == count($offre['api']['volumeInfo']["authors"])){
                                    echo $offre['api']['volumeInfo']["authors"][$i]; 
                                }else{
                                    echo $offre['api']['volumeInfo']["authors"][$i] . ","; 
                                }                  
                            ?>
                        </td>
                        <td><?=$offre['api']['volumeInfo']['publisher']?></td>
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

<?php  include VIEWS.'inc/footer.php'; ?>