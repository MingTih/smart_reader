<?php  

include VIEWS.'inc/header.php'; 

// echo "<pre>";
//     print_r ($infoUser);
//     print_r ($_SESSION);
//     print_r ($_GET);
// echo "</pre>";





?>


<div id="monCompte" class="container">
        <h1 class="m-5">Mes informations</h1>

    <div class="container-fluid">
        <div class="row">
            <ul class="col-7 text-decoration-none">
                <li>Nom : <?=$_SESSION['nom'];?></li>
                <li>Prenom : <?=$_SESSION['prenom'];?></li>
                <li>Pseudo: <?=$_SESSION['pseudo'];?></li>
                <li>Email : <?=$_SESSION['email'];?></li>
                <li>Date de naissance : <?=$_SESSION['birthdate'];?></li>
                <li>Adresse : <?=$_SESSION['address'];?></li>
                <li>Date d'inscription : <?=$_SESSION['inscription_date'];?></li>
                <li>Points : <?=$_SESSION['point'];?></li>
            </ul>
            <div class="photo col-5">
                <img src="<?=COVER."photo_profil/".$_SESSION['readPhoto'][1]?>" alt="photo de profil de <?=$_SESSION['pseudo'];?>"> 
            </div>
        </div>
    </div>

    <a href="http://localhost/smart_reader/public/index.php/modifCompte" class="btn btn-success mx-5">Modifier mon profil</a>

    <!-- <a href="?supprimer=ok" class="btn btn-danger mx-5">Supprimer mon compte</a> -->

    <!-- test pour la fonction déconnexion : à retirer et mettre dans le head -->
    <!-- <a href="?deconnexion=ok" class="btn btn-danger mx-5">Déconnexion</a> -->


</div>







<?php  include VIEWS.'inc/footer.php'; ?>