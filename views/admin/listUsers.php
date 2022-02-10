<?php  

include VIEWS.'inc/header.php';

?>


<!-- Affichage Liste users -->

<div class='container'>
<table class="table">
  <thead>
    <tr>
      <th scope="col">id_user</th>
      <th scope="col">Nom</th>
      <th scope="col">Prenom</th>
      <th scope="col">Email</th>
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
      <td><?= $user['email']?></td>
    </tr>
        <?php
        }
        ?>
  </tbody>
</table>
</div>


<?php  include VIEWS.'inc/footer.php'; ?>