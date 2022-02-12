<?php  

include VIEWS.'inc/header.php'; 

// echo "<pre>";
//     print_r ($infoUser);
//     print_r ($_SESSION);
//     print_r ($_FILES);
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

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#supprCompte">
        Supprimer mon compte
    </button>

    <!-- Modal -->
    <div class="modal fade" id="supprCompte" tabindex="-1" aria-labelledby="supprCompteLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="supprCompteLabel">Attention!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Vous êtes sur le point de supprimer votre compte, voulez-vous continuer?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <a href="?supprimer=ok" class="btn btn-danger">Continuer</a>
                </div>
            </div>
        </div>
    </div>







<?php  include VIEWS.'inc/footer.php'; ?>