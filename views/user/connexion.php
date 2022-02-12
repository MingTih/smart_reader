<?php  

include VIEWS.'inc/header.php'; 

// echo "<pre>";
//     print_r($_POST);
// echo "</pre>";

// echo "<pre>";
// print_r($infoUser);
// echo "</pre>";
?>
<?=(isset($msg))?$msg:""?>

<div class="main">
    <h1 class="sign text-center">Se connecter</h1>
    
    <form class="form1" method="post">
        <input class="input text-center" type="text" placeholder="Nom utilisateur" name="pseudo">
        <input class="pass text-center text-dark" type="password"  placeholder="Mot de passe" name="mdp">
        <input class="submit btn btn-success text-center d-block mx-auto" type="submit" value="Se connecter">
        <p class="forgot text-center"><a href="#">Mot de passe oublié?</a></p>
    
    </form>        
                                           
</div>



<?php  include VIEWS.'inc/footer.php'; ?>