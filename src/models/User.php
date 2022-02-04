<?php

class User extends Db
{
// Récupération de tous les utilisateurs (admin)
    public static function getAllUsers()
    {
    // Requête SQL pour l'affichage
        $request = "SELECT * FROM user ORDER BY id_user DESC";
    // Préparation de la requête avec connexion à la BDD
        $preparedRequest = self::getDb()->prepare($request);
    // Execution de la requête
        $preparedRequest->execute();
    // Retour des info de tous les utilisateurs sous forme de liste 
        return $preparedRequest->fetchAll(PDO::FETCH_ASSOC);

    }





// Récupération des infos d'un seul utilisateur
    public static function getInfoUser()
    {
    // Récupération de la variable en GET
        $id = $_GET['id'];
    // Requête SQL pour l'affichage de l'utilisateur grâce à $id
        $request = "SELECT * FROM user WHERE id_user=?";
    // Préparation
        $preparedRequest = self::getDb()->prepare($request);
    // Execution de la requête
        $preparedRequest->execute([$id]);
    // Retour des infos de l'utilisateur sous forme de liste
        return $preparedRequest->fetch(PDO::FETCH_ASSOC); 
    }


/********************************** Vérifications **************************************/  
// Vérification pseudo
public static function verifPseudo($pseudo){
    // Si pseudo est vide
    if(empty($pseudo)){
        $msg .="Veuillez saisir votre pseudo";
    }
    // Si pseudo n'existe pas dans la BDD
    if(!empty($pseudo)){
        // Pour chaque ligne de la table user
        for($i=0; $i>=count(self::getAllUsers());$i++){
            // Si pseudo est différent de tous les pseudos de la table user
            if($pseudo!=getAllUsers()[$i]["pseudo"]){
                $msg .="Le pseudo n'existe pas";
            }
        }
    }
}

// Vérification mot de passe
public static function verifMdp($mdp){
    // Si mdp est vide
    if(empty($mdp)){
        $msg .="Veuillez saisir votre mot de passe";
    }
    // Si mdp n'existe pas dans la BDD
    if(!empty($mdp)){
        // Pour chaque ligne de la table user
        for($i=0; $i<=count(self::getAllUsers());$i++){
            // Si mdp est différent de tous les mdps de la table user
            if(password_verify($mdp,getAllUsers()[$i]["pw"]) == false){
                $msg .="Le mdp est incorrect";
            }
        }
    }
}




// Vérification des infos de l'utilisateur pour la connexion
    public static function connexionVerif()
    {
    //     self::verifPseudo($pseudo);
    //     self::verifMdp($mdp);




    }






}
//Ne plus rien mettre












?>