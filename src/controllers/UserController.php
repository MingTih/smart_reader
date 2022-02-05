<?php

class UserController
{

    public static function compteDetail()
    {
    // Récupération des info d'un seul user
        $infoUser = User::getInfoUser();

        include VIEWS . "user/detail.php";


    }

    public static function connexion()
    {
    // Vérifier la connexion de l'utilisateur--------
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
                    $msg .= "<div class=\"alert alert-danger\" role=\"alert\">Le pseudo ou le mot de passe est incorrect. Veuillez réesayer.</div>";
                }elseif(!password_verify($mdp, $infoUser["pw"])){
                    $msg .= "<div class=\"alert alert-danger\" role=\"alert\">Le pseudo ou le mot de passe est incorrect. Veuillez réesayer.</div>";
                }else{
                    User::connexionValid($infoUser);
                }
            }

        }

        include VIEWS . "user/connexion.php";
    }









}




?>