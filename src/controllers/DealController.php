<?php

class DealController
{
    public static function addOffer(){
        //SI POST n'est pas vide
        if(!empty($_POST)){

            if($_POST['etat']==""){
                $msg.="Veuillez indiquer l'état du livre";
            }

            if($_POST['etat']=="mauvais"){
                $point = 1;
            }
            
            if($_POST['etat']=="bon"){
                $point = 2;
            }
            
            if($_POST['etat']=="neuf"){
                $point = 3;
            }
                        
            if($_POST['etat']=="rare"){
                $point = 3;
            }


            Deal::addDeal($data)([
                'id_user' => $_SESSION["id_user"],
                'id_book' => $_GET["id"],
                'dealing_position' => "0",
                'point_offers' => $point,
                'point_deal' =>null,
                'dealing_date' =>null

            ]);







        }



        include VIEWS . "deal/addOffre.php";
    }




}

?>