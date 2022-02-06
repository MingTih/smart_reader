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
    public static function insertUser($data)
    {
        $request="REPLACE INTO user VALUES (:id_user, :name, :firstname, :pseudo, :pw, :email, :birthdate, :address, :inscription_date, :point, :photo, :admin, :disabled )";
        $response=self::getDb()->prepare($request);
        $response->execute($data);
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

// Création SESSION si connexionVerif Ok:
    public static function connexionValid($infoUser){
        $_SESSION["id_user"] = $infoUser["id_user"];
        $_SESSION["nom"] = $infoUser["name"];
        $_SESSION["prenom"] = $infoUser["firstname"];
        $_SESSION["pseudo"] = $infoUser["pseudo"];
        $_SESSION["email"] = $infoUser["email"];
        $_SESSION["birthdate"] = $infoUser["birthdate"];
        $_SESSION["address"] = $infoUser["address"];
        $_SESSION["inscription_date"] = $infoUser["inscription_date"];
        $_SESSION["point"] = $infoUser["point"];
        $_SESSION["point"] = $infoUser["point"];
        $_SESSION["admin"] = $infoUser["admin"];
        $_SESSION["disabled"] = $infoUser["disabled"];


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




}
//Ne plus rien mettre












?>