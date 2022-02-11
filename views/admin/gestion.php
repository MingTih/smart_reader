<?php  

include VIEWS.'inc/header.php'; 

// echo "<pre>";
//     print_r ($infoUser);
//     print_r ($_SESSION);
//     print_r ($_GET);
// echo "</pre>";


// Test déconnexion, à retirer et mettre dans le head (pareil pour l.50)
if(isset($_SESSION["pseudo"]) && isset($_GET["deconnexion"])){
    UserController::deconnexion($_GET["deconnexion"]);
}



?>


<div id="gestion" class="container">
        <h1 class="m-5">Gestion</h1>

    <div class="container-fluid">
        <div class="row">
            <ul class="col-7 text-decoration-none">
                <li><a href="<?= BASE_PATH . "listUsers" ?>">Liste des utilisateurs</a></li>
                <li><a href="<?= BASE_PATH . "listeLivres" ?>">Liste des livres</a></li>
                <li><a href="<?= BASE_PATH . "allOffres" ?>">Liste des offres</a></li>
                <li><a href="<?= BASE_PATH . "allSouhaits" ?>">Liste des demandes</a></li><li><a href="<?= BASE_PATH . "historique" ?>">Historique des Echanges</a></li>
            </ul>
        </div>
    </div>

    <!-- test pour la fonction déconnexion : à retirer et mettre dans le head -->
    <a href="?deconnexion=ok" class="btn btn-danger mx-5">Déconnexion</a>


</div>







<?php  include VIEWS.'inc/footer.php'; ?>