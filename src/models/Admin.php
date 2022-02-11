<?php

class Admin extends Db
{

    // Fonction pour afficher tous les users 
    public static function allUsers()
    {
        $req = ('SELECT * FROM user');
        $requetePrepare = self::getDb()->prepare($req);
        $requetePrepare->execute();

        $afficher = $requetePrepare->fetchAll(PDO::FETCH_ASSOC);

        return $afficher;

    }


    // DELETE user ------------------------------------------------------------------------------
    public static function deleteUser($data){
        $request = "DELETE FROM user WHERE id_user = :id_user";
        $preparedRequest = self::getDb()->prepare($request);
        $preparedRequest->execute($data);

    }

    // ADMIN user ------------------------------------------------------------------------------
    public static function adminUser($data){
        $request = "UPDATE user SET admin=:admin  WHERE id_user = :id_user";
        $preparedRequest = self::getDb()->prepare($request);
        $preparedRequest->execute($data);
    
    }
    
    


    

    







}








?>
