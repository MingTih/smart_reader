<?php

class User extends Db
{

// Récupération de tous les utilisateurs (admin)------------------------------------
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

// Récupération des infos d'un seul utilisateur--------------------------------------
    public static function getInfoUser()
    {
    // Récupération de la variable en GET
        // $id = $_GET['id'];
        $id = $_SESSION['id_user'];
    // Requête SQL pour l'affichage de l'utilisateur grâce à $id
        $request = "SELECT * FROM user WHERE id_user=?";
    // Préparation
        $preparedRequest = self::getDb()->prepare($request);
    // Execution de la requête
        $preparedRequest->execute([$id]);
    // Retour des infos de l'utilisateur sous forme de liste
        return $preparedRequest->fetch(PDO::FETCH_ASSOC); 
    }


    /**Ajouter et modifier dans la base de données */
    public static function insertUser(array $data)
    {
        $request="REPLACE INTO user VALUES (:id_user,:name, :firstname, :pseudo, :pw, :email, :birthdate, :address, :inscription_date, :point,:photo, :admin, :disabled)";
        $response=self::getDb()->prepare($request);
        return $response->execute($data);
    }
/********************************** Vérifications **************************************/  

// Vérification si connecté
    public static function isConnected(){
        if(isset($_SESSION["pseudo"])){
            return true;
        }
    }

// Vérification pseudo
    public static function verifPseudo($pseudo){

        // true si pseudo n'existe pas
        if(!isset($pseudo)){
            return true;
        }

        // true si pseudo est vide
        if(empty($pseudo)){
            return true;
        }

    }

// Vérification mot de passe
    public static function verifMdp($mdp){

        // true si mdp n'existe pas
        if(!isset($mdp)){
            return true;
        }

        // Si mdp est vide
        if(empty($mdp)){
            return true;
        }
    }

// Vérification des infos de l'utilisateur pour la connexion
    public static function connexionVerif($pseudo,$mdp)
        {       

        // Si pseudo pas vide et est valide
        if(!empty($pseudo) && !self::verifPseudo($pseudo)){

            // Connexion avec la base de données
            $resquest = "SELECT * FROM user WHERE pseudo=?";
            $preparedRequest = self::getDb()->prepare($resquest);
            $preparedRequest->execute([$pseudo]);
            return $preparedRequest->fetch(PDO::FETCH_ASSOC);
        }
    }

/************************************* Eclater chemin photo****************************************************/
    public static function explodePhoto($photoRoad){
        return explode("photo_profil\\",$photoRoad);
    }

/********************************************** CONNEXION ***************************************************** */
// Création SESSION si connexionVerif Ok:


    public static function connexionValid($infoUser){
        
        $_SESSION["id_user"] = $infoUser["id_user"];
        $_SESSION["nom"] = $infoUser["name"];
        $_SESSION["prenom"] = $infoUser["firstname"];
        $_SESSION["pseudo"] = $infoUser["pseudo"];
        $_SESSION["pw"] = $infoUser["pw"];
        $_SESSION["email"] = $infoUser["email"];
        $_SESSION["birthdate"] = $infoUser["birthdate"];
        $_SESSION["address"] = $infoUser["address"];
        $_SESSION["inscription_date"] = $infoUser["inscription_date"];
        $_SESSION["point"] = $infoUser["point"];
        $_SESSION["photo"] = $infoUser["photo"];
        $_SESSION["admin"] = $infoUser["admin"];
        $_SESSION["disabled"] = $infoUser["disabled"];
        $_SESSION["readPhoto"] = self::explodePhoto($infoUser["photo"]);

        header("location:".BASE_PATH."monCompte");
        exit;

    }


// Destruction SESSION pour déconnexion
    public static function destroySession($deconnexion){
        // Si SESSION existe et que "deconnexion" dans GET :
        if(isset($_SESSION["pseudo"]) && $deconnexion=="ok"){
            //Détruit la session
            session_destroy(); 
        }
    }

/**Controles sur la photo */
    public static function verifPhoto($photo){


        if (isset($photo)){ // Je ne veux faire le controle que si la photo existe
            return true;
        }
        
        if (!empty($photo)){
            return true;
        }

    }

    // Enregistrement de la photo, puis a l'enregistrement en bdd
    public static function savePhoto($pseudo,$photo){

        

        if (empty($msg)){
            // On ne procede a l'enregistrement que s'il n'y a pas de message d'erreurs


            $cheminTelechargement = PHOTO. 'photo_profil\\' . $pseudo . "-" . time() . "-" . $photo["name"];
            return $cheminTelechargement;

        }
    
    }

//     // Desactivation de compte
//     public static function disabledSession($disabled){
//         // Si SESSION existe :
//         if(isset($_SESSION["id_user"])){
            
//             //Desactivation du compte
//             $requete = ("UPDATE user SET disabled=:disabled WHERE id_user=:id_user");
//             $requetePrepare = self::getDb()->prepare($requete);
//             $requetePrepare->execute($disabled);
//         }
//     }
// // Selection de tous les users en disabled
//     public static function getAllDisabled($data)
//     {
//     // Requête SQL pour selectionner tous les users disabled
//         $request = "SELECT * FROM user WHERE disabled=:disabled";
//     // Préparation de la requête avec connexion à la BDD
//         $preparedRequest = self::getDb()->prepare($request);
//     // Execution de la requête
//         $preparedRequest->execute($data);
//     // Retour des infos de tous les utilisateurs sous forme de liste 
//         return $preparedRequest->fetchAll(PDO::FETCH_ASSOC);

//     }


}
//Ne plus rien mettre












?>