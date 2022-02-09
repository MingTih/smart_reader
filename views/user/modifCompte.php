<?php

include VIEWS.'inc/header.php'; 

?>
<h1 class= "text-center">Modifier mon Compte</h1>

<form  method="post" class="mx-auto w-50" enctype="multipart/form-data">
  <fieldset>
    
    <div class="form-group" >
      <label for="name" class="col-form-label col-form-label-lg mt-4"><font style="vertical-align: inherit;">Nom</font></label>
      <input type="text" required  class="form-control form-control-lg" id="name" name="name" value='<?=$_SESSION["nom"];?>'>
    </div>

    <div class="form-group" >
      <label for="firstname" class="col-form-label col-form-label-lg mt-1"><font style="vertical-align: inherit;">Prénom</font></label>
      <input type="text" class="form-control form-control-lg" id="firstname" name="firstname" value='<?=$_SESSION["prenom"];?>'>
    </div>

    <div class="form-group" >
      <label for="pseudo" class="col-form-label col-form-label-lg mt-1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Pseudo</font></font></label>
      <input type="text" class="form-control form-control-lg" id="pseudo" name="pseudo" value='<?=$_SESSION["pseudo"];?>'>
    </div>

    <!-- <div class="form-group">
      <label for="pw" class="col-form-label col-form-label-lg mt-1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Mot de passe</font></font></label>
      <input type="password" class="form-control form-control-lg" id="pw" placeholder="Mot de passe" name="pw">
    </div> -->

    <div class="form-group">
      <label for="email" class="col-form-label col-form-label-lg mt-1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Adresse e-mail</font></font></label>
      <input type="email" class="form-control form-control-lg" id="email" aria-describedby="emailHelp" name="email" value='<?=$_SESSION["email"];?>'>
    </div>

    <div class="form-group" >
      <label for="birthdate" class="col-form-label col-form-label-lg mt-1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Date d'anniversaire</font></font></label>
      <input type="date" class="form-control form-control-lg" id="birthdate" name="birthdate" value='<?=$_SESSION["birthdate"];?>'>
    </div>

    <div class="form-group" >
      <label for="address" class="col-form-label col-form-label-lg mt-1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Adresse</font></font></label>
      <input type="text" class="form-control form-control-lg" id="address" placeholder="Adresse" name="address" value='<?=$_SESSION["address"];?>'>
    </div>

    <div class="form-group" >
      <label for="photo" class="col-form-label col-form-label-lg mt-1"><font style="vertical-align: inherit;">Photo</font></label>
      <input type="file" class="form-control form-control-lg" id="photo" name="photo" >
        <div>
          <img src="<?=COVER."photo_profil/".$_SESSION['readPhoto'][1]?>" alt="photo de profil de <?=$_SESSION['pseudo'];?>">
        </div>
    </div>


    </fieldset>
    <button type="submit" class="btn btn-primary"><font style="vertical-align: inherit;">Modifier</font></button>
    <a href="<?=BASE_PATH?>"; class="btn btn-danger">Annuler</a>

  </fieldset>
</form>


<?php  include VIEWS.'inc/footer.php'; ?>

