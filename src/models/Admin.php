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

            // suppression de l'utilisateur grace à l'dentifiant
            public function deleteUserDb($id_user){

                $req = ("DELETE FROM user WHERE id_user = ?");
                $reqPrepare = self::getDb()->prepare($req);
                $reqPrepare->execute();
        
                if($resultat > 0){
                    $id_user = $this->getGameById($game_id);
                    unset($game);
                }
        


        
            }
    
    // public static function ajouterUnUser($data){

    // /**Ajouter et modifier dans la base de données */
    // {
    //     $request="REPLACE INTO user VALUES (:id_user,:name, :firstname, :pseudo, :pw, :email, :birthdate, :address, :inscription_date, :point,:photo, :admin, :disabled)";
    //     $response=self::getDb()->prepare($request);
    //     return $response->execute($data);
    // }


    

    







}








?>
