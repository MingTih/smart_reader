<?php
include VIEWS.'inc/header.php'; 

?>
<h1 class= "text-center">Ajouter un User</h1>

<form  method="post" enctype="multipart/form-data" class="mx-auto w-50">
  <fieldset>
    
    <div class="form-group" >
      <label for="name" class="col-form-label col-form-label-lg mt-4"><font style="vertical-align: inherit;">Nom</font></label>
      <input type="text" class="form-control form-control-lg" id="name" placeholder="Nom" name="name">
    </div>

    <div class="form-group" >
      <label for="firstname" class="col-form-label col-form-label-lg mt-1"><font style="vertical-align: inherit;">Prénom</font></label>
      <input type="text" class="form-control form-control-lg" id="firstname" placeholder="prenom" name="firstname">
    </div>

    <div class="form-group" >
      <label for="pseudo" class="col-form-label col-form-label-lg mt-1"><font style="vertical-align: inherit;">Pseudo</font></label>
      <input type="text" class="form-control form-control-lg" id="pseudo" placeholder="pseudo" name="pseudo">
    </div>

    <div class="form-group">
      <label for="email" class="col-form-label col-form-label-lg mt-1"><font style="vertical-align: inherit;">Adresse e-mail</font></label>
      <input type="email" class="form-control form-control-lg" id="email" aria-describedby="emailHelp" placeholder="Adresse email" name="email">
    </div>

    <div class="form-group" >
      <label for="birthdate" class="col-form-label col-form-label-lg mt-1"><font style="vertical-align: inherit;">Date d'anniversaire</font></label>
      <input type="date" class="form-control form-control-lg" id="birthdate" placeholder="Date d'anniversaire" name="birthdate">
    </div>

    <div class="form-group" >
      <label for="address" class="col-form-label col-form-label-lg mt-1"><font style="vertical-align: inherit;">Adresse</font></label>
      <input type="text" class="form-control form-control-lg" id="address" placeholder="Adresse" name="address">
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


