<?php  

include VIEWS.'inc/header.php'; 

echo "<pre>";
    print_r ($infoUser);
echo "</pre>";
$id=$_GET["id"];

?>


<div id="monCompte" class="container">
        <h1 class="m-5">Mes informations</h1>

    <div class="container-fluid">
        <div class="row">
            <ul class="col-7 text-decoration-none">
                <li>Nom : <?=$infoUser['name'];?></li>
                <li>Prenom : <?=$infoUser['firstname'];?></li>
                <li>Pseudo: <?=$infoUser['pseudo'];?></li>
                <li>Email : <?=$infoUser['email'];?></li>
                <li>Date de naissance : <?=$infoUser['birthdate'];?></li>
                <li>Adresse : <?=$infoUser['address'];?></li>
                <li>Date d'inscription : <?=$infoUser['inscription_date'];?></li>
                <li>Points : <?=$infoUser['point'];?></li>
            </ul>
            <div class="photo col-5">
                <img src="<?=$infoUser['photo'];?>" alt="photo de profil de <?=$infoUser['pseudo'];?>">
            </div>
        </div>
    </div>

    <a href="http://localhost/smart_reader/public/index.php/modifMonCompte?id=<?=$id?>" class="btn btn-success mx-5">Modifier mon profil</a>

    <a href="#" class="btn btn-danger mx-5">Supprimer mon compte</a>

</div>







<?php  include VIEWS.'inc/footer.php'; ?>