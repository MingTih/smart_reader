<?php
include VIEWS.'inc/header.php'; 

?>
<h1 class= "text-center">Ajouter un utilisateur</h1>

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
      <label for="pw" class="col-form-label col-form-label-lg mt-1"><font style="vertical-align: inherit;">Mot de passe</font></label>
      <input type="password" class="form-control form-control-lg" id="pw" placeholder="Mot de passe" name="pw">
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

    <div class="form-group">
      <label for="date" class="col-form-label col-form-label-lg mt-1"><font style="vertical-align: inherit;">Date d'inscription</font></label>
      <input type="date" class="form-control form-control-lg" id="inscription_date" placeholder="Date d'inscription" name="inscription_date">
    </div>

    <div class="form-group">
      <label for="point" class="col-form-label col-form-label-lg mt-1"><font style="vertical-align: inherit;">Point</font></label>
      <input type="num" class="form-control form-control-lg" id="point" placeholder="points" name="point">
    </div>

    <div class="form-group">
      <label for="admin" class="col-form-label col-form-label-lg mt-1"><font style="vertical-align: inherit;">Admin</font></label>
      <input type="num" class="form-control form-control-lg" id="admin" placeholder="Admin" name="admin">
    </div>

    <div class="form-group">
      <label for="disabled" class="col-form-label col-form-label-lg mt-1"><font style="vertical-align: inherit;">Disabled</font></label>
      <input type="num" class="form-control form-control-lg" id="disabled" placeholder="Admin" name="disabled">
    </div>


    </fieldset>
    <button type="submit" class="btn btn-primary"><font style="vertical-align: inherit;">Valider</font></button>
  </fieldset>
</form>

<?php include VIEWS.'inc/footer.php'; ?>


