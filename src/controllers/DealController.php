<?php

class DealController
{

    // Ajouter une offre------------------------------------------------------------
    public static function addOffer(){
        //Si pas connecté, renvoie à la page connexion
        if(!User::isConnected()){
            header("location:".BASE_PATH."connexion");
        }

        //Si pas de GET, renvoie à la liste d'offres
        if(empty($_GET)){
            header("location:".BASE_PATH."mesOffres");
            exit;
        }

        //SI GET n'est pas vide
        if(!empty($_GET)){

            //Crée la variable qui stocke les infos d'un seul livre
            $livreInfo = Book::oneBook($_GET['id']);
            $detailLivre = $livreInfo["volumeInfo"];

            //Si POST n'est pas vide
            if(!empty($_POST)){
                $msg="";
                // Attribue des points en fonction de l'état du livre
                if($_POST['etat']==""){
                    $msg.="Veuillez renseigner l'état du livre";
                    echo $msg;
                }

                if($_POST["etat"]!=""){
                    if($_POST['etat']=="mauvais"){
                        $point = 1;
                        echo $point;
                    }
                    
                    if($_POST['etat']=="bon"){
                        $point = 2;
                        echo $point;
                    }
                    
                    if($_POST['etat']=="neuf"){
                        $point = 3;
                        echo $point;
                    }
                                
                    if($_POST['etat']=="rare"){
                        $point = 3;
                        echo $point;
                    }

                    Deal::addDeal([
                        'id_deal' =>null,
                        'id_user' => $_SESSION["id_user"],
                        'id_book' => $_GET["id"],
                        'dealing_position' => "offer",
                        'point_offers' => $point,
                        'point_deal' =>null,
                        'dealing_date' =>null
                    ]);
                    header ("location:".BASE_PATH."mesOffres");
                    exit;
                }
            }
        }
        include VIEWS . "deal/addOffre.php";
    }

    // Ajouter un souhait ------------------------------------------------------------

    public static function addWish(){
        //Si pas connecté, renvoie à la page connexion
        if(!User::isConnected()){
            header("location:".BASE_PATH."connexion");
            exit;
        }

        //Si pas de GET, renvoie à la liste de demandes
        if(empty($_GET)){
            header("location:".BASE_PATH."mesSouhaits");
            exit;
        }

        //SI GET n'est pas vide
        if(!empty($_GET)){

            //Crée la variable qui stocke les infos d'un seul livre
            $livreInfo = Book::oneBook($_GET['id']);
            $detailLivre = $livreInfo["volumeInfo"];

            //Si POST n'est pas vide
            if(!empty($_POST)){
                $msg="";
                // Attribue des points en fonction de l'état du livre
                if($_POST['etat']==""){
                    $msg.="Veuillez indiquer l'état du livre à partir duquel vous êtes prêt à effetuer un échange";
                    echo $msg;
                }

                if($_POST["etat"]!=""){
                    if($_POST['etat']=="mauvais"){
                        $point = 1;
                        echo $point;
                    }
                    
                    if($_POST['etat']=="bon"){
                        $point = 2;
                        echo $point;
                    }
                    
                    if($_POST['etat']=="neuf"){
                        $point = 3;
                        echo $point;
                    }
                                
                    if($_POST['etat']=="rare"){
                        $point = 3;
                        echo $point;
                    }

                    Deal::addDeal([
                        'id_deal' =>null,
                        'id_user' => $_SESSION["id_user"],
                        'id_book' => $_GET["id"],
                        'dealing_position' => "request",
                        'point_offers' => $point,
                        'point_deal' =>null,
                        'dealing_date' =>null
                    ]);
                    header ("location:".BASE_PATH."mesSouhaits");
                    exit;

                }
            }
        }
        include VIEWS . "deal/addWish.php";
    }

    // Afficher la liste des offres------------------------------------------------------------
    public static function offersList(){
        // Si pas de compte, redirige sur page connexion
        if(!User::isConnected()){
            header("location:".BASE_PATH."connexion");
            exit;
        }

        // Création d'une liste qui va regrouper toutes lignes de la table dealing
        $listeOffres = Deal::readDeal([
            'dealing_position'=>'offer',
            'id_user'=>$_SESSION['id_user']
        ]);
        
        // Création d'un nouvel index dans la listeOffres et récupération des infos du livre grâce à l'id enregistré en BDD
        foreach($listeOffres as $cle=>$offre){
            // De base, listeDemandes affiche une liste avec les données récup dans la base de données.
                // Ici, on va lui ajouter un index "etat" qui ne vient pas de la bdd
            $listeOffres[$cle]['etat']=Deal::pointToCondition($offre['point_offers']);

            // Récupération des info du livre grâce à $offre["id_book"]
            $livreInfo = Book::oneBook($offre["id_book"]);
            $detailLivre = $livreInfo["volumeInfo"];         
        }

        include VIEWS . "deal/readOffers.php";

    }

    // Afficher la liste des demandes------------------------------------------------------------
    public static function wishList(){
        // Si pas de compte, redirige sur page connexion
        if(!User::isConnected()){
            header("location:".BASE_PATH."connexion");
            exit;
        }
        
        $listeDemandes = Deal::readDeal([
            'dealing_position'=>'request',
            'id_user'=>$_SESSION['id_user']
        ]);

        // Création d'un nouvel index dans la listeOffres et récupération des infos du livre grâce à l'id enregistré en BDD
        foreach($listeDemandes as $cle=>$demande){
            $listeDemandes[$cle]['etat']=Deal::pointToCondition($demande['point_offers']);

            $livreInfo = Book::oneBook($demande["id_book"]);
            $detailLivre = $livreInfo["volumeInfo"];         

        }

        include VIEWS . "deal/readWishs.php";
    }

    // Modifier les points d'un deal------------------------------------------------------------------------------------------
        public static function modifDeal(){
            if(!User::isConnected()){
                header("location:".BASE_PATH."connexion");
            }
            
            //Si pas de GET, renvoie à monCompte
            if(empty($_GET)){
                header("location:".BASE_PATH."monCompte");
                exit;
            }

            if(isset($_GET) && !empty($_GET)){
               
                $listeDeals = Deal::readOneDeal([
                    'id_deal'=>$_GET['deal']
                ]);   

                // Création variable pour le titre de la page
                foreach($listeDeals as $cle=>$deal){
                    if($deal['dealing_position']=="offer"){
                        $title = "mon offre";
                    }else{
                        $title = "ma demande";
                    }

                // Récupération des données du livre
                    $livreInfo = Book::oneBook($deal["id_book"]);
                    $detailLivre = $livreInfo["volumeInfo"]; 
                
                // Récupération de $etat:
                    $point = $deal["point_offers"];
                }

                //Modification du nombre de point dans la BDD
                    Deal::updateDeal([
                        'point_offers'=>$point,
                        'id_deal'=>$deal["id_deal"]
                    ]);


            }
            include VIEWS . "deal/modifDeal.php";


        }
    
    





}

?>