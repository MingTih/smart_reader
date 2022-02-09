<?php

class Deal extends Db
{
//Ajouter, à la table deal, un livre 
    public static function addDeal($data){
        print_r ($data);

            $resquest = "INSERT INTO dealing (id_deal,id_user, id_book, dealing_position, point_offers, point_deal, dealing_date) VALUES (:id_deal,:id_user,:id_book,:dealing_position,:point_offers,:point_deal,:dealing_date)";
            $preparedRequest = self::getDb()->prepare($resquest);
            return $preparedRequest->execute($data);
            
    }
    
// Affichage liste offres ou demandes
    public static function readDeal($data){
        $request = "SELECT * FROM dealing WHERE dealing_position = :dealing_position AND id_user=:id_user";
        $preparedRequest = self::getDb()->prepare($request);
        $preparedRequest->execute($data);
        return $preparedRequest->fetchAll(PDO::FETCH_ASSOC);
    }

// Connversion points <=> état
    public static function pointToCondition($point){
        if($point==1){
            return "mauvais";
        }
        if($point==2){
            return "bon";
        }
        if($point==3){
            return "neuf";            
        }
        if($point==4){
            return "rare";
            
        }

    }
 




    
}





?>