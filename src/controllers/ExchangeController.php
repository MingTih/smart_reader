<?php

class ExchangeController 
{
// Afficher toutes les offres --------------------------------
    public static function allOffersList(){
        $msg1 = "";

        $listAllOffres = Deal::readAllDeals([
            'dealing_position'=>'offer'
        ]);

        if(empty($listAllOffres)){
            $msg1 = "Aucune offre disponible";
        }

        foreach($listAllOffres as $cle=>$offre){
            $listAllOffres[$cle]['etat']=Deal::pointToCondition($offre['point_offers']);

            $listAllOffres[$cle]['api'] = Book::oneBook($listAllOffres[$cle]["id_book"]);

        //Recup info user avec id
            $listAllOffres[$cle]['user'] = Exchange::getUserInfo([
                'id_user' => $listAllOffres[$cle]['id_user']
            ]);

        }


        include VIEWS . "exchange/readAllOffers.php";
    }

    // Afficher toutes les demandes --------------------------------
    public static function allWishesList(){

        $msg1 = "";

        $listAllWishes = Deal::readAllDeals([
            'dealing_position'=>'request'
        ]);

        if(empty($listAllWishes)){
            $msg1 = "Aucune demande disponible";
        }

        foreach($listAllWishes as $cle=>$wish){
            $listAllWishes[$cle]['etat']=Deal::pointToCondition($wish['point_offers']);

            $listAllWishes[$cle]['api'] = Book::oneBook($listAllWishes[$cle]["id_book"]);

        //Recup info user avec id
            $listAllWishes[$cle]['user'] = Exchange::getUserInfo([
                'id_user' => $listAllWishes[$cle]['id_user']
            ]);

        }
    
    
        include VIEWS . "exchange/readAllWishes.php";
    }

    // Afficher les détails de l'échange, avec nom du pseudo et bouton pour accepter l'échange (delete l'offre au moment de l'acceptation dans dealing, ajout ligne dans exchange, calcul des points)
    public static function tradeDetail(){

        //Récupération données dealing pour pseudo
        $infoDeal = Deal::readOneDeal([
            'id_deal'=>$_GET['idDeal']
        ]);


        //Définition du $title en fonction du deal
        if($infoDeal[0]["dealing_position"]=="offer"){
            $title = "l'offre";
            $userPosition = "Offreur";
            $chemin = "allOffres";
        }else{
            $title = "la demande";
            $userPosition = "Demandeur";
            $chemin = "allSouhaits";
        }

        //Récupération données User grace à dealing  
        $infoUser = Exchange::getUserInfo([
            "id_user"=>$infoDeal[0]['id_user']
        ]);

        //Récupération données livre API
        $livreInfo = Book::oneBook($_GET['idLivre']);
        $detailLivre = $livreInfo["volumeInfo"];

        //Insertion données échange dans exchange

        //Delete ligne dans dealing 




        include VIEWS . "exchange/exchangePlace.php";
    }

    // public static function myTradesList(){





    //     include VIEWS . "exchange/historique.php";
    // }


    // public static function tradeSummury(){





    //     include VIEWS . "exchange/historiqueDetail.php";
    // }
















}


?>