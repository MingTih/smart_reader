<?php  

include VIEWS.'inc/header.php'; 

// echo "<pre>";
//     print_r($_GET);
    // print_r($listAllWishes);
// echo "</pre>";
?>

<main class="container">
    <h1 class="text-center">Liste de toutes les demandes</h1>

    <?php
        if(empty($listAllWishes)){
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
                foreach($listAllWishes as $wish){

            ?>
                <tr>
            
                        <th scope="row"><?=$wish['dealing_date']?></th>
                        <td><?=$wish['api']['volumeInfo']['title']?></td>
                        <td>
                            <?php
                            for($i=0; $i<count($wish['api']['volumeInfo']["authors"]); $i++)
                                if($i+1 == count($wish['api']['volumeInfo']["authors"])){
                                    echo $wish['api']['volumeInfo']["authors"][$i]; 
                                }else{
                                    echo $wish['api']['volumeInfo']["authors"][$i] . ","; 
                                }                  
                            ?>
                        </td>
                        <td><?=$wish['api']['volumeInfo']['publisher']?></td>
                        <td><?=$wish["etat"]?></td>
                        <td><?=$wish["point_offers"]?></td>
                        <td><?=$wish['user'][0]["pseudo"]?></td>
                        <td><a href="<?=BASE_PATH."tradeDetail?idLivre=".$wish['id_book']."&&idDeal=".$wish['id_deal']?>" class="btn btn-success">Details</a></td>
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