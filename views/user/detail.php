<?php  

include VIEWS.'inc/header.php'; 

echo "<pre>";
    print_r ($infoUser);
echo "</pre>";

// echo "<pre>";
//     print_r ($_SESSION["pseudo"]);
// echo "</pre>";

// echo "<pre>";
//     print_r ($_GET);
// echo "</pre>";

// Test déconnexion, à retirer et mettre dans le head (pareil pour l.50)
if(isset($_SESSION["pseudo"]) && isset($_GET["deconnexion"])){
    UserController::deconnexion($_GET["deconnexion"]);
}



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
                <img src="<?=COVER."photo_profil/".$_SESSION['readPhoto'][1]?>" alt="photo de profil de <?=$_SESSION['pseudo'];?>"> 
            </div>
        </div>
    </div>

    <a href="http://localhost/smart_reader/public/index.php/modifCompte" class="btn btn-success mx-5">Modifier mon profil</a>

    <a href="#" class="btn btn-danger mx-5">Supprimer mon compte</a>

    <!-- test pour la fonction déconnexion : à retirer et mettre dans le head -->
    <a href="?deconnexion=ok" class="btn btn-danger mx-5">Déconnexion</a>


</div>







<?php  include VIEWS.'inc/footer.php'; ?>