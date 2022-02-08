<?php

class UserController
{

/************************************* monCompte *********************************************************************/
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
/*******************************************INSCRIPTION ***********************************************/    
    public static function replaceUser()
    {
        if (!empty($_FILES)){
            $pseudo= $_POST['pseudo'];
            $photo = $_FILES['photo'];
            $msg = '';

                        // Controle du format de la photo

            if (!User::verifPhoto($photo)){
                $msg .= "<div class=\"alert alert-danger\" role=\"alert\">
                Votre photo n'est pas valide. Seul les jpg, jpeg et png sont acceptés
                </div>";
            }
        }

        // echo '<pre>';
        // print_r($_POST);
        // echo '</pre>';

       /// insert 
       if (!empty($_POST)){


           $cheminDb=User::savePhoto($pseudo, $photo);

           if (!move_uploaded_file($_FILES["photo"]["tmp_name"], $cheminDb)){
            $msg .= "<div class=\"alert alert-danger\" role=\"alert\">
            Quelque chose ne s'est pas passé correctement au niveau de l'enregistrement de votre fichier
            </div>";
        }


        if (empty($msg)){

            $resultat = User::insertUser([
                'id_user' => 0,
                'name' => $_POST['name'],
                'firstname' => $_POST['firstname'],
                'pseudo' => $_POST['pseudo'],
                'pw' => password_hash($_POST["pw"],PASSWORD_DEFAULT),
                'email' => $_POST['email'],
                'birthdate' => $_POST['birthdate'],
                'address' => $_POST['address'],
                'inscription_date' => null,
                'point' => 0,
                'photo' => $cheminDb,
                'admin' => 0,
                'disabled' => 0,
                

            ]);
            if ($resultat){
                header("location:".BASE_PATH. "connexion");
            }else{
                $msg .= "<div class=\"alert alert-danger\" role=\"alert\">
                Quelque chose ne s'est pas passé correctement au niveau de l'enregistrement en base de donnée
          </div>";
            }
        }
      }
                include VIEWS . 'user/inscription.php';
    }

/******************************************* MODIFICATION ***********************************************/    

    public static function updateUser()
    {

        // echo '<pre>';
        // print_r($_FILES);
        // print_r($_POST);
        // print_r($_SESSION);
        // echo '</pre>';

       /// modif
       if (!empty($_POST)){
        $pseudo= $_POST['pseudo'];
       
        $msg = '';


            
            if (empty($msg)){

                if (!isset($_FILES['photo'])){
                    $cheminModifPhoto = $_SESSION["photo"];
                } else{
                    $cheminModifPhoto = User::savePhoto($pseudo, $_FILES['photo']);

                    if (!move_uploaded_file($_FILES["photo"]["tmp_name"], $cheminModifPhoto)){
                    $msg .= "<div class=\"alert alert-danger\" role=\"alert\">
                    Quelque chose ne s'est pas passé correctement au niveau de l'enregistrement de votre fichier
                    </div>";}
                }
                 
                
        
                $resultat = User::insertUser([
                    'id_user' => $_SESSION["id_user"],
                    'name' => $_POST['name'],
                    'firstname' => $_POST['firstname'],
                    'pseudo' => $_POST['pseudo'],
                    // 'pw' => password_hash($_POST["pw"],PASSWORD_DEFAULT),
                    'email' => $_POST['email'],
                    'birthdate' => $_POST['birthdate'],
                    'address' => $_POST['address'],
                    'inscription_date' => null,
                    'point' => $_SESSION["point"],
                    'photo' => $cheminModifPhoto,
                    'admin' => $_SESSION["admin"],
                    'disabled' => $_SESSION["disabled"],
                    

                ]);
        
                $_SESSION['nom'] = $_POST['name'];
                $_SESSION['prenom'] = $_POST['firstname'];
                $_SESSION['pseudo'] = $_POST['pseudo'];
                // $_SESSION['pw'] = password_hash($_POST["pw"],PASSWORD_DEFAULT);
                $_SESSION['email'] = $_POST['email'];
                $_SESSION['birthdate'] = $_POST['birthdate'];
                $_SESSION['address'] = $_POST['address'];
                $_SESSION['photo'] = $cheminModifPhoto;
                $_SESSION["readPhoto"] = User::explodePhoto($_SESSION["photo"]);

                if ($resultat){
                    header("location:".BASE_PATH. "monCompte");
                }else{
                    $msg .= "<div class=\"alert alert-danger\" role=\"alert\">
                    Quelque chose ne s'est pas passé correctement au niveau de l'enregistrement en base de donnée
                    </div>";
                }
            }
            
       }
                        include VIEWS . 'user/modifCompte.php';
    }

/*******************************************CONNEXION *********************************************************/
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

    public static function deconnexion($deconnexion){
        
        if($deconnexion == "ok")
            User::destroySession($deconnexion);

            // Redirection accueil
            header("location:".BASE_PATH);

    }








}




?>