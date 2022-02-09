<?php

class DealController
{

    // Ajouter une offre-----------------------------------
    public static function addOffer(){
        //Si pas connecté, renvoie à la page connexion
        if(!User::isConnected()){
            header("location:".BASE_PATH."connexion");
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
                    $msg.="Veuillez indiquer l'état du livre";
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

    // Ajouter un souhait -----------------------------------

    public static function addWish(){
        //Si pas connecté, renvoie à la page connexion
        if(!User::isConnected()){
            header("location:".BASE_PATH."connexion");
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
                    $msg.="Veuillez indiquer l'état du livre à partir duquel vous êtes prêt à accepter";
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

    // Afficher la liste des offres
    public static function offersList(){
        // Si pas de compte, redirige sur page connexion
        if(!User::isConnected()){
            header("location:".BASE_PATH."connexion");
            exit;
        }

        $listeOffres = Deal::readDeal([
            'dealing_position'=>'offer',
            'id_user'=>$_SESSION['id_user']
        ]);

        include VIEWS . "deal/readOffers.php";

    }

    // Afficher la liste des demandes
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

        // Créer une liste pour récup une liste de tous les id livre de l'API et les autres infos

        foreach($listeDemandes as $cle=>$demande){
            $listeDemandes[$cle]['etat']=Deal::pointToCondition($demande['point_offers']);


            
        }

        include VIEWS . "deal/readWishs.php";
    }





}

?>