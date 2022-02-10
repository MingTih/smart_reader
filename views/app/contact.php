<?php  include VIEWS.'inc/header.php'; ?>

<form action="" enctype="multipart/form-data" method="post">
    Email: <input type="text" name="email" value="" />
    <br />
    Objet: <input type="text" name="objet" value="" />
    <br />
    Message: <textarea name="message" cols="40" rows="20"></textarea>
    <br />
    <input type="submit"/>
</form>


<?php  include VIEWS.'inc/footer.php'; ?>