<?php

class UserController
{

    public static function compteDetail()
    {
        $infoUser = User::getInfoUser();

        include VIEWS . "user/detail.php";


    }

    public static function replaceUser()
    {

            // Controle du format de la photo
    
        if ($_FILES["photo"]){ // Je ne veux faire le controle que si la photo existe

            if (!verifPhoto()){
                $msg .= "<div class=\"alert alert-danger\" role=\"alert\">
                Votre photo n'est pas valide. Seul les jpg, jpeg et png sont acceptés
        </div>";
            }

        }
        // Enregistrement de la photo, puis a l'enregistrement en bdd

        if (empty($msg)){
            // On ne procede a l'enregistrement que s'il n'y a pas de message d'erreurs


            $cheminTelechargement = BASE_DIR.'public\\upload\\' . $pseudo . "-" . time() . "-" . $_FILES["photo"]["name"];

            if (!move_uploaded_file($_FILES["photo"]["tmp_name"], $cheminTelechargement)){
                $msg .= "<div class=\"alert alert-danger\" role=\"alert\">
                Quelque chose ne s'est pas passé correctement au niveau de l'enregistrement de votre fichier
        </div>";
            }
        }

       /// insert et modif
       if (!empty($_POST)){
            User::insertUser([
                'id_user' => $_POST['id_user'],
                'name' => $_POST['name'],
                'firstname' => $_POST['firstname'],
                'pseudo' => $_POST['pseudo'],
                'pw' => $_POST['pw'],
                'email' => $_POST['email'],
                'birthdate' => $_POST['birthdate'],
                'address' => $_POST['address'],
                'inscription_date' => $_POST['inscription_date'],
                'point' => $_POST['point'],
                // 'photo' =>,
                'admin' => $_POST['admin'],
                'disabled' => $_POST['disabled'],
                

            ]);
       }
                include VIEWS . 'user/modifCompte.php';

    }









}


?>