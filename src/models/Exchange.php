<?php

class Exchange extends Db
{
    // Requête imbriquée pour récupérer les infos des user avec requête imbriquée
    public static function getUserInfo($data){
        $request = 
            "SELECT * FROM user WHERE id_user IN(
                SELECT id_user FROM dealing WHERE id_user=:id_user
            )";
        $preparedRequest = self::getDb()->prepare($request);
        $preparedRequest->execute($data);
        return $preparedRequest->fetchAll(PDO::FETCH_ASSOC);
    }

    



}


?>