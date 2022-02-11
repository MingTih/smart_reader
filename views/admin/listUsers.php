<?php  

include VIEWS.'inc/header.php';

?>


<!-- Affichage Liste users -->
<h1 class="text-center my-5">Liste des Utilisateurs</h1>


<!-- <div class='container'> -->
  <table class="table text-center">
    <thead>
      <tr>
        <th scope="col">id_user</th>
        <th scope="col">Nom</th>
        <th scope="col">Prenom</th>
        <th scope="col">Pseudo</th>
        <th scope="col">Email</th>
        <th scope="col">Date d'anniversaire</th>
        <th scope="col">Adresse</th>
        <th scope="col">Date d'inscription</th>
        <th scope="col">Points</th>
        <th scope="col">Photo</th>
        <th scope="col">Admin</th>
        <th scope="col">Disabled</th>
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
        <td><?= $user['admin']?></td>
        <td><?= $user['disabled']?></td>
        <td class="align-middle">
              <a href="" class="btn btn-warning">Admin</a>
        </td>
        <td class="align-middle">
              <a href="" class="btn btn-danger">Supprimer</a>
        </td>

      </tr>
          <?php
      }
          ?>
    </tbody>
  </table>
<!-- </div> -->


<?php  include VIEWS.'inc/footer.php'; ?>