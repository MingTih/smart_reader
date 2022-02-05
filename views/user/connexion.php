<?php  

include VIEWS.'inc/header.php'; 

// echo "<pre>";
//     print_r($_POST);
// echo "</pre>";

// echo "<pre>";
// print_r($infoUser);
// echo "</pre>";
?>

<div class="main">
    <h1 class="sign" align="center">Se connecter</h1>
    
    <form class="form1" method="post">
        <input class="input" type="text" align="center" placeholder="Nom utilisateur" name="pseudo">
        <input class="pass" type="password" align="center" placeholder="Mot de passe" name="mdp">
        <input class="submit btn btn-success" type="submit" align="center" value="Se connecter">
        <p class="forgot" align="center"><a href="#">Mot de passe oublié?</a></p>
    
    </form>        
                                           
</div>

<?=(isset($msg))?$msg:""?>


<?php  include VIEWS.'inc/footer.php'; ?>