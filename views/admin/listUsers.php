<?php  

include VIEWS.'inc/header.php';
?>


<!-- Affichage Liste users -->
<h1 class="text-center my-5">Liste des Utilisateurs</h1>


<!-- <div class='container'> -->
  <table class="table text-center container" id="tftable">
    <thead>
      <tr>
        <th scope="col-1">id_user</th>
        <th scope="col-1">Nom</th>
        <th scope="col-1">Prenom</th>
        <th scope="col-1">Pseudo</th>
        <th scope="col-1">Email</th>
        <th scope="col-1">Date d'anniversaire</th>
        <th scope="col-1">Adresse</th>
        <th scope="col-1">Date d'inscription</th>
        <th scope="col-1">Points</th>
        <th scope="col-1">Photo</th>
        <th scope="col-1">Admin</th>
        <th scope="col-1">Disabled</th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
          <?php
          foreach($users as $user){
          ?>
      <tr>
        <th scope="row"><?= $user['id_user']?></th>
        <td><?= $user['name']?></td>
        <td><?= $user['firstname']?></td>
        <td><?= $user['pseudo']?></td>
        <td><?= $user['email']?></td>
        <td><?= $user['birthdate']?></td>
        <td><?= $user['address']?></td>
        <td><?= $user['inscription_date']?></td>
        <td><?= $user['point']?></td>
        <td><?= $user['photo']?></td>
        <td><?= $user['admin'] ? "Admin" : ""?></td>
        <td><?= $user['disabled'] ? "disable" : ""?></td>
        <td class="align-middle">
              <a href="<?="?adminUser=ok&&id_user=" . $user['id_user']?>" class="btn btn-warning">Admin</a>
        </td>
        <td class="align-middle">
              <a href="<?="?deleteUser=ok&&id_user=" . $user['id_user']?>" class="btn btn-danger">Supprimer</a>
        </td>

      </tr>
          <?php
      }
          ?>
    </tbody>
  </table>
<!-- </div> -->


<?php  include VIEWS.'inc/footer.php'; ?>