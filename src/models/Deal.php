<?php

class Deal extends Db
{
//Ajouter, à la table deal, un livre avec comme dealing_position 0 (vente)
    public static function addDeal($data){

        // Si le select n'est pas vide
            $resquest = "INSERT INTO dealing (id_user, id_book, dealing_position, point_offers, point_deal, dealing_date) VALUES (?,?,?,?,?,?)";
            $preparedRequest = self::getDb()->prepare($resquest);
            $preparedRequest->execute([$data]);
            
    }
    

    





    
}





?>