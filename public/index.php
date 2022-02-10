<?php

session_start();

require_once(__DIR__ . '/../config/params.php');
require_once(__DIR__ . '/../config/config.php');

?>


<body class="bg">
    
                                    <!-- HEADER -->

        <!-- --------------------------------LOG0--------------------------------------------- -->
    <header id="header">        
        <div class="logo-banniere d-flex">
                <div class="logo">
                        <img src="../asset/css/Images/logoFinalPlus3Px.png" width="150px" height="150 px" alt="logo_de_la_marque">
                </div>

                 <!--------------------------------- BANNIERE--------------------------------------- -->   
                <div class="banniere d-flex">    
                    <h1 class="titreSite">Le site d'échange de livres d'occasion</h1>
                </div>
                <!------------------------------------ Mascotte img----------------------- -->
                
        </div>
        <div class="mascotte4 d-flex">
            <img src="../asset/css/images/mascotte4.png" width="150px" height="150px" alt="image_mascotte_hibou">
        </div>
        
    </header>
<!-- -----------------------------------------Navbar-------------------------------------------------- -->
        
        </div> 
        <nav class="navbar navbar-expand-lg navbar-light bg-light colornav">
            <div class="container-fluid">
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active a-btn" aria-current="page" href="#">S'inscrire</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link a-btn" href="#">Se connecter</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link a-btn" href="#">Nous contacter</a>
                  </li>
                  
                </ul>
                <form class="d-flex">
                  <input class="form-control me-2" type="search" placeholder="Livre, Auteur,ISBN" aria-label="Rechercher">
                  <button class="btn btn-outline-success btncolor" type="submit">Rechercher</button>
                </form>
              </div>
            </div>
            
            
          </nav>

<!----------------------------- slider carroussel bootstrap ---------------------------->
        <container class="slider">

                
                <div id="carouselExampleSlidesOnly" class="carousel slide mx-auto col-8 " data-bs-ride="carousel">
                    <div class="titreSlider"><h1 >"Lire c'est toucher du doigt les limites de son imagination..."</h1></div>
                        <div class="carousel-inner">
                        <div class="carousel-item active">
                        <img src="../asset/css/images/livre1slider.jpeg" class="d-block w-100" alt="image livre ouvert histoire">
                    </div>
                    <div class="carousel-item">
                        <img src="../asset/css/images/livre3slider.jpeg" class="d-block w-100" alt="image livre ouvert imagination">
                    </div>
                    <div class="carousel-item">
                        <img src="../asset/css/images/livre8slider.jpeg" class="d-block w-100" height=""alt="image livre ouvert histoire">
                    </div>
                </div>
            </div>

        </container>

                                <!---------------------------- COMMENT CA MARCHE H2------------------------->
                                <p class="resumeSite">Facile et économique et écologigue, l'échange de livres d'occasion vous permet de lire de nouveaux ouvrages toute l'année. Inscrivez-vous gratuitement et ajoutez vos livres à notre catalogue composé de milliers d'ouvrages</p>
                                <H2 id="h2ccm">COMMENT ÇA FONCTIONNE?</H2>
         <container class="boites d-flex" >

             <div>
                 <img src="../asset/css/images/mascotte6.png" width="150px" height="150px"alt=" image-mascotte-hibou">
             </div>
             <div class="boite1 d-flex">
                 <p class="p1">"Bonjour, je te propose un bon plan pour lire toute l'année sans rien débourser</p>
             </div>

             <div>
                <img src="../asset/css/images/mascotte4.png" width="150px" height="150px"alt="image-mascotte-hibou">
            </div>
             <div class="boite2 d-flex">
                 <p class="p2">Echange tes livres contre des points et choisis d'autres livres</p>
             </div>
             <div>
                <img src="../asset/css/images/mascotte8.png" width="150px" height="150px"alt=" image-mascotte-hibou">
            </div>
             <div class="boite3 d-flex">
                <p>Pour cela tu peux simplement proposer tes livres en écrivant le code ISBN qui se trouve derrière ton livre"</p>
             </div>
             
             
         </container> 
