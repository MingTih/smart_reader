<?php

class UserController
{

    public static function compteDetail()
    {
    // Si pas de compte, redirige sur page connexion
        if(!User::isConnected()){
            header("location:".BASE_PATH."connexion");
        }
    
    // Récupération des info d'un seul user
        $infoUser = User::getInfoUser();

        include VIEWS . "user/detail.php";


    }

    public static function connexion()
    {
    // Vérifier la connexion de l'utilisateur--------
        // Si compte existe, redirection page monCompte
        if(User::isConnected()){
            header("location:".BASE_PATH."monCompte");
        }
        // Si POST n'est pas vide, stocke les données POST dans des variables :
        if(!empty($_POST)){
            $pseudo=$_POST["pseudo"];
            $mdp=$_POST["mdp"];
            $msg="";

            // Contrôles (Les $msg ne s'affichent pas si je les définis dans User.php):
            if(User::verifPseudo($pseudo)){
                $msg .= "<div class=\"alert alert-danger\" role=\"alert\">Veuillez saisir votre pseudo</div>";
            }
        
            if(User::verifMdp($mdp)){
                $msg .= "<div class=\"alert alert-danger\" role=\"alert\">Veuillez saisir votre mot de passe</div>";
            }
    
            if(!User::verifPseudo($pseudo) && !User::verifMdp($mdp)){

                // Applique la méthode de vérification de la connexion :
                $infoUser = User::connexionVerif($pseudo,$mdp);
                
                // Si pseudo n'est pas dans la BDD ou si mdp ne correspond pas :
                if($infoUser == ""){
                    $msg .= "<div class=\"alert alert-danger\" role=\"alert\">Le pseudo ou le mot de passe est incorrect. Veuillez réesayer1.</div>";
                }elseif($mdp != $infoUser['pw']){
                    $msg .= "<div class=\"alert alert-danger\" role=\"alert\">Le pseudo ou le mot de passe est incorrect. Veuillez réesayer2.</div>";
                }else{
                    User::connexionValid($infoUser);
                }
            }
            // !password_verify($mdp, $infoUser["pw"])
            // $mdp != $infoUser['pw']

        }

        include VIEWS . "user/connexion.php";
    }

    public static function deconnexion($deconnexion){
        
        if($deconnexion == "ok")
            User::destroySession($deconnexion);

            // Redirection accueil
            header("location:".BASE_PATH);

    }









}




?>