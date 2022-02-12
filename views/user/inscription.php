<?php
include VIEWS.'inc/header.php'; 
echo '<pre>';
  print_r($_POST);
  print_r($_FILES);
echo '</pre>';
?>

<?=isset($msg)?$msg:""?>
<h1 class= "text-center">Inscription</h1>

<form  method="post" enctype="multipart/form-data" class="mx-auto w-50">
  <fieldset>
    
    <div class="form-group" >
      <label for="name" class="col-form-label col-form-label-lg mt-4"><font style="vertical-align: inherit;">Nom</font></label>
      <input type="text" class="form-control form-control-lg" id="name" placeholder="Nom" name="name" value="<?=!empty($_POST)?$_POST['name']:""?>">
    </div>

    <div class="form-group" >
      <label for="firstname" class="col-form-label col-form-label-lg mt-1"><font style="vertical-align: inherit;">Prénom</font></label>
      <input type="text" class="form-control form-control-lg" id="firstname" placeholder="prenom" name="firstname" value="<?=!empty($_POST)?$_POST['firstname']:""?>">
    </div>

    <div class="form-group" >
      <label for="pseudo" class="col-form-label col-form-label-lg mt-1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Pseudo</font></font></label>
      <input type="text" class="form-control form-control-lg" id="pseudo" placeholder="pseudo" name="pseudo" value="<?=!empty($_POST)?$_POST['pseudo']:""?>">
    </div>

    <div class="form-group">
      <label for="pw" class="col-form-label col-form-label-lg mt-1"><font style="vertical-align: inherit;">Mot de passe</font></label>
      <input type="password" class="form-control form-control-lg" id="pw" placeholder="Mot de passe" name="pw">
    </div>

    <!-- <div class="form-group">
      <label for="pw2" class="col-form-label col-form-label-lg mt-1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Confirmer votre mot de passe</font></font></label>
      <input type="password" class="form-control form-control-lg" id="pw2" placeholder="Confirmation mot de passe" name="pw">
    </div> -->

    <div class="form-group">
      <label for="email" class="col-form-label col-form-label-lg mt-1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Adresse e-mail</font></font></label>
      <input type="email" class="form-control form-control-lg" id="email" aria-describedby="emailHelp" placeholder="Adresse email" name="email" value="<?=!empty($_POST)?$_POST['email']:""?>">
    </div>

    <div class="form-group" >
      <label for="birthdate" class="col-form-label col-form-label-lg mt-1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Date d'anniversaire</font></font></label>
      <input type="date" class="form-control form-control-lg" id="birthdate" placeholder="Date d'anniversaire" name="birthdate" value="<?=!empty($_POST)?$_POST['birthdate']:""?>">
    </div>

    <div class="form-group" >
      <label for="address" class="col-form-label col-form-label-lg mt-1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Adresse</font></font></label>
      <input type="text" class="form-control form-control-lg" id="address" placeholder="Adresse" name="address" value="<?=!empty($_POST)?$_POST['address']:""?>">
    </div>

    <div class="form-group" >
      <label for="photo" class="col-form-label col-form-label-lg mt-1"><font style="vertical-align: inherit;">Photo</font></label>
      <input type="file" class="form-control form-control-lg" id="photo" name="photo">
    </div>


    </fieldset>
    <button type="submit" class="btn btn-primary"><font style="vertical-align: inherit;">Valider</font></button>
  </fieldset>
</form>

<?php include VIEWS.'inc/footer.php'; ?>