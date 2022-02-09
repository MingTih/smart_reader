<?php  

include VIEWS.'inc/header.php'; 

echo "<pre>";
    // print_r($_GET);
    print_r($listeDemandes);
    // print_r($_SESSION);
    // print_r($_POST);
echo "</pre>";
?>

<main class="container">
    <h1 class="text-center">Liste de mes demandes</h1>

    <table class="table">
        <thead>
            <tr>
            <th scope="col">Date de la demande</th>
            <th scope="col">Titre du livre</th>
            <th scope="col">Auteur</th>
            <th scope="col">Editeur</th>
            <th scope="col">Etat</th>
            <th scope="col">Modifier</th>
            <th scope="col">Supprimer</th>
            </tr>
        </thead>

        <tbody>
            <?php
                foreach($listeDemandes as $demande){
                    $id=$demande['id_book'];
                    $livreInfo = Book::oneBook($id);
                    $etat = Deal::PointToCondition($demande['point_offers']);
                    $detailLivre = $livreInfo["volumeInfo"];         

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
                        <td><?=$etat?></td>
                        <td><a href="" class="btn btn-warning">Modifier</a></td>
                        <td><a href="" class="btn btn-danger">Supprimer</a></td>
                </tr>
            <?php
                }
            ?>
        </tbody>
    </table>

</main>




























<?php  include VIEWS.'inc/footer.php'; ?>