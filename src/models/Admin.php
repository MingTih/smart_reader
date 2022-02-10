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

    







}








?>
